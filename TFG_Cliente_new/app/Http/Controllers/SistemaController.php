<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Yajra\Datatables\Datatables;
use Illuminate\Http\UploadedFile;

class SistemaController extends Controller
{
    public function index()
    {
      return view('sistemas.index');
    }

    public function all()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/sistema/all', [
                                    'headers' => ['Content-Type' => 'application/json',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')]
                            ]);
        $obj = json_decode($res->getBody());
        return DataTables::of($obj)->make(true);

    }
    public function getDataTable()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/sistema/getdatatable', [
                'headers' => ['Content-Type' => 'application/json',
                              'Authorization' => 'Bearer '.session()->get('token_api')]
        ]);
        $obj = json_decode($res->getBody());
        return Datatables::of($obj)
        ->addColumn('inventario', function($obj){
          return $obj->inventario;
        })->addColumn('cliente', function($obj){
          return $obj->cliente_ubicacion->cliente->nombre;
        })->addColumn('ubicacion', function($obj){
          return $obj->cliente_ubicacion->nombre;
        })->addColumn('tipo', function($obj){
          return $obj->sistema_tipo->nombre;
        })->addColumn('responsable', function($obj){
          return '';
        })->addColumn('action', function($obj){
            return '<a href="/sistema/libro/'.$obj->id.'" class="btn btn-xs btn-success" id="'.$obj->id.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-primary edit" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-danger delete" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
        })->rawColumns(['proyecto','action','eventual'])->make(true);
    }

    public function getDataTableInventario($sistema_id)
    {
       $client = new \GuzzleHttp\Client();
       $res = $client->get(env("URL_API").'/api/sistema/inventario/all/'.$sistema_id,[
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')]
       ]);
       $obj = json_decode($res->getBody(),true);
       return Datatables::of($obj)
       ->editColumn('familia', function($obj){
           return $obj['familia']['nombre'].' ['.$obj['familia']['seccion']['nombre'].']';
       })->editColumn('fecha_install', function($obj){
           if($obj['fecha_install'] == null) $fechaFormated = '';
           else $fechaFormated = \Carbon\Carbon::createFromFormat( 'Y-m-d' , $obj['fecha_install'])->format('d/m/Y');
           return $fechaFormated;
       })->addColumn('action', function($obj){
           return '<a href="#" class="btn btn-xs btn-primary edit-inventario" id="'.$obj['id'].'" style="width:23px; height:23px;"><i class="fa fa-pencil" aria-hidden="true" ></i></a> <a href="#" class="btn btn-xs btn-primary edit-caracteristica-inventario" id="'.$obj['id'].'" style="width:23px; height:23px;"><i class="fa fa-bookmark" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-primary edit-documento-inventario" id="'.$obj['id'].'" style="width:23px; height:23px;"><i class="fa fa-file-image-o" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-danger delete-inventario" id="'.$obj['id'].'" style="width:23px; height:23px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
       })->rawColumns(['proyecto','action','eventual'])->make(true);
    }

    public function getLibroCatalogo($sistema_id)
    {
      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/sistema/libro/'.$sistema_id, [
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')]
      ]);

      $obj = $res->getBody();
      
      $conv = new \Anam\PhantomMagick\Converter();

      $options = [
        'orientation' => 'landscape',
        'margin' => '2cm',
        'width' => '3508px',
        'height' => '2480px',
      ];

      $conv->addPage($obj)
          ->toPdf()
          ->setPdfOptions($options)
          ->serve();
    }
    public function show($sistema_id)
    {
      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/sistema/'.$sistema_id, [
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')]
                                      ]);
      //return $res;
      $obj = $res->getBody();
      return $obj;

    }
    public function showInventario($sistema_inventario_id)
    {

      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/sistema/inventario/'.$sistema_inventario_id, [
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')]
                                      ]);
      //return $res;
      $obj = $res->getBody();
      return $obj;

    }
    public function showTableCaracteristicasInventario($sistema_inventario_id){
      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/sistema/inventario/caracteristica/showTable/'.$sistema_inventario_id, [
                        'headers' => ['Content-Type' => 'application/json',
                                      'Authorization' => 'Bearer '.session()->get('token_api')]
                                    ]);
      $obj = $res->getBody();
      return $obj;
    }


    public function showTableDocumentosCaracteristicasInventario($sistema_inventario_id){
      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/sistema/inventario/documento/showTable/'.$sistema_inventario_id, [
                          'headers' => ['Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer '.session()->get('token_api')]
                                      ]);
                                      $obj = json_decode($res->getBody(),true);
                                      return $obj;
    }


    public function findSelect2Familia(Request $request){

      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/familia/find?q='.$request->q, [
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')],

                        ]);

      $obj = json_decode($res->getBody(),true);
      return $obj;

    }

    public function deleteInventario($sistema_inventario_id){
      $client = new \GuzzleHttp\Client();
      $res = $client->delete(env("URL_API").'/api/sistema/inventario/'.$sistema_inventario_id, [
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')]
                                      ]);
      $obj = $res->getBody();
      return $obj;

    }
    public function deleteInventarioCaracteristica($id_sistema_doc){
      $client = new \GuzzleHttp\Client();
      $res = $client->delete(env("URL_API").'/api/sistema/inventario/caracteristica/'.$id_sistema_doc,[
                              'headers' => ['Content-Type' => 'application/json',
                                            'Authorization' => 'Bearer '.session()->get('token_api')]
                                        ]);
      $obj = $res->getBody();
      return $obj;

    }
    public function deleteDocumentoInventario($idSistemaDoc){
      $client = new \GuzzleHttp\Client();
      $res = $client->delete(env("URL_API").'/api/sistema/inventario/documento/'.$idSistemaDoc,[
                              'headers' => ['Content-Type' => 'application/json',
                                            'Authorization' => 'Bearer '.session()->get('token_api')]
                                        ]);
      $obj = $res->getBody();
      return $obj;

    }

    public function caracteristicaTipo(Request $request){
      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/sistema/inventario/caracteristica/tipo' ,[
                                'headers' => ['Content-Type' => 'application/json',
                                              'Authorization' => 'Bearer '.session()->get('token_api')]
                                          ]);
                                          $obj = json_decode($res->getBody(),true);
                                          return $obj;
    }
    public function createInventario(Request $request){
      $validateData = $request->validate([
          'sistema_id'            => 'required|max:255',
          'familia_id'            => 'required|max:255',
          'marca'                 => 'max:255',
          'modelo'                => 'max:255',
          'cantidad'              => 'max:255',
          'ubicacion'             => 'max:255',
          'observaciones'         => 'max:255',
          'n_serie'               => 'max:255',
          'fecha_install'         => 'nullable|date_format:d/m/Y',
      ]);

      if($request['marca'] == null) $validateData['marca'] = '';
      if($request['modelo'] == null) $validateData['modelo'] = '';
      if($request['cantidad'] == null) $validateData['cantidad'] = '';
      if($request['fecha_install'] == null) $validateData['fecha_install'] = '';
      if($request['ubicacion'] == null) $validateData['ubicacion'] = '';
      if($request['observaciones'] == null) $validateData['observaciones'] = '';
      if($request['n_serie'] == null) $validateData['n_serie'] = '';

      $client = new \GuzzleHttp\Client();
      $res = $client->post(env("URL_API").'/api/sistema/inventario', [
                            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                                          'Authorization' => 'Bearer '.session()->get('token_api')],
                            'form_params' => [
                                        'sistema_id' => $validateData['sistema_id'],
                                        'familia_id' => $validateData['familia_id'],
                                        'marca' => $validateData['marca'],
                                        'modelo' => $validateData['modelo'],
                                        'cantidad' => $validateData['cantidad'],
                                        'ubicacion' => $validateData['ubicacion'],
                                        'observaciones' => $validateData['observaciones'],
                                        'n_serie' => $validateData['n_serie'],
                                        'fecha_install' => $validateData['fecha_install']
                            ]
                      ]);
        $respuesta = json_decode($res->getBody());
        return response()->json(['success'=> $respuesta->success ]);
    }

    public function putInventario(Request $request,$sistema_inventario_id){


      $validateData = $request->validate([
          'familia_id'            => 'max:255',
          'marca'                 => 'max:255',
          'modelo'                => 'max:255',
          'cantidad'              => 'max:255',
          'ubicacion'             => 'max:255',
          'observaciones'         => 'max:255',
          'n_serie'               => 'max:255',
          'fecha_install'         => 'nullable|date_format:d/m/Y',
      ]);

      $client = new \GuzzleHttp\Client();
      $res = $client->put(env("URL_API").'/api/sistema/inventario/'.$sistema_inventario_id, [
                                  'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                                                'Authorization' => 'Bearer '.session()->get('token_api')],
                                  'form_params' => [
                                      'familia_id' => $validateData['familia_id'],
                                      'articulo_id_entrada' => '',
                                      'marca' => $validateData['marca'],
                                      'modelo' => $validateData['modelo'],
                                      'cantidad' => $validateData['cantidad'],
                                      'ubicacion' => $validateData['ubicacion'],
                                      'observaciones' => $validateData['observaciones'],
                                      'n_serie' => $validateData['n_serie'],
                                      'fecha_install' => $validateData['fecha_install']
                                  ]
                          ]);

      $respuesta = json_decode($res->getBody());
      return response()->json(['success'=> $respuesta->success ]);

    }

    public function createCaracteristicaInventario(Request $request){
        $client = new \GuzzleHttp\Client();
        $res = $client->post(env("URL_API").'/api/sistema/inventario/caracteristica' , [
                                    'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')],
                                    'form_params' => [
                                        'caracteristica_tipo_id' => $request['caracteristica_tipo_id'],
                                        'sistema_inventario_id' => $request['sistema_inventario_id'],
                                        'descripcion' => $request['descripcion'],
                                        'valor' => $request['valor']
                                    ]
                            ]);

        $respuesta = json_decode($res->getBody());
        return response()->json(['success'=> $respuesta->success ]);

    }

    /* NO FUNCIONA LA SUBIDA DE IMAGENES */
    public function createDocumentoInventario(Request $request){

      $content = file_get_contents($request->nombre_recurso);
      $content2 = $request->nombre_recurso->getClientOriginalName();
      $path = $request->nombre_recurso->getPathname();
      $content4 = $request->file('nombre_recurso');
      $content5 = (string)fopen($content4,'r');


      $client = new \GuzzleHttp\Client();



      $image_path = $request['nombre_recurso']->getPathname();
      $image_mime = $request['nombre_recurso']->getmimeType();
      $image_org  = $request['nombre_recurso']->getClientOriginalName();

      $res = $client->post(env("URL_API").'/api/sistema/inventario/documento', [
            'headers' => ['Authorization' => 'Bearer '.session()->get('token_api')],
            'multipart' => [
          			[
          				'name'     => 'nombre_recurso',
          				'filename' => $image_org,
          				'contents' => fopen( $image_path, 'r' ),
          			],
                [
          				'name'     => 'descripcion',
          				'contents' => $request['descripcion'],
          			],
                [
          				'name'     => 'sistema_inventario_id',
          				'contents' => $request['sistema_inventario_id'],
          			],
          		]
    	]);
      $respuesta = json_decode($res->getBody());
      return response()->json(['success'=> $respuesta->success ]);


  }


    /***********************************************/


    public function showTableDocumentos($sistema_id){
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/sistema/documento/showTable/'.$sistema_id, [
                              'headers' => ['Content-Type' => 'application/json',
                                            'Authorization' => 'Bearer '.session()->get('token_api')]
                                        ]);

        $obj = json_decode($res->getBody(),true);
        return $obj;

    }
}
