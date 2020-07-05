<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index()
    {
        $roles = \App\Role::all();
        $ubicacion = \App\Ubicacion::all();
        return view('user.index', compact('roles','ubicacion'));
    }

    public function all(){
        $client = new \GuzzleHttp\Client();
        $res = $client->get(env("URL_API").'/api/user/all', [
                                    'headers' => ['Content-Type' => 'application/json',
                                                  'Authorization' => 'Bearer '.session()->get('token_api')]
                            ]);
        $obj = json_decode($res->getBody());
        return $obj;
    }
}
