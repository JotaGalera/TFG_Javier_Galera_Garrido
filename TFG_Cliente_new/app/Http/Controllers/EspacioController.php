<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class EspacioController extends Controller
{
    public function index()
    {
        $obj = \App\Espacio::all();
        $articulo = \App\Articulo::all();
        return view('listado.listado', compact('articulo'));
    }

    public function getEspacioUbicacion($ubicacion_id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get("http://tfggit.com/api/espacio/getespacioubicacion/". $ubicacion_id, [
            'headers' => ['Authorization' => 'Bearer ' . session()->get('token_api')]
        ]);
        $response_body = json_decode($response->getBody()->getContents());
        return $response_body;
    }
}
