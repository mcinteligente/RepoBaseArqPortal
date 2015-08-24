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

Route::get('/', [
	'uses'	=> 'HomeController@index',
	'as'	=> 'home'
]);

// Authentication routes...
Route::get('login', [
	'uses'	=> 'Auth\AuthController@getLogin',
	'as'	=> 'login'
]);
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
	'uses'	=> 'Auth\AuthController@getLogout',
	'as'	=> 'logout'
]);

// Registration routes...
Route::get('register', [ 
	'uses'	=> 'Auth\AuthController@getRegister',
	'as'	=> 'register'
]);
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//AOS Test Example
Route::get('aostest', 'AOSTestController@index'); // Muestra todos, así se definió en el controlador
Route::get('aostest/{id}', 'AOSTestController@show'); // Muestra solo 1
Route::post('aostest', [
	'uses'	=> 'AOSTestController@store',
	'as'	=> 'aostest'
]); // Almacena uno nuevo
Route::put('aostest/{id}', 'AOSTestController@update'); // Actualiza un elemento
Route::delete('aostest/{id}', 'AOSTestController@destroy'); // Elemina un elemento

// API
Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::post('register', 'AuthenticateController@register');
	Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
});