<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use \Lcobucci\JWT\Parser;
use \Laravel\Passport\Token;

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
        
        $obj = \App\AlquilerItems::where('alquiler_id',$id)->get();
        print_r("holaasd");
        foreach($obj as $item){
            print_r("hola".$item);
            $item->delete();
        }

        $obj = \App\Alquiler::find($id);
        $obj->delete();
        return $obj;
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'fecha_alquiler'                       => 'required',
            'ubicacion_id'                         => 'required|max:255',
            'espacio_id'                           => 'required|max:255',
            'notes'                                => 'max:255'
          ]);
        
        $obj = \App\Alquiler::create([
            'fecha_alquiler'    => $request['fecha_alquiler'],
            'user_id'           => auth()->user()->id,
            'ubicacion_id'      => $request['ubicacion_id'],
            'espacio_id'        => $request['espacio_id'],
            'notes'             => $request['notes'],
        ]);
        
        foreach($request->articulo as $r){
            $obj = \App\AlquilerItems::create([
                'articulo_id'    => $r,
                'alquiler_id'    => $obj->id
            ]);
        }

        return response()->json(['success'=>'Articulo añadido correctamente.']);
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
        ->addColumn('fecha_alquiler', function($obj){
            $newDate = date("d-m-Y", strtotime($obj->fecha_alquiler)); 
            return $newDate;  
        })
        ->addColumn('name_user', function($obj){
            $nombre_user = \App\User::where('id','like',$obj['user_id'])->get();
            return $nombre_user[0]['name'];  
        })
        ->addColumn('name_ubicacion', function($obj){
            $nombre_ubicacion = \App\Ubicacion::where('id','like',$obj['ubicacion_id'])->get();
            return $nombre_ubicacion[0]['name'];
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

    public function getDataTableAlquilerUser($user_id)
    {
        $alquiler = \App\Alquiler::with('Ubicacion','Espacio')->where('user_id','=',$user_id)->get();
        return $alquiler;
    }
}
