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

use Illuminate\Http\Request;

/* For Pages */

Route::get('/', 'Auth\AuthController@getLogin');
Route::get('users/create', function() {
	return view('users.registration');
});
Route::get('home', [
	'middleware' => 'auth',
	'uses' => 'UserController@index'
]);

// User routes
Route::get('users/{id}', 'UserController@showProfile');
Route::post('users', 'UserController@addUser');
Route::get('users/{id}/edit', ['as' => 'updateUser', 'uses' => 'UserController@updateUserPage'] );
Route::put('users/{id}', 'UserController@updateUser');
Route::delete('users/{id}', 'UserController@deleteUser');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

