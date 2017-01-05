<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


Route::get('home', function(){return view('layouts.front-end.layout');});

Route::get('/', function () {
    return view('welcome');
});


Route::post('admin/subirimagen', 'AdminController@subirImagen')->name('subirImagen');

Route::group(['middleware' => ['auth', 'super']], function () {

    Route::get('superAdmin', function(){
        return "Hola super admin";
    })->name('superAdmin');

});

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('admin/index', 'adminController@editHome')->name('editHome');

});

Route::get('contacto', 'UsuarioController@contacto')->name('contacto');
Route::post('enviarMensaje', 'EmailController@enviarMensaje')->name('enviarMensaje');




