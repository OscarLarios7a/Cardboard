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

Route::get('/Register','Auth\RegisterController@index');
Route::post('/Register','Auth\RegisterController@create');

Route::post('UpdateUserProfile','HomeController@UpdateUserProfile');
Route::post('AditionalInfo','HomeController@AditionalInfo');
Route::get('/Profile','HomeController@MyProfile');
Route::get('/home', 'HomeController@index');
