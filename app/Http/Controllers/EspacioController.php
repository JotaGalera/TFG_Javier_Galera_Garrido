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
            'description'   => $request['description_space'],
            'ubicacion_id'  => $request['id_ubicacion'],
            'precio'        => $request['precio_space'],
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
        $obj->precio      = $request->get('precio_space');
        $obj->update();

        return response()->json(['success'=>'Espacio modificado correctamente.']);
    }

    public function destroy($id)
    {
        $obj = \App\Espacio::find($id);
        $obj->delete();
        return $obj;
    }

    public function numEspacio(){
        $obj = \App\Espacio::all()->count();
        return $obj;
    }

    public function getDataTable($ubicacion_id)
    {

      return Datatables::of(\App\Espacio::where('ubicacion_id', $ubicacion_id))
        ->addColumn('action', function($obj){
            return '<a href="#" class="btn btn-xs btn-primary edit-space" id="'.$obj->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-danger delete-espacio" id="'.$obj->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a> ';
        })->rawColumns(['action'])->make(true);

    }

    public function generateJSON(Request $request){

        $inicioJson = '{
            "type": "FeatureCollection",
            "features": [';
        $finJson = ']}';


        $aperturaElemento = '{';
        $cierreProxElemento = '},';
        $cierreFinElemento = '}';
        
        $aperturaProperties = '"type": "Feature","properties":{';
        $cierreProperties = '},';

        $aperturaTags = '"tags":{
                            "height":"3.9",';
        $tagName = ' "name": ';
        $tagPostName = ',"postname":';
        $tagInventario = ',"inventario":';
        $cierreTags = '},';

        $aperturaRelations = '"relations":[{
                                "role":"buildingpart",
                                "reltags":{
                                        "height":"4.0",
                                        "type":"level",
                                        "level":';
        $cierreRelations = '}}]';

        $aperturaGeometry = '"geometry": {
            "type": "Polygon",
            "coordinates": [[
                ';
        $cierreGeometry = ']]}';
                  
        $validateData = $request->validate([
            'ubicacion'    => 'required',
        ]);
        
        $espacioOBJ = \App\Espacio::where('ubicacion_id','=',$validateData['ubicacion'])->get();
        $ubicacionOBJ = \App\Ubicacion::where('id','=',$validateData['ubicacion'])->get();
        //pasar de collection a array
        //$espacioOBJ->all();
        //$array =$espacioOBJ->all();

        //Seguir este proceso para evitar datos innecesarios en el array,
        //al pasar por json en medio se pierde esos datos.
        //pasar de collection a json
        $json_espacio = $espacioOBJ->toJson();
        $json_ubicacion = $ubicacionOBJ->toJson();
        //pasar de json a array
        $array_espacios = json_decode($json_espacio);
        $array_ubicacion = json_decode($json_ubicacion);

        foreach($array_ubicacion as $ubicacion){
            $nombre_ubicacion = $ubicacion->name;
        } 
        
        $ruta = fopen($nombre_ubicacion.'.json','w+');

        fwrite($ruta,$inicioJson);
        $iteraciones_espacios=sizeof($array_espacios);
        foreach($array_espacios as $espacio){ //Recorremos el array de Espacios
            
            //Obtenemos el inventario asociado a cada espacio
            $inventario = \App\Articulo::where('espacio_id','=',$espacio->id)->get();
            $coordenadas = \App\Coordenadas::where('espacio_id','=',$espacio->id)->get();

            //De Colección a Json
            $json_inventario = $inventario->toJson();
            $json_coordenadas = $coordenadas->toJson();
            
            //De Json a Array
            $arrayInventario = json_decode($json_inventario);
            $arrayCoordenadas = json_decode($json_coordenadas);

            $espacio->inventario = $arrayInventario; // y así añadimos campos nuevos
            $espacio->coordenadas = $arrayCoordenadas;

            //APERTURA DE ELEMENTO
            fwrite($ruta, $aperturaElemento);

            // APERTURA Properties elemento:
            fwrite($ruta ,$aperturaProperties);

            //APERTURA TAGS
            fwrite($ruta,$aperturaTags);
            //-- relleno tags --
            fwrite($ruta,$tagName);
            fwrite($ruta,"\"".$nombre_ubicacion."\"");

            fwrite($ruta,$tagPostName);
            fwrite($ruta,"\"".$espacio->description."\"");

            fwrite($ruta,$tagInventario);
            fwrite($ruta,json_encode($espacio->inventario));
            //--fin relleno tags
            fwrite($ruta,$cierreTags);
            //CIERRE TAGS

            //APERTURA RELATIONS
            fwrite($ruta,$aperturaRelations);
            //-- relleno relations --
            fwrite($ruta,$espacio->floor);
            //--fin relleno relations
            fwrite($ruta,$cierreRelations);
            //CIERRE RELATIONS

            // CIERRE Properties elemento:
            fwrite($ruta ,$cierreProperties);

            //APERTURA GEOMETRY
            fwrite($ruta,$aperturaGeometry);
            
            $iteraciones=sizeof($arrayCoordenadas);
            foreach($arrayCoordenadas as $C){
                if($iteraciones>=2){
                    fwrite($ruta,"[". $C->CoorY .",". $C->CoorX ."],");
                }else{
                    fwrite($ruta,"[". $C->CoorY .",". $C->CoorX ."]");
                }
                $iteraciones--;
            }
            
            fwrite($ruta,$cierreGeometry);
            //CIERRE GEOMETRY

            echo $iteraciones_espacios;
            if($iteraciones_espacios >= 2){
                // CIERRRE DE ELEMENTO
                
                fwrite($ruta, $cierreProxElemento);
            }else{
                
                fwrite($ruta, $cierreFinElemento);
            }
            $iteraciones_espacios--;
        }
        
        //fwrite($ruta,json_encode($array));
        fwrite($ruta,$finJson);
        fclose($ruta);

        //********** COPIAMOS EL ARCHIVO AL SISTEMA CLIENTE *******************/

        copy($nombre_ubicacion.'.json','../TFG_Cliente_new/public/'.$nombre_ubicacion.'.json');
    }

    public function getDataTable_filtrado($ubicacion_id){
        $user_id = auth()->user()->id;
        $datatable = \App\Espacio::with('Ubicacion')
        ->whereHas('Ubicacion.User', function ($query) use($user_id,$ubicacion_id){
            $query->where('user_id', '=', $user_id);
            $query->where('ubicacion_id','=',$ubicacion_id);
        })->get();

        return Datatables::of($datatable)
        ->addColumn('name_ubicacion',function($obj){
            $name_ubicacion = \App\Ubicacion::find($obj->ubicacion->id);
            return $name_ubicacion->name;
        })
        ->addColumn('action',function($obj){
            return '<a href="#" title="Añadir/eliminar articulos" class="btn btn-xs btn-primary modal-add-articulos" id="'.$obj->id.'"><i class="fa fa-plus-square" aria-hidden="true"></i></a> <a href="#" title="Listado de articulos" class="btn btn-xs btn-primary show-articulos-espacios" id="'.$obj->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
        })->make(true);
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
          return '<a href="#" title="Añadir/eliminar articulos" class="btn btn-xs btn-primary modal-add-articulos" id="'.$obj->id.'"><i class="fa fa-plus-square" aria-hidden="true"></i></a> <a href="#" title="Listado de articulos" class="btn btn-xs btn-primary show-articulos-espacios" id="'.$obj->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
      })->make(true);

    }

    public function getEspacioUbicacion($ubicacion_id){
        $user_id = auth()->user()->id;
        $espacios = \App\Espacio::with('Ubicacion')
            ->whereHas('Ubicacion.User', function ($query) use($user_id,$ubicacion_id){
                $query->where('user_id', '=', $user_id);
                $query->where('ubicacion_id','=',$ubicacion_id);        
            })->get();

        return $espacios;
    }

    public function getEspacioUbicacionDisponible($ubicacion_id,$fecha){
        $user_id = auth()->user()->id;
        $newDate = date("Y-m-d", strtotime($fecha));
        
        $espacios = \App\Espacio::with('Ubicacion')
            ->whereHas('Ubicacion.User', function ($query) use($user_id,$ubicacion_id){
                $query->where('user_id', '=', $user_id);
                $query->where('ubicacion_id','=',$ubicacion_id);        
            })->get();

        $alquileres = \App\Espacio::with('Alquiler')
        ->whereHas('Alquiler', function ($query) use($newDate){
            $query->where('fecha_alquiler', '=', $newDate);
            $query->orWhereNull('fecha_alquiler');
        })
        ->get();

        $result = $espacios->diff($alquileres);

        return $result;
    }
}
