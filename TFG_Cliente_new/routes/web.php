	<?php


Auth::routes();
Route::get('/', 'HomeController@index');

Route::get('/dev', function(){
	class envio
	{
			var $q = '';
	}

	$request = new envio();
	$request->q = 'SERVICIOS';

	$client = new \GuzzleHttp\Client();
	$res = $client->get(env("URL_API").'/api/familia/find?q='.$request->q, [
												'headers' => ['Content-Type' => 'application/x-www-form-urlencoded',
																			'Authorization' => 'Bearer '.session()->get('token_api')],

										]);
	$obj = json_decode($res->getBody(),true);
	return $obj;

});
Route::get('/dev_protected', function(){
	try {
		return "OK";
	}catch (GuzzleHttp\Exception\ClientException $e) {
		return "ERROR";
    }
})->middleware('auth.api');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth.api'])->group(function(){

	//RUTAS ACTUACIONES
	Route::get('gis','GisController@index')->name('gis');
	Route::get('ubicacion', 'UbicacionController@index')->name('ubicacion');
	Route::get('articulo','ArticuloController@index')->name('articulo');
	Route::get('listado','EspacioController@index')->name('listado');
	Route::get('tarifa','TarifaController@index')->name('tarifa');

	//ROUTES user
	Route::get('user/getdatatabletarifauser/{id_tarifa}','UserController@getDataTableUserTarifa')->name('user.getdatatableusertarifa');
		
	Route::put('user/desasignatarifa/{id}','UserController@desasignaTarifa')->name('user.desasignatarifa');
		
	Route::get('user/sintarifa','UserController@getSinTarifa')->name('user.getsintarifa');
		
	Route::get('user/all', 'UserController@all')->name('user.all');
		
	Route::get('user/find', 'UserController@findSelect2')->name('user.findSelect2');
		
	Route::put('user/asignatarifa', 'UserController@asignaTarifa')->name('user.asignatarifa');

	Route::get('user/getdatatable', 'UserController@getDataTable')->name('user.getdatatable');
	
	Route::resource('user','UserController');
		
	//ROUTES ubicacion
	Route::get('ubicacion/getdatatable','UbicacionController@getDataTable')->name('ubicacion.getdatatable');
		
	Route::get('ubicacion/getubicacionesuser','UbicacionController@getUbicacionesUser')->name('ubicacion.getUbicacionesUser');
		
	Route::resource('ubicacion','UbicacionController');
	

	//ROUTES espacio
	Route::get('espacio/getdatatable/{ubicacion_id}','EspacioController@getDataTable')->name('espacio.getdatatable');
		
	Route::get('espacio/getdatatable_filtrado/{ubicacion_id}','EspacioController@getDataTable_filtrado')->name('espacio.getdatatable_filtrado');
		
	Route::get('espacio/getdatatableall','EspacioController@getDataTableAll')->name('espacio.getdatatableall');
		
	Route::get('espacio/getespacioubicacion/{ubicacion_id}','EspacioController@getEspacioUbicacion')->name('espacio.getespacioubicacion');
		
	Route::post('espacio/generateJson','EspacioController@generateJson')->name('espacio.generatejson');
	Route::resource('espacio','EspacioController');

	//ROUTES articulo
	Route::get('articulo/getdatatable','ArticuloController@getDataTable')->name('articulo.getdatatable');
	Route::get('articulo/ubicacion/{id_ubicacion}','ArticuloController@getArticuloUbicacion');
	Route::get('articulo/espacio/{id_espacio}','ArticuloController@getArticuloEspacio');
	Route::get('articulo/espacio/getdatatable/{id_espacio}','ArticuloController@getDatatableArticuloEspacio');
	Route::put('articulo/actualizaEspacio/{id_espacio}','ArticuloController@updateEspacio');
	Route::put('articulo/desasignarEspacio/{id_articulo}','ArticuloController@updateDesasignar');
	Route::resource('articulo','ArticuloController');

	//ROUTE coordenadas
	Route::get('coordenadas/getdatatable/{espacio_id}','CoordenadasController@getDatatable')->name('coordenadas.getdatatable');
	Route::resource('coordenadas','CoordenadasController');

	//ROUTE tarifa
	Route::get('tarifa/getdatatable','TarifaController@getDatatable')->name('tarifa.getdatatable');
	Route::resource('tarifa','TarifaController');
	
	//ROUTE alquiler
	Route::get('alquiler/getdatatable','AlquilerController@getDatatable')->name('alquiler.getdatatable');
	Route::resource('alquiler','AlquilerController');

	//ROUTE json
	Route::get('data.json',function(){
		$jsonString = file_get_contents(base_path('/resources/views/data.json'));
		return $jsonString;
	});
});
