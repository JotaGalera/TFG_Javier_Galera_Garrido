<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ActuacionController extends Controller
{
  public function index()
  {
      return view('actuaciones.index');
  }


  public function deleteActuacionUser($id_usuario){
    $client = new \GuzzleHttp\Client();
    $res = $client->delete(env("URL_API").'/api/actuacion/user/'.$id_usuario, [
                          'headers' => ['Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '.session()->get('token_api')],
                    ]);

    $obj = json_decode($res->getBody(),true);
    return $obj;

  }

  public function deleteCorreo($idActuacionUser){
    $client = new \GuzzleHttp\Client();
    $res = $client->delete(env("URL_API").'/api/actuacion/correo/'.$idActuacionUser, [
                          'headers' => ['Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '.session()->get('token_api')],
                    ]);

    $obj = json_decode($res->getBody(),true);
    return $obj;

  }

  public function addCorreo(Request $request){
    $validateData = $request->validate([
        'correo'       => 'email|required|max:255',
        'actuacion_id' => 'required',
    ]);

    $client = new \GuzzleHttp\Client();
    $res = $client->post(env("URL_API").'/api/actuacion/correo',[
                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                              'Authorization' => 'Bearer '.session()->get('token_api')],
                'form_params' => [
                    'correo' => $validateData['correo'],
                    'actuacion_id' => $validateData['actuacion_id']
                  ]
              ]);

    $respuesta = json_decode($res->getBody());
    return response()->json(['success'=> $respuesta->success ]);
  }

  public function addUser(Request $request){

    $validateData = $request->validate([
        'user_id'       => 'required|max:255',
        'firma'         => 'required|max:255',
        'reservada'     => 'max:255',
        'preasignacion' => 'max:255',
        'actuacion_id'  => 'required',
    ]);

    $client = new \GuzzleHttp\Client();
    $res = $client->post(env("URL_API").'/api/actuacion/user' , [
                                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                                              'Authorization' => 'Bearer '.session()->get('token_api')],
                                'form_params' => [
                                    'actuacion_id' => $validateData['actuacion_id'],
                                    'firma' => $validateData['firma'],
                                    'preasignacion' => $validateData['preasignacion'],
                                    'reservada' => $validateData['reservada'],
                                    'user_id' => $validateData['user_id']
                                  ]
                        ]);

    $respuesta = json_decode($res->getBody());
    return response()->json(['success'=> $respuesta->success ]);

  }

  public function addDocumento(Request $request){

    $image_path = $request['nombre_recurso']->getPathname();
    $image_mime = $request['nombre_recurso']->getmimeType();
    $image_org  = $request['nombre_recurso']->getClientOriginalName();


    $validateData = $request->validate([
       'descripcion'    => 'required|max:255',
       'actuacion_id'   => 'required',
       'nombre_recurso' => 'required|mimes:jpeg,png,jpg,gif,pdf,mp4,mov,sogg',
       'tipo'           => 'required|max:2048',
   ]);


    $client = new \GuzzleHttp\Client();
    $res = $client->post(env("URL_API").'/api/actuacion/documento', [
          'headers' => ['Authorization' => 'Bearer '.session()->get('token_api')],
          'multipart' => [
              [
                'name'     => 'nombre_recurso',
                'filename' => $image_org,
                'contents' => fopen( $image_path, 'r' ),
              ],
              [
                'name'     => 'descripcion',
                'contents' => $validateData['descripcion'],
              ],
              [
                'name'     => 'actuacion_id',
                'contents' => $validateData['actuacion_id'],
              ],
              [
                'name'     => 'tipo',
                'contents' => $validateData['tipo'],
              ]
            ]
    ]);
    $respuesta = json_decode($res->getBody());
    return response()->json(['success'=> $respuesta->success ]);

  }

  public function store(Request $request){



    $validateData = $request->validate([
      'sistema_id'                           => 'required|max:255',
      'nombre'                               => 'required|max:255',
      'hora_ini'                             => 'nullable|date_format:H:i',
      'hora_fin'                             => 'nullable|date_format:H:i',
      'tiempo_estimado'                      => 'nullable|date_format:H:i',
      'presencial'                           => 'max:255',
      'actuacion_tipo_estado_id'             => 'required|max:255',
      'n_desplazamientos'                    => 'max:255',
      'km'                                   => 'max:255',
      'latitud_gps'                          => 'max:255',
      'longitud_gps'                         => 'max:255',
      'firmada_por'                          => 'max:255',
      'cerrada'                              => 'max:255',
      'incidencia_id'                        => 'nullable|max:255',
      'fecha'                                => 'required'
    ]);


    if($request['hora_ini'] == null) $validateData['hora_ini'] = '';
    if($request['hora_fin'] == null) $validateData['hora_fin'] = '';
    if($request['tiempo_estimado'] == null) $validateData['tiempo_estimado'] = '';
    if($request['incidencia_id'] == null) $validateData['incidencia_id'] = '';
    if($request['firmada_por'] == null) $validateData['firmada_por'] = '';
    if($request['latitud_gps'] == null) $validateData['latitud_gps'] = '';
    if($request['longitud_gps'] == null) $validateData['longitud_gps'] = '';
    if($request['km'] == null) $validateData['km'] = '';
    if($request['n_desplazamientos'] == null) $validateData['n_desplazamientos'] = '';




    if($request['fecha'] != '') $request['fecha'] = \Carbon\Carbon::createFromFormat( 'd/m/Y', $request['fecha'] )->format('Y-m-d');
    else $request['fecha']   = null;

    if($request['presencial'] == 'on' || !isset($request['presencial'])) $request['presencial'] = isset($request['presencial']) ? 1 : 0;
    if($request['cerrada'] == 'on' || !isset($request['cerrada'])) $request['cerrada'] = isset($request['cerrada']) ? 1 : 0;


    $client = new \GuzzleHttp\Client();
    $res = $client->post(env("URL_API").'/api/actuacion' , [
                                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                                              'Authorization' => 'Bearer '.session()->get('token_api')],
                                'form_params' => [
                                    'sistema_id' => $request['sistema_id'],
                                    'nombre' => $validateData['nombre'],
                                    'fecha' => $validateData['fecha'],
                                    'hora_ini' => $validateData['hora_ini'],
                                    'hora_fin' => $validateData['hora_fin'],
                                    'tiempo_estimado' => $request['tiempo_estimado'],
                                    'presencial' => $request['presencial'],
                                    'actuacion_tipo_estado_id' => $request['actuacion_tipo_estado_id'],
                                    'n_desplazamientos' => $validateData['n_desplazamientos'],
                                    'km' => $validateData['km'],
                                    'latitud_gps' => $validateData['latitud_gps'],
                                    'longitud_gps' => $validateData['longitud_gps'],
                                    'firmada_por' => $validateData['firmada_por'],
                                    'cerrada' => $request['cerrada'],
                                    'incidencia_id' => $validateData['incidencia_id'],
                                    'descripcion' => $request['descripcion'],
                                    'observaciones' => $request['observaciones']
                                ]
                        ]);

    $respuesta = json_decode($res->getBody());
    return response()->json(['success'=> $respuesta->success ]);

  }

  public function actuacionUserAll(){
    $client = new \GuzzleHttp\Client();
    $res = $client->get(env("URL_API").'/api/user/all' , [
                          'headers' => ['Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '.session()->get('token_api')],
                    ]);

    $obj = json_decode($res->getBody(),true);
    return $obj;
  }
  public function showTableDocumentos($actuacion_id){
    $client = new \GuzzleHttp\Client();
    $res = $client->get(env("URL_API").'/api/actuacion/documento/showTable/'.$actuacion_id, [
                                'headers' => ['Content-Type' => 'application/json',
                                'Authorization' => 'Bearer '.session()->get('token_api')]
                        ]);
    $obj = json_decode($res->getBody());
    return $obj;


  }

  public function showTableCorreo($actuacion_id){
    $client = new \GuzzleHttp\Client();
    $res = $client->get(env("URL_API").'/api/actuacion/correo/showTable/'.$actuacion_id, [
                                'headers' => ['Content-Type' => 'application/json',
                                'Authorization' => 'Bearer '.session()->get('token_api')]
                        ]);
    $obj = json_decode($res->getBody());
    return $obj;

  }

  public function showTableUser($actuacion_id){
      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/actuacion/user/showTable/'.$actuacion_id , [
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')],
                      ]);

      $obj = json_decode($res->getBody(),true);
      return $obj;

  }

  public function getActuacionParte($actuacion_id)
  {
    $client = new \GuzzleHttp\Client();
    $res = $client->get(env("URL_API").'/api/incidencia/actuacion/parte/'.$actuacion_id, [
                          'headers' => ['Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '.session()->get('token_api')]
    ]);

    $obj = $res->getBody();

    $conv = new \Anam\PhantomMagick\Converter();

    $options = [
        'format' => 'A4',
        'orientation' => 'portrait',
        'margin' => '0cm'
      ];

    $conv->addPage($obj)
        ->toPdf()
        ->setPdfOptions($options)
        ->serve();
  }

  public function getDataTable($estado){


    $client = new \GuzzleHttp\Client();
    $res = $client->get(env("URL_API").'/api/actuacion/getdatatable/'.$estado, [
                                'headers' => ['Content-Type' => 'application/json',
                                'Authorization' => 'Bearer '.session()->get('token_api')]
                        ]);
    $obj = json_decode($res->getBody());
    return Datatables::of($obj)
    ->editColumn('estado', function($obj){
        $nombreAUX = '';
        if($obj->actuacion_tipo_estado_id != null)
        {
            $nombreAUX = $obj->actuacion_tipo_estado_id;
        }
        return $nombreAUX;
    })->addColumn('cliente', function($obj){

        return $obj->sistema->cliente_ubicacion->cliente->codigo.' | '.$obj->sistema->cliente_ubicacion->nombre;
    })->editColumn('sistema', function($obj){
        $nombreAUX = '';
        if($obj->sistema_id != null)
        {
            $nombreAUX = $obj->sistema->descripcion;
        }
        return $nombreAUX;
    })->editColumn('presencial', function($obj){
        $nombreAUX = '';
        if($obj->presencial == "1") $nombreAUX = '<small class="label bg-gray">Si</small>';
        else $nombreAUX = '<small class="label bg-primary">No</small>';
        return $nombreAUX;
    })->editColumn('cerrada', function($obj){
        $nombreAUX = '';
        if($obj->cerrada == "1") $nombreAUX = '<small class="label bg-green">Si</small>';
        else $nombreAUX = '<small class="label bg-red">No</small>';
        return $nombreAUX;
    })->editColumn('hora_ini', function($obj){
        $nombreAUX = substr($obj->hora_ini, 0, 5);
        return $nombreAUX;
    })->editColumn('hora_fin', function($obj){
        $nombreAUX = substr($obj->hora_ini, 0, 5);
        return $nombreAUX;
    })->editColumn('fecha', function($obj){
        if($obj->fecha == null) $fechaFormated = '';
        else $fechaFormated = \Carbon\Carbon::createFromFormat( 'Y-m-d' , $obj->fecha)->format('d/m/Y');
        return $fechaFormated;
    })->addColumn('asignada', function($obj){
        $nombreAUX = '';
        if($obj->incidencia_id != null) $nombreAUX = '<small class="label bg-green">Incidencia</small>';
        else $nombreAUX = '<small class="label bg-red">Sin asignar</small>';
        return $nombreAUX;
    })->addColumn('action', function($obj){
        return '<a href="#" class="btn btn-xs btn-warning mail" id="'.$obj->id.'" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a> <a href="/actuacion/parte/'.$obj->id.'" class="btn btn-xs btn-success" id="'.$obj->id.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-primary edit" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a>' ;
    })->rawColumns(['action','presencial','cerrada','asignada','CE'])->make(true);

  }



  public function show($id){
    $client = new \GuzzleHttp\Client();
    $res = $client->get(env("URL_API").'/api/actuacion/'.$id , [
                          'headers' => ['Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '.session()->get('token_api')],
                    ]);

    $obj = json_decode($res->getBody(),true);
    return $obj;
  }


  public function all(){
      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/actuacion/estado/tipo/all', [
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')],
                      ]);

      $obj = json_decode($res->getBody(),true);
      return $obj;
  }

  public function update(Request $request, $id){



    $validateData = $request->validate([
          'sistema_id'                           => 'required|max:255',
          'nombre'                               => 'required|max:255',
          'hora_ini'                             => 'nullable|date_format:H:i',
          'hora_fin'                             => 'nullable|date_format:H:i',
          'tiempo_estimado'                      => 'nullable|date_format:H:i',
          'presencial'                           => 'max:255',
          'fecha'                                => 'required',
          'actuacion_tipo_estado_id'             => 'nullable|max:255',
          'n_desplazamientos'                    => 'max:255',
          'km'                                   => 'max:255',
          'latitud_gps'                          => 'max:255',
          'longitud_gps'                         => 'max:255',
          'firmada_por'                          => 'max:255',
          'cerrada'                              => 'max:255',
          'incidencia_id'                        => 'nullable|max:255',
    ]);

    $fechaPARSE = null;
    if($request['fecha'] != '') $fechaPARSE = \Carbon\Carbon::createFromFormat( 'd/m/Y', $request->get('fecha') )->format('Y-m-d');
    if($request['cerrada'] == "") $cerrada = ""; else $cerrada = "1";
    if($request['presencial'] == "") $presencial = ""; else $presencial = "1";

    $client = new \GuzzleHttp\Client();
    $res = $client->put(env("URL_API").'/api/actuacion/'.$id , [
          'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '.session()->get('token_api')],
          'form_params' => [
            'sistema_id'                           => $validateData['sistema_id'],
            'nombre'                               => $validateData['nombre'],
            'hora_ini'                             => $validateData['hora_ini'],
            'hora_fin'                             => $validateData['hora_fin'],
            'tiempo_estimado'                      => $validateData['tiempo_estimado'],
            'presencial'                           => $presencial,
            'fecha'                                => $validateData['fecha'],
            'actuacion_tipo_estado_id'             => $validateData['actuacion_tipo_estado_id'],
            'n_desplazamientos'                    => $validateData['n_desplazamientos'],
            'km'                                   => $validateData['km'],
            'latitud_gps'                          => $validateData['latitud_gps'],
            'longitud_gps'                         => $validateData['longitud_gps'],
            'firmada_por'                          => $validateData['firmada_por'],
            'cerrada'                              => $cerrada,
            'incidencia_id'                        => $validateData['incidencia_id'],
            'descripcion'                          => $request['descripcion'],
            'observaciones'                        => $request['observaciones'],
            'id'                                   => $request['id']
          ]
    ]);

    $respuesta = json_decode($res->getBody());
    return response()->json(['success'=> $respuesta->success ]);

  }
  public function sendMailActuacion($actuacion_id)
  {
    $client = new \GuzzleHttp\Client();
    $res = $client->get(env("URL_API").'/api/actuacion/parte/send/'.$actuacion_id, [
      'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '.session()->get('token_api')]
                  ]);
    return $res;
  }

  public function destroy($idActuacion){
    $client = new \GuzzleHttp\Client();
    $res = $client->delete(env("URL_API").'/api/actuacion/'.$idActuacion , [
      'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '.session()->get('token_api')]
                  ]);
    return $res;

  }

  public function deleteDocumento($idActuacionDocumento){
    $client = new \GuzzleHttp\Client();
    $res = $client->delete(env("URL_API").'/api/actuacion/documento/'.$idActuacionDocumento, [
      'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '.session()->get('token_api')]
                  ]);
    return $res;
  }
}
