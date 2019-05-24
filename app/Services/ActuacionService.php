<?php
namespace App\Services;

use Mail;
use Illuminate\Support\Facades\Storage;

class ActuacionService {
	
	public function getTemplateParte($actuacion_id)
    {

        $objACT = \App\Actuacion::with('Sistema.ClienteUbicacion.Cliente','ActuacionTipoEstado','ActuacionDocumento')->find($actuacion_id);

        $objACT->fecha = \Carbon\Carbon::createFromFormat( 'Y-m-d', $objACT->fecha )->format('d/m/Y');
        $objUSER = \App\ActuacionUser::where('actuacion_id',$actuacion_id)->with('User')->get();
        $objACT->descripcion = nl2br($objACT->descripcion);
        $objACT->observaciones = nl2br($objACT->observaciones);

        $templatePDF = '<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
                        <body style="margin: 0 !important; padding: 0 !important; font-family: \'Open Sans Condensed\', sans-serif;">
                            <head>
                              <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                            </head>
                            <div style="background-image: url('.url('img/actuacion_parte_fondo.png').'); background-repeat: no-repeat; background-size: 595px; height: 830px; width: 810px;">
                                <div style="position: absolute; left: 90; top: 98; text-align: left; width: 200px;">
                                    <p style="font-weight: 300; font-size: 14px; line-height: 0.1">'.$objACT->fecha.'</p>
                                </div>
                                <div style="position: absolute; left: 450; top: 69; text-align: left; width: 200px;">
                                    <p style="font-weight: 300; font-size: 14px; line-height: 0.1">'.substr($objACT->hora_ini,0,5).'</p>
                                </div>
                                <div style="position: absolute; left: 450; top: 98; text-align: left; width: 200px;">
                                    <p style="font-weight: 300; font-size: 14px; line-height: 0.1">'.substr($objACT->hora_fin,0,5).'</p>
                                </div>
                                <div style="position: absolute; left: 368; top: 150; text-align: right; width: 200px;">
                                    <p style="font-weight: 700; font-size: 12px; line-height: 0.1">'.strtoupper($objACT->Sistema->ClienteUbicacion->Cliente->razon_social).'</p>
                                    <p style="font-weight: 700; font-size: 10px; line-height: 0.1">Identificador: '.$objACT->id.'</p>
                                    <p style="font-weight: 300; font-size: 10px; line-height: 0.1">'.$objACT->Sistema->ClienteUbicacion->nombre.'</p>
                                    <p style="font-weight: 300; font-size: 10px; line-height: 0.1">'.$objACT->Sistema->ClienteUbicacion->direccion.'</p>
                                    <p style="font-weight: 300; font-size: 10px; line-height: 0.1">'.$objACT->Sistema->SistemaTipo->nombre." - ".$objACT->Sistema->descripcion.'</p>
                                    <p style="font-weight: 300; font-size: 10px; line-height: 0.1">'.$objACT->Sistema->ClienteUbicacion->Cliente->cif.'</p>
                                </div>
                                <div style="position: absolute; left: 36; top: 290; text-align: left; width: 540px;">
                                    <p style="font-weight: 300; font-size: 10px; line-height: 1.5">'.$objACT->descripcion.'</p>
                                </div>
                                <div style="position: absolute; left: 36; top: 650; text-align: left; width: 540px;">
                                    <p style="font-weight: 300; font-size: 10px; line-height: 1.5">'.$objACT->observaciones.'</p>
                                </div>
                                <div style="position: absolute; left: 36; top: 740; text-align: left; width: 360px;">
                                    <p style="font-weight: 300; font-size: 10px; line-height: 1.5">';
                                    foreach($objUSER as $user){
                                      $templatePDF .= '|'. $user->User->name .'|';
                                    }
                    $templatePDF .= '</p>
                                </div> 
                                <div style="position: absolute; left: 315; top: 740; text-align: center; width: 360px;">
                                    <p style="font-weight: 300; font-size: 10px; line-height: 1.5">
                                        '.$objACT->firmada_por.'<br />';
                                        foreach($objACT->ActuacionDocumento as $documento){
                                          if($documento->tipo == 1) $templatePDF .= '<img src="'.url('/storage/actuacion_documento/'.$documento->ruta_recurso ).'" style="height: 43px;" />';
                                        }
                   $templatePDF .= '</p>
                                </div>                
                            </div>
                        </body>';
        return $templatePDF;
    }
    public function setParteActuacion($actuacion_id)
    {
        
        $templatePDF = $this->getTemplateParte($actuacion_id);
        
        $conv = new \Anam\PhantomMagick\Converter();
        
        $options = [
          'format' => 'A4',
          'orientation' => 'portrait',
          'margin' => '0cm'
        ];

        $conv->addPage($templatePDF)
            ->toPdf()
            ->setPdfOptions($options)
            ->save(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'public/actuacion_documento/tmp/'.md5($actuacion_id).'.pdf');

        $file = \File::copy(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'public/actuacion_documento/tmp/'.md5($actuacion_id).'.pdf',Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'public/actuacion_documento/'.md5($actuacion_id).'.pdf');

        $objREL = \App\ActuacionDocumento::create([
            'descripcion'       => 'Parte en PDF',
            'tipo'              => 0,
            'nombre_recurso'    => 'Parte generado 25/03/2019',
            'ruta_recurso'      => md5($actuacion_id).'.pdf',
        ]);

        $obj = \App\Actuacion::find($actuacion_id);
        $obj->ActuacionDocumento()->save($objREL);

        return json_encode($obj);
    }
    public function enviaParteActuacion($actuacion_id, $email)
    {
        
        $actuacion = \App\Actuacion::with('Sistema','Incidencia.IncidenciaEstado','ActuacionTipoEstado')->find($actuacion_id);
		$actuacionTipoEstado = $actuacion->ActuacionTipoEstado()->get();
		$actuacionDocumento = $actuacion->ActuacionDocumento()->get();
		Mail::to($email)->send(new \App\Mail\ActuacionGenerada($actuacion, $actuacionTipoEstado, $actuacionDocumento));
        
    }
}