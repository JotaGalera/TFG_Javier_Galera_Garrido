<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UbicacionController extends Controller
{
    public function index()
    {
        $ubicacion = \App\Ubicacion::all();

        return view('ubicacion.ubicacion');
    }

    public function all()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get("http://tfggit.com/api/ubicacion/all", [
            'headers' => ['Authorization' => 'Bearer ' . session()->get('token_api')]
        ]);
        $response_body = json_decode($response->getBody()->getContents());
        return $response_body;
    }
}
