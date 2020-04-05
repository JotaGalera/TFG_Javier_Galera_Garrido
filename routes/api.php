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
Route::post('/register', 'AuthController@register')->name('register.api');
Route::get('/user', 'UserController@all')->name('user.all');
//RUTAS PRIVADAS
Route::middleware('auth:api')->group(function () {
    //LOGIN
    Route::get('/user', 'UserController@all')->name('user.all'); //OK
    Route::get('/logout', 'AuthController@logout')->name('logout'); //OK
    //USUARIOS
    Route::get('/user/all', 'UserController@all')->name('user.all');
});
