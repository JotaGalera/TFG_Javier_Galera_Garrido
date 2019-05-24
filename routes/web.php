<?php
//COSAS PARA /DEV//
use Yajra\Datatables\Datatables;
///////////////////

Auth::routes();

Route::get('/', 'HomeController@index');
Route::view('/gis', 'gis.gis')->name('gis');

Route::get('/dev', function(){
	$id_espacio = 7;

	$espacion = \App\Espacio::find($id_espacio);

	$articulos = \App\Articulo::
	whereHas('Espacio', function($a) use($espacion) {
		$a->where('articulo.ubicacion_id',$espacion->ubicacion_id);
	})->get();



	$articulos2 = \App\Articulo::where('articulo.ubicacion_id',$espacion->ubicacion_id)->where('id','!=',$articulos->id)->get();
	return $articulos2;
		/*->whereHas('Espacio', function($a)  {
		$a->where('articulo.id','!=','articulo_id');
	})
	->get();
	return $articulos;*/
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function(){


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
	Route::get('espacio/getdatatableall','EspacioController@getDataTableAll')->name('espacio.getdatatableall')
		->middleware('permission:espacio.index');
	Route::resource('espacio','EspacioController')
		->middleware('permission:espacio.index');

	//ROUTES articulo
	Route::get('articulo/getdatatable','ArticuloController@getDataTable')->name('articulo.getdatatable')
		->middleware('permission:articulo.index');
	Route::get('articulo/ubicacion/{id_ubicacion}','ArticuloController@getArticuloUbicacion')
		->middleware('permission:articulo.index');
	Route::get('articulo/listado/{id_espacio}','ArticuloController@getArticuloListado')
		->middleware('permission:articulo.index');
	Route::resource('articulo','ArticuloController')
		->middleware('permission:articulo.index');


	//ROUTE json
	Route::get('data.json',function(){
		$jsonString = file_get_contents(base_path('/resources/views/data.json'));
		return $jsonString;
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
