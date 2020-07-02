<?php


use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

Auth::routes();
Route::get('/', 'HomeController@index');

Route::get('/dev', function(){
       
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/user/all', 'UserController@all')->name('user.all'); 
Route::middleware(['auth.api'])->group(function(){

	Route::get('user/all', 'UserController@all')->name('user.all'); 
	Route::get('gis','GisController@index')->name('gis');
	Route::get('alquiler', 'AlquilerController@index')->name('alquiler');
	Route::get('alquiler/getdatatable/','AlquilerController@getDataTableAlquilerUser')->name('alquiler.getdatatablealquileruser');
	Route::get('ubicacion/all', 'UbicacionController@all')->name('ubicacion.all');
	Route::get('espacio/getespacioubicaciondisponible/{ubicacion_id}/{fecha}','EspacioController@getEspacioUbicacionDisponible')->name('espacio.getespacioubicaciondisponible');

	Route::get('alquiler/articulos/espacio&ubicacion/{espacio_id}/{fecha}', 'AlquilerController@getProductsAlquiler')->name('alquiler.getproductsalquiler');
	Route::post('alquiler/delete/{id}','AlquilerController@delete')->name('alquiler.delete');
	Route::resource('alquiler','AlquilerController');
	//ROUTE json
	Route::get('data.json',function(){
		$jsonString = file_get_contents(base_path('/resources/views/data.json'));
		return $jsonString;
	});
});
