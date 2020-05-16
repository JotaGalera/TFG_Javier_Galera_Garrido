<?php


use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

Auth::routes();
Route::get('/', 'HomeController@index');

Route::get('/dev', function(){
  
    $client = new \GuzzleHttp\Client();
	// $response = $client->request('GET', 'http://tfggit.com/api/alquiler/getdatatable/27', [
	// 	'headers' => ['Content-Type' => 'application/json',
	// 					'Authorization' => 'Bearer'.session()->get('token_api')]
	// ]);
	// $res = $client->get(env("URL_API").'/api/alquiler/getdatatable/27', [
    //         'headers' => ['Content-Type' => 'application/json',
    //                         'Authorization' => 'Bearer'.session()->get('token_api')]
    //     ]);
	$response = $client->get("http://tfggit.com/api/alquiler/getdatatable/27", [
		'headers' => ['Authorization' => 'Bearer ' . session()->get('token_api')]
	]);
	$response_body = $response->getBody()->getContents();
	print_r($response_body);
	
	// echo '<pre>' . print_r($response, true) . '</pre>';
        //return Datatables::of(json_decode($res->getBody()));
       
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/user/all', 'UserController@all')->name('user.all'); 
Route::middleware(['auth.api'])->group(function(){

	Route::get('user/all', 'UserController@all')->name('user.all'); 
	Route::get('gis','GisController@index')->name('gis');
	Route::get('alquiler', 'AlquilerController@index')->name('alquiler');
	Route::get('alquiler/getdatatable/{user_id}','AlquilerController@getDataTableAlquilerUser')->name('alquiler.getdatatablealquileruser');
	Route::get('ubicacion/all', 'UbicacionController@all')->name('ubicacion.all');
	Route::get('espacio/getespacioubicacion/{ubicacion_id}','EspacioController@getEspacioUbicacion')->name('espacio.getespacioubicacion');
	Route::get('alquiler/articulos/espacio&ubicacion/{espacio_id}', 'AlquilerController@getProductsAlquiler')->name('ubicacion.getproductsalquiler');
	Route::post('alquiler/delete/{id}','AlquilerController@delete')->name('alquiler.delete');
	Route::resource('alquiler','AlquilerController');
	//ROUTE json
	Route::get('data.json',function(){
		$jsonString = file_get_contents(base_path('/resources/views/data.json'));
		return $jsonString;
	});
});
