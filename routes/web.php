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

Route::get('home', function(){return view('layouts.front-end.layout');});

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/index', 'adminController@editHome')->name('editHome');

Route::group(['middleware' => ['auth', 'super']], function () {

    Route::get('superAdmin', function(){
        return "Hola super admin";
    })->name('superAdmin');

});

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('admin', function(){
        return "Hola admin";
    })->name('Admin');

});