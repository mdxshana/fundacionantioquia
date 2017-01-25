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

Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('getEmail');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('postEmail');


Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('reset');





Route::get('home', function(){return view('usuario.animacion');});
Route::get('/', 'UsuarioController@home')->name("home");
Route::get('/servicios', 'UsuarioController@getServicios')->name('getServicios');
Route::get('/pdf', 'UsuarioController@getPDF')->name('getPDF');
Route::get('/galeria', 'UsuarioController@getGalerias')->name('getGalerias');
Route::post('/getImages', 'UsuarioController@getImgsAlbum')->name('getImgsAlbum');


Route::group(['middleware' => ['auth', 'super']], function () {

    Route::get('superAdmin', function(){
        return "Hola super admin";
    })->name('superAdmin');
    Route::get('admin/nuevoAdmin', 'adminController@nuevoAdmin')->name('nuevoAdmin');
    Route::post('addAdmin', 'adminController@addAdmin')->name('addAdmin');
    Route::post('editAdmin', 'adminController@editAdmin')->name('editAdmin');
    Route::post('getAdmins', 'adminController@getAdmins')->name('getAdmins');
    Route::post('removeAdmins', 'adminController@removeAdmins')->name('removeAdmins');
    Route::post('cambiarPassword', 'adminController@cambiarPassword')->name('cambiarPassword');
    Route::post('actualizarAvatar', 'adminController@actualizarAvatar')->name('actualizarAvatar');



});

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('perfil', 'AdminController@perfil')->name('perfil');

    Route::get('admin', 'AdminController@editHome')->name('editHome');
    Route::post('admin/subirimagen', 'AdminController@subirImagen')->name('subirImagen');

    Route::post('admin/borrarImagen', 'AdminController@deleteImage')->name('deleteImage');

    Route::post('admin/editarTextos', 'AdminController@editTexto')->name('editTexto');
    Route::post('updateImagSomos', 'AdminController@updateImagSomos')->name('updateImagSomos');

    Route::get('admin/requisitos', 'AdminController@editRequisitos')->name('editRequisitos');

    Route::get('admin/servicios', 'AdminController@editServicios')->name('editServicios');
    Route::post('admin/vinculo', 'AdminController@editVinculo')->name('editVinculo');
    Route::post('admin/insertServicio', 'AdminController@insertServicio')->name('insertServicio');
    Route::post('admin/deleteServicio', 'AdminController@deleteServicio')->name('deleteServicio');

    Route::get('admin/nosotros', 'adminController@somos')->name('nosotros');
    Route::get('admin/videos', 'adminController@videos')->name('videos');
    Route::post('admin/subirvideo', 'AdminController@subirvideo')->name('subirvideo');
    Route::post('admin/editInfoVideo', 'AdminController@editInfoVideo')->name('editInfoVideo');
    Route::post('admin/removeVideo', 'AdminController@removeVideo')->name('removeVideo');
    Route::get('admin/galerias', 'AdminController@editGalerias')->name('editGalerias');
    Route::post('admin/subirAlbum', 'AdminController@subirAlbum')->name('subirAlbum');
    Route::post('admin/updateAlbum', 'AdminController@updateAlbum')->name('updateAlbum');
    Route::post('admin/borrarAlbum', 'AdminController@deleteAlbum')->name('deleteAlbum');
    Route::get('admin/album/{id}', 'AdminController@editAlbum')->name('editAlbum');


});

Route::get('contacto', 'UsuarioController@contacto')->name('contacto');
Route::get('nosotros', 'UsuarioController@somos')->name('somos');
Route::post('enviarMensaje', 'EmailController@enviarMensaje')->name('enviarMensaje');

Route::get('video', 'UsuarioController@getVideos')->name('getVideos');



