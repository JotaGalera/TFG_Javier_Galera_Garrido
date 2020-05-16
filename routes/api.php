<?php

use Illuminate\Http\Request;

//RUTAS PUBLICAS
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hola', function(){
   return auth('api')->user()->id;
})->name('login.api');

//FUNCIONES DE LOGUEO PARA OBTENER EL TAG
Route::post('/login', 'AuthController@login')->name('login.api');
Route::post('/loginTAG', 'AuthController@loginTAG')->name('loginTAG.api');
Route::get('/user/all', 'UserController@all')->name('user.all');
//RUTAS PRIVADAS
Route::middleware('auth:api')->group(function () {
    //LOGIN
    Route::get('/user/all', 'UserController@all')->name('user.all');
    Route::get('/user', 'UserController@all')->name('user.all'); 
    Route::get('/logout', 'AuthController@logout')->name('logout'); 
    
    Route::get('/ubicacion/all','UbicacionController@all')->name('ubicacion.all');
    
    Route::get('/products/espacio&ubicacion/{espacio_id}','ArticuloController@getProductsAlquiler')->name('articulo.getproductsalquiler');

    Route::get('/espacio/getespacioubicacion/{ubicacion_id}','EspacioController@getEspacioUbicacion')->name('espacio.getespacioubicacion');
    
    Route::get('/alquiler/getdatatable/{user_id}','AlquilerController@getDataTableAlquilerUser')->name('alquiler.getdatatablealquileruser');
    Route::post('/alquiler','AlquilerController@store')->name('alquiler.store');
    Route::resource('alquiler','AlquilerController');
    //USUARIOS
    Route::get('/user/all', 'UserController@all')->name('user.all');
});
