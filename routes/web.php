<?php
//COSAS PARA /DEV//

use Illuminate\Support\Collection as Collection;
use Yajra\Datatables\Datatables;
use \App\Espacio;
use \App\Articulo;
///////////////////

Auth::routes();

Route::get('/', 'HomeController@index');


Route::get('/dev', function(){
	$espacio_id=3;
	$datatable = \App\Coordenadas::where('espacio_id','=',$espacio_id)->get();

        return json_encode(Datatables::of($datatable)
        ->make(true));
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::middleware(['auth'])->group(function(){

	Route::get('gis','GisController@index')->name('gis');
	Route::get('ubicacion', 'UbicacionController@index')->name('ubicacion');
	Route::get('articulo','ArticuloController@index')->name('articulo');
	Route::get('listado','EspacioController@index')->name('listado');


	//ROUTES user
	Route::get('user/all', 'UserController@all')->name('user.all')
		->middleware('permission:user.index');
	Route::get('user/find', 'UserController@findSelect2')->name('user.findSelect2')
		->middleware('permission:sistema.index');
	Route::get('user/getdatatable', 'UserController@getDataTable')->name('user.getdatatable')
		->middleware('permission:user.index');
	Route::resource('user','UserController')
		->middleware('permission:user.index');

	//ROUTES ubicacion
	Route::get('ubicacion/getdatatable','UbicacionController@getDataTable')->name('ubicacion.getdatatable')
		->middleware('permission:ubicacion.index');
	Route::get('ubicacion/getubicacionesuser','UbicacionController@getUbicacionesUser')->name('ubicacion.getUbicacionesUser')
		->middleware('permission:ubicacion.index');
	Route::resource('ubicacion','UbicacionController')
		->middleware('permission:ubicacion.index');

	//ROUTES espacio
	Route::get('espacio/getdatatable/{ubicacion_id}','EspacioController@getDataTable')->name('espacio.getdatatable')
		->middleware('permission:espacio.index');
	Route::get('espacio/getdatatable_filtrado/{ubicacion_id}','EspacioController@getDataTable_filtrado')->name('espacio.getdatatable_filtrado')
		->middleware('permission:espacio.index');
	Route::get('espacio/getdatatableall','EspacioController@getDataTableAll')->name('espacio.getdatatableall')
		->middleware('permission:espacio.index');
	Route::get('espacio/getespacioubicacion/{ubicacion_id}','EspacioController@getEspacioUbicacion')->name('espacio.getespacioubicacion')
		->middleware('permission:espacio.index');
	Route::post('espacio/generateJson','EspacioController@generateJson')->name('espacio.generatejson')
		->middleware('permission:espacio.index');
	Route::resource('espacio','EspacioController')
		->middleware('permission:espacio.index');

	//ROUTES articulo
	Route::get('articulo/getdatatable','ArticuloController@getDataTable')->name('articulo.getdatatable')
		->middleware('permission:articulo.index');
	Route::get('articulo/ubicacion/{id_ubicacion}','ArticuloController@getArticuloUbicacion')
		->middleware('permission:articulo.index');
	Route::get('articulo/espacio/{id_espacio}','ArticuloController@getArticuloEspacio')
		->middleware('permission:articulo.index');		
	Route::get('articulo/espacio/getdatatable/{id_espacio}','ArticuloController@getDatatableArticuloEspacio')
		->middleware('permission:articulo.index');
	Route::put('articulo/actualizaEspacio/{id_espacio}','ArticuloController@updateEspacio')
		->middleware('permission:articulo.index');
	Route::put('articulo/desasignarEspacio/{id_articulo}','ArticuloController@updateDesasignar')
		->middleware('permission:articulo.index');
	Route::resource('articulo','ArticuloController')
		->middleware('permission:articulo.index');

	//ROUTE coordenadas
	Route::get('coordenadas/getdatatable/{espacio_id}','CoordenadasController@getDatatable')->name('coordenadas.getdatatable')
		->middleware('permission:coordenadas.index');
	Route::resource('coordenadas','CoordenadasController')
		->middleware('permission:coordenadas.index');

	//ROUTE json
	Route::get('data.json',function(){
		$jsonString = file_get_contents(base_path('/resources/views/data.json'));
		return $jsonString;
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
