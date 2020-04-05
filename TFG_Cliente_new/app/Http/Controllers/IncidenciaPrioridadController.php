<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class IncidenciaPrioridadController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/incidencia/prioridad', [
                                    'headers' => ['Content-Type' => 'application/json',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')]
                            ]);
        $obj = json_decode($res->getBody());
        return $obj;
    }
}