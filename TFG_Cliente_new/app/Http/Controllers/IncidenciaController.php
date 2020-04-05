<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Auth;

class IncidenciaController extends Controller
{
    public function index()
    {
        return view('incidencias.index');
    }
    public function getUser(){
      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/user', [
                                  'headers' => ['Content-Type' => 'application/json',
                                                'Authorization' => 'Bearer '.session()->get('token_api')]
                          ]);
      $obj = json_decode($res->getBody(),true);
      return $obj;
    }

    public function all()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/incidencia/all', [
                                    'headers' => ['Content-Type' => 'application/json',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')]
                            ]);
        $obj = json_decode($res->getBody());
        return $obj;
    }
    public function update(Request $request, $id){


      $validateData = $request->validate([
          'sistema_id'                           => 'required|max:255',
          'incidencia_tipo_id'                   => 'required|max:255',
          'incidencia_prioridad_id'              => 'required|max:255',
          'incidencia_metodo_comunicacion_id'    => 'required|max:255',
          'titulo'                               => 'required|max:255',
          'comunicada_por'                       => 'required|max:255',
      ]);

      if($validateData['comunicada_por'] == null) $validateData['comunicada_por'] = '';

      $client = new \GuzzleHttp\Client();
      $res = $client->put(env("URL_API").'/api/incidencia/'.$id , [
        'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                      'Authorization' => 'Bearer '.session()->get('token_api')],
        'form_params' => [
            'cliente_id' => $request['cliente_id'],
            'titulo' => $validateData['titulo'],
            'descripcion' => $request['descripcion'],
            'observaciones' => $request['observaciones'],
            'fecha' => $request['fecha'],
            'comunicada_por' => $validateData['comunicada_por'],
            'sistema_id' => $validateData['sistema_id'],
            'incidencia_tipo_id' => $validateData['incidencia_tipo_id'],
            'incidencia_prioridad_id' => $validateData['incidencia_prioridad_id'],
            'incidencia_metodo_comunicacion_id' => $validateData['incidencia_metodo_comunicacion_id'],
            'ubicacion_id' => $request['ubicacion_id'],
            'id' => $request['id']

                    ]
      ]);

    $respuesta = json_decode($res->getBody());

    return response()->json(['success'=> $respuesta->success ]);

    }

    public function addEstado(Request $request){
      $admin = $this->getPermisosUsuario();

      if($admin == 1){
        $client = new \GuzzleHttp\Client();
        $res = $client->post(env("URL_API").'/api/incidencia/estado', [
                                    'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')],
                                    'form_params' => [
                                        'incidencia_id' => $request['incidencia_id'],
                                        'estado_id' => $request['estado_id'],
                                        'estado' => $request['estado']
                                    ]
                            ]);

        $respuesta = json_decode($res->getBody());
        return response()->json(['success'=> $respuesta->success ]);
      }else{
        return response();
      }

    }

    public function addDocumento(Request $request){

      $admin = $this->getPermisosUsuario();

      if($admin == 1){
        $image_path = $request['nombre_recurso']->getPathname();
        $image_mime = $request['nombre_recurso']->getmimeType();
        $image_org  = $request['nombre_recurso']->getClientOriginalName();

        $validateData = $request->validate([
           'descripcion'    => 'required|max:255',
           'incidencia_id'   => 'required',
           'nombre_recurso' => 'required|mimes:jpeg,png,jpg,gif,pdf,mp4,mov,sogg',
       ]);


        $client = new \GuzzleHttp\Client();

        $res = $client->post(env("URL_API").'/api/incidencia/documento', [
                                  'headers' => [
                                                'Authorization' => 'Bearer '.session()->get('token_api')],
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
                                              'name'     => 'incidencia_id',
                                              'contents' => $validateData['incidencia_id'],
                                            ]
                                  ]
                          ]);
        $respuesta = json_decode($res->getBody());
        return response()->json(['success'=> $respuesta->success ]);
      }else{
        return response();
      }
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'sistema_id'                           => 'required|max:255',
            'incidencia_tipo_id'                   => 'required|max:255',
            'incidencia_prioridad_id'              => 'required|max:255',
            'incidencia_metodo_comunicacion_id'    => 'required|max:255',
            'titulo'                               => 'required|max:255',
            'comunicada_por'                       => 'required|max:255',
        ]);

        if($validateData['comunicada_por'] == null) $validateData['comunicada_por'] = '';

        $client = new \GuzzleHttp\Client();

        $resLogIN = $client->post(env("URL_API").'/api/incidencia', [
                                    'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')],
                                    'form_params' => [
                                        'titulo' => $validateData['titulo'],
                                        'descripcion' => $request['descripcion'],
                                        'observaciones' => $request['observaciones'],
                                        'fecha' => $request['fecha'],
                                        'comunicada_por' => $validateData['comunicada_por'],
                                        'sistema_id' => $validateData['sistema_id'],
                                        'incidencia_tipo_id' => $validateData['incidencia_tipo_id'],
                                        'incidencia_prioridad_id' => $validateData['incidencia_prioridad_id'],
                                        'incidencia_metodo_comunicacion_id' => $validateData['incidencia_metodo_comunicacion_id']
                                    ]
                            ]);

        $respuesta = json_decode($resLogIN->getBody());

        return response()->json(['success'=> $respuesta->success ]); ;
    }
    public function showTableDocumento($actuacion_id){
      $client = new \GuzzleHttp\Client();
      $res = $client->get (env("URL_API").'/api/incidencia/documento/showTable/'.$actuacion_id, [
              'headers' => ['Content-Type' => 'application/json',
                            'Authorization' => 'Bearer '.session()->get('token_api')]
      ]);
      $obj = json_decode($res->getBody(),true);
      return $obj;
    }

    public function showTableEstado($incidencia_id){
      $client = new \GuzzleHttp\Client();
      $res = $client->get (env("URL_API").'/api/incidencia/estado/showTable/'.$incidencia_id, [
              'headers' => ['Content-Type' => 'application/json',
                            'Authorization' => 'Bearer '.session()->get('token_api')]
      ]);
      $obj = json_decode($res->getBody(),true);
      return $obj;
    }

    public function getDataTable($estado)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get (env("URL_API").'/api/incidencia/getdatatable/'.$estado, [
                'headers' => ['Content-Type' => 'application/json',
                              'Authorization' => 'Bearer '.session()->get('token_api')]
        ]);
        return Datatables::of(json_decode($res->getBody()))
        ->editColumn('sistema', function($obj){
            return $obj->sistema->descripcion;
        })->editColumn('prioridad', function($obj){
            $nombreAUX = '';
            if($obj->incidencia_prioridad_id != null)
            {
                if($obj->incidencia_prioridad->id == 1) $nombreAUX = '<small class="label bg-green">'. $obj->incidencia_prioridad->nombre.'</small>';
                else $nombreAUX = '<small class="label bg-red">'. $obj->incidencia_prioridad->nombre.'</small>';
            }
            return $nombreAUX;
        })->editColumn('metodo_comunicacion', function($obj){
            if(!(empty($obj->incidencia_metodo_comunicacion->nombre)))
              return $obj->incidencia_metodo_comunicacion->nombre;

        })->addColumn('estado', function($obj){
            $textoEstado = '';
            switch($obj->estado){
                case 1:
                    $textoEstado = '<small class="label bg-red">Registrada</small>';
                    break;
                case 2:
                    $textoEstado = '<small class="label bg-orange">En Proceso</small>';
                    break;
                case 3:
                    $textoEstado = '<small class="label bg-primary">Pendiente de terceros</small>';
                    break;
                case 4:
                    $textoEstado = '<small class="label bg-green">Finalizada</small>';
                    break;
            }
            return $textoEstado;
        })->editColumn('user', function($obj){
            $nombreAUX = '';
            if($obj->user == null)
              return "null";
            else
              return $obj->user->name;
        })->editColumn('fecha', function($obj){
            if($obj->fecha == null) $fechaFormated = '';
            else $fechaFormated = \Carbon\Carbon::createFromFormat( 'Y-m-d' , $obj->fecha)->format('d/m/Y');
            return $fechaFormated;
        })->addColumn('action', function($obj){
            return '<a href="/incidencia/'.$obj->id.'/edit" class="btn btn-xs btn-success" id="'.$obj->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
        })->rawColumns(['action','prioridad','estado'])->make(true);
    }

    public function selectIncidencia(Request $request){

        $client = new \GuzzleHttp\Client();
        $res = $client->get (env("URL_API").'/api/incidencia/find?q='.$request->q, [
                'headers' => ['Content-Type' => 'application/json',
                              'Authorization' => 'Bearer '.session()->get('token_api')]
        ]);
        $obj = json_decode($res->getBody(),true);
        return $obj;

    }
    public function allTipoEstado(){
      $client = new \GuzzleHttp\Client();
      $res = $client->get (env("URL_API").'/api/incidencia/tipo_estado/all', [
              'headers' => ['Content-Type' => 'application/json',
                            'Authorization' => 'Bearer '.session()->get('token_api')]
      ]);
      $obj = json_decode($res->getBody(),true);
      return $obj;
    }

    public function getDataTableEstado($incidencia_id)
    {


        $client = new \GuzzleHttp\Client();
        $res = $client->get (env("URL_API").'/api/incidencia/estado/getdatatable/'.$incidencia_id, [
                'headers' => ['Content-Type' => 'application/json',
                              'Authorization' => 'Bearer '.session()->get('token_api')]
        ]);
        return Datatables::of(json_decode($res->getBody()))
        ->addColumn('estado', function($obj){
            $textoEstado = '';
            switch($obj->estado_id){
                case 1:
                    $textoEstado = '<small class="label bg-red">Registrada</small>';
                    break;
                case 2:
                    $textoEstado = '<small class="label bg-orange">En Proceso</small>';
                    break;
                case 3:
                    $textoEstado = '<small class="label bg-primary">Pendiente de terceros</small>';
                    break;
                case 4:
                    $textoEstado = '<small class="label bg-green">Finalizada</small>';
                    break;
            }
            return $textoEstado;
        })->addColumn('descripcion', function($obj){
            return $obj->estado;
        })->editColumn('user', function($obj){
            $nombreAUX = '';
            return $obj->user->name;
        })->editColumn('fecha', function($obj){
            if($obj->created_at == null) $fechaFormated = '';
            else $fechaFormated = \Carbon\Carbon::createFromFormat( 'Y-m-d H:i:s' , $obj->created_at)->format('d/m/Y H:i:s');
            return $fechaFormated;
        })->addColumn('action', function($obj){
            $admin = $this->getPermisosUsuario();
            if($admin==1)return '<a href="#" class="btn btn-xs btn-danger delete-incidenciaEstado soloAdmin" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            else return '';
        })->rawColumns(['action','prioridad','estado'])->make(true);
    }
    public function getDataTableDocumento($incidencia_id)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get (env("URL_API").'/api/incidencia/documento/getdatatable/'.$incidencia_id, [
                'headers' => ['Content-Type' => 'application/json',
                              'Authorization' => 'Bearer '.session()->get('token_api')]
        ]);
        return Datatables::of(json_decode($res->getBody()))
        ->addColumn('recurso', function($obj){
            return '<a href="'.env("URL_API").'/storage/incidencia_documento/'.$obj->ruta_recurso.'" target="_blank">'.$obj->nombre_recurso.'</a>';
        })->addColumn('action', function($obj){
          $admin = $this->getPermisosUsuario();
          if($admin==1)
              return '<a href="#" class="btn btn-xs btn-danger delete-incidenciaDocumento" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
          else return '';
        })->rawColumns(['recurso','action'])->make(true);
    }
    public function getDataTableActuacion($incidencia_id)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get (env("URL_API").'/api/incidencia/actuacion/getdatatable/'.$incidencia_id, [
                'headers' => ['Content-Type' => 'application/json',
                              'Authorization' => 'Bearer '.session()->get('token_api')]
        ]);
        return Datatables::of(json_decode($res->getBody()))
        ->editColumn('estado', function($obj){
            if($obj->actuacion_tipo_estado !== null) return $obj->actuacion_tipo_estado->nombre;
            else return '';
        })->editColumn('sistema', function($obj){
            return $obj->sistema->descripcion;
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
            $nombreAUXini = substr($obj->hora_ini, 0, 5);
            return $nombreAUXini;
        })->editColumn('hora_fin', function($obj){
            $nombreAUXfin = substr($obj->hora_fin, 0, 5);
            return $nombreAUXfin;
        })->editColumn('fecha', function($obj){
            if($obj->fecha == null) $fechaFormated = '';
            else $fechaFormated = \Carbon\Carbon::createFromFormat( 'Y-m-d' , $obj->fecha)->format('d/m/Y');
            return $fechaFormated;
        })->addColumn('action', function($obj){
            $admin = $this->getPermisosUsuario();
            if($admin==1)
              return '<a href="/incidencia/actuacion/parte/'.$obj->id.'" class="btn btn-xs btn-success" id="'.$obj->id.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-primary edit" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-danger delete" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            else return '<a href="/incidencia/actuacion/parte/'.$obj->id.'" class="btn btn-xs btn-success" id="'.$obj->id.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>';
        })->rawColumns(['action','presencial','cerrada','asignada'])->make(true);
    }

    public function show($id_incidencia)
    {
      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/incidencia/'.$id_incidencia, [
                                  'headers' => ['Content-Type' => 'application/json',
                                                'Authorization' => 'Bearer '.session()->get('token_api')]
                          ]);
      $obj = $res->getBody();
      return $obj;
    }

    public function showIncidenciaUsuario($id_incidencia)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/incidencia/user/'.$id_incidencia, [
                                    'headers' => ['Content-Type' => 'application/json',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')]
                            ]);
        $obj = $res->getBody();
        return $obj;
    }
    public function edit($id)
    {
        return view( 'incidencias.edit', compact('id'));
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
    public function deleteEstado($id){
      $client = new \GuzzleHttp\Client();
      $res = $client->delete(env("URL_API").'/api/incidencia/estado/'.$id, [
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')]
      ]);

      $obj = $res->getBody();
      return $obj;
    }
    public function deleteDocumento($idIncidenciaDocumento){
      $client = new \GuzzleHttp\Client();
      $res = $client->delete(env("URL_API").'/api/incidencia/documento/'.$idIncidenciaDocumento, [
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')]
      ]);

      $obj = $res->getBody();
      return $obj;
    }

    public function getPermisosUsuario(){
      $admin = 0;
      $usuario = $this->getUser();

      foreach( $usuario['roles'] as $roles){
        if($roles['id'] == 5)
         $admin = 1;
      }
      return $admin;
    }
}
