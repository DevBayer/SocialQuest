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
Route::get('sobre-nosotros', ['as' => 'static.about', 'uses' => 'StaticController@about']);

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
	Route::get('perfil/{id}/{name}', ['as' => 'user.open_profile', 'uses' => 'UserController@show']);

	Route::get('editar', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
	Route::put('editar', ['as' => 'user.update', 'uses' => 'UserController@update']);

});


Route::group(['prefix' => 'quests', 'middleware' => 'auth'], function () {
	Route::get('/', ['as' => 'quests.list', 'uses' => 'QuestsController@index']);
	Route::put('/', ['as' => 'quests.update', 'uses' => 'QuestsController@update']);
	Route::delete('/', ['as' => 'quests.delete', 'uses' => 'QuestsController@delete']);
	Route::get('/create', ['as' => 'quests.create', 'uses' => 'QuestsController@create']);
	Route::post('/create', ['as' => 'quests.create', 'uses' => 'QuestsController@store']);
	Route::post('/request', ['as' => 'quests.request', 'uses' => 'QuestsController@request']);
});

Route::get('buscar', ['as' => 'search.home', 'uses' => 'SearchController@index']);
Route::get('buscar/{search}', ['as' => 'search.query', 'uses' => 'SearchController@search']);
