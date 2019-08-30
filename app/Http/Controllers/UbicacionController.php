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
        $obj = \App\Ubicacion::all();
        return $obj;
    }
    public function show($id)
    {
        $obj = \App\Ubicacion::find($id);
        return json_encode($obj);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'    => 'required|max:255',
            'address' => 'max:255',
            'cp'      => 'max:5',
        ]);

        $obj = \App\Ubicacion::create([
            'name'            => $validateData['name'],
            'address'         => $validateData['address'],
            'number'          => $request['number'],
            'codigo_postal'   => $request['cp'],
        ]);

      return response()->json(['success'=>'Articulo añadido correctamente.']);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name'    => 'required|max:255',
            'address' => 'max:255',
            'cp'      => 'max:5',
        ]);

        $id = $request->input('id');

        $obj                = \App\Ubicacion::find($id);
        $obj->name          = $request->get('name');
        $obj->address       = $request->get('address');
        $obj->number        = $request->get('number');
        $obj->codigo_postal = $request->get('cp');
        $obj->update();

        return response()->json(['success'=>'Ubicación modificado correctamente.']);
    }

    public function destroy($id)
    {
        $obj = \App\Ubicacion::find($id);
        $obj->delete();
        return $obj;
    }

    public function getUbicacionesUser(){

        $id_user = auth()->user()->id;

        $ubicaciones = \App\Ubicacion::whereHas('user', function($q) use($id_user) {
          $q->where('user_id','like',$id_user);
        })->get();

        return $ubicaciones;
    }

    public function getDataTable()
    {
      return Datatables::of(\App\Ubicacion::all())
    	->addColumn('action', function($obj){
    			return '<a href="#" data-toggle="tooltip" title="Información de los espacios" class="btn btn-xs btn-success space" id="'.$obj->id.'"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" title="Editar ubicación" class="btn btn-xs btn-primary edit" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" title="Eliminar ubicación" class="btn btn-xs btn-danger delete" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    	})->rawColumns(['action'])->make(true);
    }
}
