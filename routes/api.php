<?php

use Illuminate\Http\Request;

Route::post('/login', 'AuthController@login')->name('login.api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    
    Route::get('/logout', 'AuthController@logout')->name('logout'); 
    
    Route::get('/ubicacion/all','UbicacionController@all')->name('ubicacion.all');
    
    Route::get('/products/espacio&ubicacion/{espacio_id}/{fecha}','ArticuloController@getProductsAlquiler')->name('articulo.getproductsalquiler');
    
    Route::get('/espacio/getespacioubicaciondisponible/{espacio_id}/{fecha}','EspacioController@getEspacioUbicacionDisponible')->name('espacio.getespacioubicaciondisponible');
    
    Route::get('/alquiler/getdatatable','AlquilerController@getDataTableAlquilerUser')->name('alquiler.getdatatablealquileruser');
    Route::post('/alquiler','AlquilerController@store')->name('alquiler.store');
    Route::resource('alquiler','AlquilerController');
    //USUARIOS
    Route::get('/user/all', 'UserController@all')->name('user.all');
});
