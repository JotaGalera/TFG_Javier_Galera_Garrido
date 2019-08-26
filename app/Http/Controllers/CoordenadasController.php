<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CoordenadasController extends Controller
{
    public function index()
    {
        $obj = \App\Coordenadas::all();
        return $obj;
        
    }

    public function show($id)
    {
        $obj = \App\Coordenadas::find($id);
        return json_encode($obj);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'espacio_coord' => 'required|max:255',
            'lat_lon' => 'required|max:255',
        ]);

        $coorX = strtok($validateData['lat_lon'], ",");
        $coorY = strtok(",");

        $obj = \App\Coordenadas::create([
            'CoorX'         => $coorX,
            'CoorY'         => $coorY,
            'espacio_id'    => $validateData['espacio_coord']
        ]);

        return response()->json(['success'=>'Articulo añadido correctamente.']);

    }

    public function update(Request $request, $coord_id)
    {
        
        $validateData = $request->validate([
            'lat_lon_update' => 'required|max:255',
        ]);

        $coorX = strtok($validateData['lat_lon_update'], ",");
        $coorY = strtok(",");

        $obj                = \App\Coordenadas::find($coord_id);
        $obj->CoorX         = $coorX;
        $obj->CoorY         = $coorY;
        $obj->update();
        return response()->json(['success'=>'Coordenada modificado correctamente.']);
    }

    public function destroy($id)
    {
        $obj = \App\Coordenadas::find($id);
        $obj->delete();
        return $obj;
    }

    public function getDatatable($espacio_id){
        $datatable = \App\Coordenadas::where('espacio_id','=',$espacio_id)->get();

        return Datatables::of($datatable)
        ->addColumn('action',function($obj){
            return '<a href="#" title="Eliminar coordenada" class="btn btn-xs btn-danger delete-coordenadas" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="#" title="Modificar coordenada" class="btn btn-xs btn-primary modify-coordenadas" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
        })->make(true);
    }
}
