<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* 
/Route::get('/', function () {
/    return view('welcome');
/});
*/

Route::get('/', ['as' => 'static.home', 'uses' => 'StaticController@home']);
Route::get('inicio', ['as' => 'static.home', 'uses' => 'StaticController@home']);
Route::get('como-funciona', ['as' => 'static.how_works', 'uses' => 'StaticController@how_works']);
Route::get('contacto', ['as' => 'static.contact', 'uses' => 'StaticController@contact']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::bind('usuario', function() {
    $user = Auth::user();
});

Route::group(['prefix' => 'usuario', 'middleware' => 'auth'], function () {

	Route::get('/', ['as' => 'user.profile', 'uses' => 'UserController@index']);
	Route::get('perfil', ['as' => 'user.profile', 'uses' => 'UserController@index']);

	Route::get('editar', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
	Route::put('editar', ['as' => 'user.update', 'uses' => 'UserController@update']);

});
