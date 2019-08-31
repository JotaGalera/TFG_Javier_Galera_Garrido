<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AlquilerController extends Controller
{
    public function index()
    {
        $obj = \App\Alquiler::all();
        return view('alquiler.alquiler');
    }

    public function show($id)
    {
        $obj = \App\Alquiler::find($id);
        return $obj;
    }

    public function destroy($id)
    {
        $obj = \App\Alquiler::find($id);
        $obj->delete();
        return $obj;
    }

    public function numAlquilerTotal(){
        $obj = \App\Alquiler::all()->count();
        return $obj;
    }

    public function numAlquilerPagado(){
        $obj = \App\Alquiler::where('pagado','1')->count();
        return $obj;
    }

    public function getDataTable()
    {
        return Datatables::of(\App\Alquiler::all())
        ->addColumn('name_user', function($obj){
            $nombre_user = \App\User::where('id','like',$obj['user_id'])->get();
            return $nombre_user[0]['name'];  
        })
        ->addColumn('name_space', function($obj){
            $nombre_space = \App\Espacio::where('id','like',$obj['espacio_id'])->get();
            return $nombre_space[0]['description'].', piso:'.$nombre_space[0]['floor'].', number:'.$nombre_space[0]['number'];
        })
        ->addColumn('action', function($obj){
        return '<a href="#" data-toggle="tooltip" title="Cancelar alquiler" class="btn btn-xs btn-danger delete-alquiler" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
        })->rawColumns(['action'])->make(true);
    }

    public function getDataTablePagados()
    {
        return Datatables::of(\App\Alquiler::where('pagado','1'))
        ->addColumn('name_user', function($obj){
            $nombre_user = \App\User::where('id','like',$obj['user_id'])->get();
            return $nombre_user[0]['name'];  
        })
        ->addColumn('name_space', function($obj){
            $nombre_space = \App\Espacio::where('id','like',$obj['espacio_id'])->get();
            return $nombre_space[0]['description'].', piso:'.$nombre_space[0]['floor'].', number:'.$nombre_space[0]['number'];
        })
        ->addColumn('action', function($obj){
        return '<a href="#" data-toggle="tooltip" title="Cancelar alquiler" class="btn btn-xs btn-danger delete-alquiler" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
        })->rawColumns(['action'])->make(true);
    }
}
