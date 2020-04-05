<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ClienteController extends Controller
{

    public function all()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/cliente/all', [
                                    'headers' => ['Content-Type' => 'application/json',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')]
                            ]);
        $obj = json_decode($res->getBody());
        return $obj;
    }


    public function getUbicaciones($id, Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/cliente/ubicaciones/find/'.$id.'?q='.$request->q , [
                                    'headers' => ['Content-Type' => 'application/json',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')]
                            ]);
        $obj = json_decode($res->getBody());
        return $obj;
    }
    public function getSistemas($ubicacion_id)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/cliente/ubicacion/sistemas/'.$ubicacion_id, [
                                    'headers' => ['Content-Type' => 'application/json',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')]
                            ]);
        $obj = json_decode($res->getBody());
        return $obj;
    }

    public function selectCliente(Request $request){
        $client = new \GuzzleHttp\Client();
        $res = $client->get (env("URL_API").'/api/cliente/find?q='.$request->q, [
                'headers' => ['Content-Type' => 'application/json',
                              'Authorization' => 'Bearer '.session()->get('token_api')]
        ]);
        $obj = json_decode($res->getBody(),true);
        return $obj;

    }

}
