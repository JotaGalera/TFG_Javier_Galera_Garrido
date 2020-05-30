<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlquilerItemsController extends Controller
{
    public function store(Request $request)
    {    
        $obj = \App\AlquilerItems::create([
            'articulo_id'    => $request['articulo'],
            'alquiler_id'    => $request['id']
        ]);
        
        return response()->json(['success'=>'Articulo añadido al alquiler correctamente.']);
    }

    public function destroy(Request $request){
        $obj = \App\AlquilerItems::find($id);
        $obj->delete();
        return $obj;
    }
}
