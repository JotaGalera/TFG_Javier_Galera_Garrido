<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TarifaController extends Controller
{
    public function index()
    {
        $obj = \App\Tarifa::all();
        $usuarios = \App\User::where('id_tarifa',null)->get();

        return view('tarifa.tarifa',compact('usuarios'));
    }

    public function all(){
        $obj = \App\Tarifa::all();
        return $obj;
    }

    public function show($id)
    {
        $obj = \App\Tarifa::find($id);
        return json_encode($obj);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'        => 'required|max:255',
            'description' => 'max:255',
            'descuento'   => 'required|max:255',
        ]);

        $obj = \App\Tarifa::create([
            'name'            => $validateData['name'],
            'description'     => $validateData['description'],
            'descuento'       => $validateData['descuento'],
        ]);

      return response()->json(['success'=>'Tarifa añadida correctamente.']);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name'        => 'required|max:255',
            'description' => 'max:255',
            'descuento'   => 'required|max:255',
        ]);

        $obj               = \App\Tarifa::find($id);
        $obj->name         = $request->get('name');
        $obj->description  = $request->get('description');
        $obj->descuento    = $request->get('descuento');

        $obj->update();

        return response()->json(['success'=>'Tarifa modificada correctamente.']);
    }

    public function destroy($id)
    {
        $obj = \App\Tarifa::find($id);
        $obj->delete();
        return $obj;
    }

    public function getDatatable()
    {
      return Datatables::of(\App\Tarifa::all())
    	->addColumn('action', function($obj){
    			return '<a href="#" data-toggle="tooltip" title="Asignar tarifa a usuarios" class="btn btn-xs btn-success tarifa-user" id="'.$obj->id.'"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" title="Editar tarifa" class="btn btn-xs btn-primary edit" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" title="Eliminar tarifa" class="btn btn-xs btn-danger delete" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    	})->rawColumns(['action'])->make(true);
    }
    
}
