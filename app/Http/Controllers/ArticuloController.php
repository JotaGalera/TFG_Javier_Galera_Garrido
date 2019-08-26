<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
class ArticuloController extends Controller
{
  public function index()
  {
    $obj = \App\Articulo::all();
    return view('articulo.articulo');

  }

  public function show($id)
  {
    $obj = \App\Articulo::with('Ubicacion')->with('Espacio')->find($id);
    return $obj;
  }



  public function store(Request $request)
  {

    $validateData = $request->validate([
      'ubicacion_mod'    => 'required',
      'name'             => 'required|max:255',
      'numero_serie'     => 'max:255',
      'description'      => 'max:255'
    ]);

    $obj = \App\Articulo::create([
      'name'            => $validateData['name'],
      'description'     => $validateData['description'],
      'numero_serie'    => $validateData['numero_serie'],
      'ubicacion_id'    => $validateData['ubicacion_mod'],
    ]);

    return response()->json(['success'=>'Articulo añadido correctamente.']);
  }

  public function update(Request $request, $id)
  {
    $validateData = $request->validate([
      'ubicacion_mod'    => 'required',
      'name'             => 'required|max:255',
      'numero_serie'     => 'max:255',
      'description'      => 'max:255'
    ]);

    $id = $request->input('id');

    $obj                = \App\Articulo::find($id);
    $obj->name          = $validateData['name'];
    $obj->ubicacion_id  = $validateData['ubicacion_mod'];
    $obj->numero_serie  = $validateData['numero_serie'];
    $obj->description   = $validateData['description'];
    $obj->update();

    return response()->json(['success'=>'Articulo modificado correctamente.']);
  }

  public function updateEspacio(Request $request, $id_espacio)
  {
    foreach($request->articulo as $r){
      $obj                = \App\Articulo::find($r);
      $obj->espacio_id    = $id_espacio;
      $obj->update();
    }
    return response()->json(['success'=>'Articulo asociado al espacio modificado correctamente.']);
  }

  public function updateDesasignar(Request $request, $id_articulo){
    $obj = \App\Articulo::find($id_articulo);
    $obj->espacio_id    = null;
    $obj->update();
    return $obj;
    
  }

  public function destroy($id)
  {
    $obj = \App\Articulo::find($id);
    $obj->delete();
    return $obj;
  }

  public function getArticuloEspacio($id_espacio)
  {
    $articulos = \App\Articulo::join('ubicacion','ubicacion.id','=','articulo.ubicacion_id')
    ->join('espacios','ubicacion.id','=','espacios.ubicacion_id')
    ->where('espacios.id',$id_espacio)
    ->where('articulo.espacio_id',"=",null)
    ->get(['articulo.*']);

    return $articulos;
  }

  public function getArticuloUbicacion($id_ubicacion)
  {
    return Datatables::of(\App\Articulo::where('ubicacion_id',$id_ubicacion))
    ->addColumn('floor',function($obj){
      $stringDatos = "";
      $nombre_espacio = DB::table('articulo_espacio')
      ->join('articulo','articulo.id','=','articulo_espacio.articulo_id')
      ->join('espacios','espacios.id','=','articulo_espacio.espacio_id')
      ->select('espacios.floor','espacios.number')
      ->where('articulo_espacio.articulo_id','=',$obj->id)
      ->where('articulo.deleted_at','=',null)
      ->get();
      foreach($nombre_espacio as $n)
      $stringDatos = "Piso: ".$n->floor." , Nº:".$n->number;
        return $stringDatos;
    })
    ->addColumn('nombre_ubicacion',function($obj){
        $nombre_ubicacion = \App\Ubicacion::where('id','like',$obj['ubicacion_id'])->get();
        return $nombre_ubicacion[0]['name'];
    })->addColumn('action', function($obj){
        return '<a href="#" data-toggle="tooltip" title="Editar ubicación" class="btn btn-xs btn-primary edit" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" title="Eliminar ubicación" class="btn btn-xs btn-danger delete" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    })->rawColumns(['action','nombre_ubicacion'])->make(true);
  }

  public function getDatatableArticuloEspacio($id_espacio)
  {
    return Datatables::of(\App\Articulo::where('espacio_id','=',$id_espacio))
    ->addColumn('action', function($obj){
      return '<a href="#" data-toggle="tooltip" title="Eliminar articulo de este espacio" class="btn btn-xs btn-danger delete-articulo" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    })->rawColumns(['action'])->make(true);
  }

  public function getDataTable()
  {
    $id_user = auth()->user()->id;

    $articulosUsuario = \App\Articulo::with('Ubicacion')->whereHas('Ubicacion.User', function($q) use($id_user) {
      $q->where('user_id','like',$id_user);
    })->get();
    
    return Datatables::of($articulosUsuario)
    ->addColumn('floor',function($obj){
      if($obj['espacio_id'] != null){
        $floor = \App\Espacio::where('id','like',$obj['espacio_id'])->get();
        return "P :".$floor[0]['floor']." N :".$floor[0]['number'];
      } 
    })->addColumn('nombre_ubicacion',function($obj){
        $nombre_ubicacion = \App\Ubicacion::where('id','like',$obj->ubicacion_id)->get();
        return $nombre_ubicacion[0]['name'];
    })->addColumn('action', function($obj){
        return '<a href="#" data-toggle="tooltip" title="Editar ubicación" class="btn btn-xs btn-primary edit" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" title="Eliminar ubicación" class="btn btn-xs btn-danger delete" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    })->rawColumns(['action'])->make(true);
  }
}
