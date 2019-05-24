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
        //return json_encode($obj);
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

        return response()->json(['success'=>'Ubicación modificado correctamente.']);

    }
    public function destroy($id)
    {
        $obj = \App\Articulo::find($id);
        $obj->delete();
        return $obj;
    }

    public function getArticuloListado($id_espacio)
    {
      $espacion = \App\Espacio::find($id_espacio);

    	$articulos = \App\Articulo::
    	whereHas('Espacio', function($a) use($espacion) {
    		$a->where('articulo.ubicacion_id','=',$espacion->ubicacion_id)
    		->where('articulo.id','!=','articulo_id');
    	})
    	->get();
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

    public function getDataTable()
    {
        $id_user = auth()->user()->id;

        $articulosUsuario = \App\Articulo::with('Ubicacion')->whereHas('Ubicacion.User', function($q) use($id_user) {
          $q->where('user_id','like',$id_user);
        })->get();

        return Datatables::of($articulosUsuario)
        ->addColumn('floor',function($obj){
           $floor = \App\Espacio::whereHas('Articulo', function($q) use($obj) {
             $q->where('articulo_id','like',$obj->id);
           })->get();

           foreach($floor as $f)
              return "Piso: ".$f['floor']." Número: ".$f['number'];

        })->addColumn('nombre_ubicacion',function($obj){
            $nombre_ubicacion = \App\Ubicacion::where('id','like',$obj->ubicacion_id)->get();
            return $nombre_ubicacion[0]['name'];
        })->addColumn('action', function($obj){
      			return '<a href="#" data-toggle="tooltip" title="Editar ubicación" class="btn btn-xs btn-primary edit" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" title="Eliminar ubicación" class="btn btn-xs btn-danger delete" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
      	})->rawColumns(['action'])->make(true);
    }
}
