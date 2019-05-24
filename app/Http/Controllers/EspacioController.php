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

    public function all()
    {
        $obj = \App\Espacio::all();
        return $obj;
    }
    public function show($id)
    {
        $obj = \App\Espacio::find($id);
        return json_encode($obj);
    }
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'floor_space'    => 'required|max:255',
            'number_space' => 'required|max:255',
        ]);

        $obj = \App\Espacio::create([
            'floor'         => $validateData['floor_space'],
            'number'        => $validateData['number_space'],
            'description'   => $request['description'],
            'ubicacion_id'  => $request['id_ubicacion'],
        ]);

      return response()->json(['success'=>'Articulo añadido correctamente.']);
    }

    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'floor_space'    => 'required|max:255',
            'number_space' => 'required|max:255',
        ]);

        $obj                = \App\Espacio::find($id);
        $obj->ubicacion_id =  $request->get('id_ubicacion');
        $obj->description = $request->get('description_space');
        $obj->floor       = $request->get('floor_space');
        $obj->number      = $request->get('number_space');

        $obj->update();

        return response()->json(['success'=>'Espacio modificado correctamente.']);
    }

    public function destroy($id)
    {
        $obj = \App\Espacio::find($id);
        $obj->delete();
        return $obj;
    }


    public function getDataTable($ubicacion_id)
    {

      return Datatables::of(\App\Espacio::where('ubicacion_id', $ubicacion_id))
        ->addColumn('action', function($obj){
            return '<a href="#" class="btn btn-xs btn-primary edit-space" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-danger delete-espacio" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-primary referencias" id="'.$obj->id.'"><i class="fa fa-list-ol" aria-hidden="true"></i></a>';
        })->rawColumns(['action'])->make(true);

    }

    public function getDataTableAll(){
      $user_id = auth()->user()->id;
      $datatable = \App\Espacio::with('Ubicacion')
      ->whereHas('Ubicacion.User', function ($query) use($user_id){
          $query->where('user_id', '=', $user_id);
      })->get();

      return Datatables::of($datatable)
      ->addColumn('name_ubicacion',function($obj){
          $name_ubicacion = \App\Ubicacion::find($obj->ubicacion->id);
          return $name_ubicacion->name;
      })
      ->addColumn('action',function($obj){
          return '<a href="#" title="Añadir/eliminar articulos" class="btn btn-xs btn-primary add-articulos" id="'.$obj->id.'"><i class="fa fa-plus-square" aria-hidden="true"></i></a> <a href="#" title="Listado de articulos" class="btn btn-xs btn-primary show-articulos" id="'.$obj->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
      })->make(true);

    }
}
