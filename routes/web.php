<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');  
});

Auth::routes();
/*Registro de usuarios*/
Route::get('/Register','Auth\RegisterController@index');
Route::post('/Register','Auth\RegisterController@create');
/*Fin de Registro de Usuarios*/
/*Perfil de Usuario Registrado*/
Route::post('UpdateUserProfile','HomeController@UpdateUserProfile');
Route::post('AditionalInfo','HomeController@AditionalInfo');
Route::get('/Profile','HomeController@MyProfile');
Route::get('/home', 'HomeController@index');
/*Fin de perfil de Usuario Registrado*/
/*Post del Usuario*/
Route::post('DeletePost','PostController@destroy');
Route::post('Comments','PostController@SaveComments');
Route::post('updatePost','PostController@update');
Route::Resource('Post','PostController');
/*Fin de Post del Usuario*/
