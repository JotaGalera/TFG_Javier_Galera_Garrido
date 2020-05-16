<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Auth;

class AlquilerController extends Controller
{
    public function index()
    {
        return view('alquiler.alquiler');
    }

    public function destroy($id)
    {   
        $client = new \GuzzleHttp\Client();
        $res = $client->delete("http://tfggit.com/api/alquiler/". $id , [
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer '.session()->get('token_api')],
            'form_params' => [
                'id_alquiler' => $id
            ]
        ]);

        $respuesta = json_decode($res->getBody());
        return $res->getBody();
    }

    public function store(Request $request){
        $newDate = date("Y-m-d", strtotime($request['fecha_alquiler']));

        if($request['notes_mod'] == null) $validateData['notes_mod'] = '';
        
        $client = new \GuzzleHttp\Client();
        $res = $client->post("http://tfggit.com/api/alquiler" , [
                                      'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
                                                    'Authorization' => 'Bearer '.session()->get('token_api')],
                                      'form_params' => [
                                          'fecha_alquiler' => $newDate,
                                          'ubicacion_id' => $request['ubicacion_mod'],
                                          'espacio_id' => $request['espacio_mod'],
                                          'notes' => $request['notas_mod'],
                                          'articulo' => $request->articulo
                                      ]
                              ]);
      
        $respuesta = json_decode($res->getBody());
        return response()->json(['success']);
    }

    public function getDataTableAlquilerUser($id_user)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get("http://tfggit.com/api/alquiler/getdatatable/".$id_user, [
            'headers' => ['Authorization' => 'Bearer ' . session()->get('token_api')]
        ]);
        $response_body = json_decode($response->getBody()->getContents());
        return Datatables::of($response_body)
        ->editColumn('fecha_alquiler', function($response_body){
            if($response_body->fecha_alquiler !== null){
                $newDate = date("d-m-Y", strtotime($response_body->fecha_alquiler)); 
                return $newDate;
            }else return '';
        })
        ->editColumn('ubicacion', function($response_body){
            if($response_body->ubicacion !== null) return $response_body->ubicacion->name;
            else return '';
        })
        ->editColumn('espacio', function($response_body){
            if($response_body->espacio !== null) return $response_body->espacio->description . ", P:" . $response_body->espacio->floor .", N:" . $response_body->espacio->number;
            else return '';
        })
        ->editColumn('nota', function($response_body){
            if($response_body->notes !== null) return $response_body->notes;
            else return '';
        })->addColumn('action', function($response_body){
            return '<a href="#" data-toggle="tooltip" title="Añadir articulos" class="btn btn-xs btn-success add-alquiler-item" id="'.$response_body->id.'"><i class="fa fa-plus-square" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" title="Cancelar alquiler" class="btn btn-xs btn-danger delete-alquiler" id="'.$response_body->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
        })->rawColumns(['action'])->make(true);
    }

    public function getProductsAlquiler($espacio_id){
        $client = new \GuzzleHttp\Client();
        $response = $client->get("http://tfggit.com/api/products/espacio&ubicacion/".$espacio_id, [
            'headers' => ['Authorization' => 'Bearer ' . session()->get('token_api')]
        ]);
        $response_body = json_decode($response->getBody()->getContents());
        return $response_body;
    }
}
