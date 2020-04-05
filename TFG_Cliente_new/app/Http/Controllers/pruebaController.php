<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Yajra\Datatables\Datatables;

class pruebaController extends Controller
{
    public function index()
    {
      return view('prueba.index');
    }
    public function all()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/sistema/all_user', [
                                    'headers' => ['Content-Type' => 'application/json',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')]
        ]);
        $obj = json_decode($res->getBody());

        return DataTables::of($obj)
        ->addColumn('id', function($obj){
          return $obj->id;
        })->make(true);

    }
    public function getDataTable()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/sistema/getdatatable_user', [
                'headers' => ['Content-Type' => 'application/json',
                              'Authorization' => 'Bearer '.session()->get('token_api')]
        ]);
        $obj = json_decode($res->getBody());
        return Datatables::of($obj)
        ->addColumn('cliente', function($obj){
          return $obj->cliente_ubicacion->cliente->nombre;
        })->addColumn('ubicacion', function($obj){
          return $obj->cliente_ubicacion->nombre;
        })->addColumn('tipo', function($obj){
          return $obj->sistema_tipo->nombre;
        })
        ->addColumn('action', function($obj){
            return '<a href="/sistema/libro/'.$obj->id.'" class="btn btn-xs btn-success" id="'.$obj->id.'" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-primary edit" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
        })->rawColumns(['proyecto','action','eventual'])->make(true);
    }

    public function getDataTableInventario($sistema_id)
    {
       $client = new \GuzzleHttp\Client();
       $res = $client->get(env("URL_API").'/api/sistema/inventario/all/'.$sistema_id,[
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')]
       ]);
       $obj = json_decode($res->getBody());
       return Datatables::of($obj);
    }

    public function getLibroCatalogo($sistema_id)
    {
      $client = new \GuzzleHttp\Client();
      $res = $client->get(env("URL_API").'/api/sistema/libro_user/'.$sistema_id, [
                            'headers' => ['Content-Type' => 'application/json',
                                          'Authorization' => 'Bearer '.session()->get('token_api')]
      ]);

      $obj = $res->getBody();
      //return $obj;
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
}
