<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use \Lcobucci\JWT\Parser;
use \Laravel\Passport\Token;

class AlquilerController extends Controller
{
    public function index()
    {
        $obj = \App\Alquiler::all();
        return view('alquiler.alquiler');
    }

    public function show($id)
    {
        $obj = \App\Alquiler::find($id);
        return $obj;
    }

    public function destroy($id)
    {
        $obj = \App\AlquilerItems::where('alquiler_id',$id)->get();
        foreach($obj as $item){
            $item->delete();
        }

        $obj = \App\Alquiler::find($id);
        $obj->delete();
        return $obj;
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'fecha_alquiler'                       => 'required',
            'ubicacion_id'                         => 'required|max:255',
            'espacio_id'                           => 'required|max:255',
            'notes'                                => 'max:255'
          ]);
        
        $obj = \App\Alquiler::create([
            'fecha_alquiler'    => $request['fecha_alquiler'],
            'user_id'           => auth()->user()->id,
            'ubicacion_id'      => $request['ubicacion_id'],
            'espacio_id'        => $request['espacio_id'],
            'notes'             => $request['notes'],
        ]);
        
        foreach($request->articulo as $r){
            $alquilerItem = \App\AlquilerItems::create([
                'articulo_id'    => $r,
                'alquiler_id'    => $obj->id
            ]);
        }

        return response()->json(['success'=>'Articulo añadido correctamente.']);
    }

    public function numAlquilerTotal(){
        $obj = \App\Alquiler::all()->count();
        return $obj;
    }

    public function numAlquilerPagado(){
        $obj = \App\Alquiler::where('pagado','1')->count();
        return $obj;
    }

    public function acceptAlquiler(Request $request){
        $obj = \App\Alquiler::find($request->id);
        $obj->pagado = 1;
        $obj->update();

        return response()->json(['success'=>'Alquiler aceptado correctamente.']);
    }

    public function getDataTable()
    {
        return Datatables::of(\App\Alquiler::all())
        ->addColumn('fecha_alquiler', function($obj){
            $newDate = date("d-m-Y", strtotime($obj->fecha_alquiler)); 
            return $newDate;  
        })
        ->addColumn('name_user', function($obj){
            $nombre_user = \App\User::where('id','like',$obj['user_id'])->get();
            return $nombre_user[0]['name'];  
        })
        ->addColumn('name_ubicacion', function($obj){
            $nombre_ubicacion = \App\Ubicacion::where('id','like',$obj['ubicacion_id'])->get();
            return $nombre_ubicacion[0]['name'];
        })
        ->addColumn('name_space', function($obj){
            $nombre_space = \App\Espacio::where('id','like',$obj['espacio_id'])->get();
            return $nombre_space[0]['description'].', planta:'.$nombre_space[0]['floor'].', numero:'.$nombre_space[0]['number'];
        })
        ->addColumn('pagado', function($obj){
            if ($obj->pagado == 1){
                return '<a href="#" style="pointer-events: none; cursor: default;" class="btn btn-xs btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>';
            }else{
                return '<a href="#" style="pointer-events: none; cursor: default;" class="btn btn-xs btn-warning"><i class="fa fa-times" aria-hidden="true"></i></a>';
            }
        })
        ->addColumn('action', function($obj){
            $cadenaBotones = "";
            if ($obj->pagado == 0){
                $cadenaBotones .= '<a href="#" data-toggle="tooltip" title="Aceptar alquiler" class="btn btn-xs btn-info accept-alquiler" id="'.$obj->id.'"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>';
            }
            $cadenaBotones .= ' <a href="#" data-toggle="tooltip" title="Cancelar alquiler" class="btn btn-xs btn-danger delete-alquiler" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            return $cadenaBotones;
        })->rawColumns(['action','pagado'])->make(true);
    }

    public function getDataTablePagados()
    {
        return Datatables::of(\App\Alquiler::where('pagado','1'))
        ->addColumn('name_user', function($obj){
            $nombre_user = \App\User::where('id','like',$obj['user_id'])->get();
            return $nombre_user[0]['name'];  
        })
        ->addColumn('name_space', function($obj){
            $nombre_space = \App\Espacio::where('id','like',$obj['espacio_id'])->get();
            return $nombre_space[0]['description'].', planta:'.$nombre_space[0]['floor'].', numero:'.$nombre_space[0]['number'];
        })
        ->addColumn('action', function($obj){
        return '<a href="#" data-toggle="tooltip" title="Cancelar alquiler" class="btn btn-xs btn-danger delete-alquiler" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
        })->rawColumns(['action'])->make(true);
    }

    public function getDataTableAlquilerUser()
    {
        $id_user = auth()->user()->id;

        $alquiler = \App\Alquiler::with('Ubicacion','Espacio')->where('user_id','=',$id_user)->get();
        return $alquiler;
    }

    public function generateBill($id){
        $id = 84;
        $coste = 0;
        $tablaArticulos = '<table style="width: 100%; border: 1px solid black;"><tr style="width: 100%; border: 1px solid black;"><th>Material</th><th>Nº Serie</th><th>Precio/€</th></tr>';
        $id_user = auth()->user()->id;
        $user = \App\User::find($id_user)->get();
        $alquiler = \App\Alquiler::where('id',$id)->get();
        $espacio = \App\Espacio::find($alquiler[0]->espacio_id)->get();
        $ubicacion = \App\Ubicacion::find($espacio[0]->ubicacion_id)->get();
        $alquilerItems = \App\AlquilerItems::where('alquiler_id',$id)->get();
        
        
        
        setlocale(LC_TIME, 'es_ES');
        $date = date_create($alquiler[0]->fecha_alquiler);
        $fecha_alquiler = date_format($date, 'l jS F Y');
        
        $tablaArticulos .= '<tr style="width: 100%; border: 1px solid black;">
                <td style="width: 100%; border: 1px solid black;">Espacio: '.$espacio[0]->description.'</td>
                <td style="width: 100%; border: 1px solid black;"></td>
                <td style="width: 100%; border: 1px solid black;">'.$espacio[0]->precio.'</td>
            </tr>';
        $coste += $espacio[0]->precio;

        foreach ($alquilerItems as $item){
            $articulo = \App\Articulo:: where('id',$item->articulo_id)->get();
            $coste += $articulo[0]->precio;
            $tablaArticulos .= '<tr style="width: 100%; border: 1px solid black;">
                <td style="width: 100%; border: 1px solid black;">'.$articulo[0]->name.'<br>Descripción: '.$articulo[0]->description.'</td>
                <td style="width: 100%; border: 1px solid black;">'.$articulo[0]->numero_serie.'</td>
                <td style="width: 100%; border: 1px solid black;">'.$articulo[0]->precio.'</td>
            </tr>';
        }
        $tablaArticulos .= '</table>';
        $tarifa = \App\Tarifa::where('id',$user[0]->id_tarifa)->get();
        $descuento = ($coste * $tarifa[0]->descuento)/100;
        $costeFinal = $coste - $descuento;
        
        $factura = '<h1>Justificante de reserva:</h1>'
                    .'<h2>Detalles:</h2>'
                    .'<p><span style="font-weight: bold;">Fecha:</span> '.strftime("%A, %d de %B de %Y",strtotime($fecha_alquiler)).'</p>'
                    .'<p><span style="font-weight: bold;">Cliente:</span> '.$user[0]->name.'</p>'
                    .'<p><span style="font-weight: bold;">Email:</span> '.$user[0]->email.'</p>'
                    .'<p><span style="font-weight: bold;">Ubicacion:</span> '.$ubicacion[0]->name
                    .'<p><span style="font-weight: bold;">Espacio:</span> '.$espacio[0]->description
                    .' <span style="font-weight: bold;">Planta:</span> '.$espacio[0]->floor
                    .' <span style="font-weight: bold;">Número:</span> '.$espacio[0]->number. '</p>'
                    .$tablaArticulos
                    .'<p><span style="font-weight: bold;">Coste:</span> '.round($coste,2).' € </p>'
                    .'<p><span style="font-weight: bold;">Descuento:</span> -'.$descuento.' € ('.$tarifa[0]->descuento.'%) </p>'
                    .'<p><span style="font-weight: bold;">Total (IVA incluido):</span> '.round($costeFinal,2).' € </p>'
                    .'<p><span style="font-weight: bold;">IBAN:</span> ESXX ABCD EFGH IJKL MNOP QRST</p>'
                    .'<hr>'
                    .'<p><span style="font-weight: bold;">NOTA ACLARATORIA:</span> adjuntar justificante de pago al correo para hacer valida la reserva, al menos con 72 horas de antelación a la reserva realizada.</p>'
                    ;
                    
        return  $factura;
        
    }
}
