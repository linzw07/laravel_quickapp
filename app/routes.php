<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/signup', 'UsersController@getSignUp');
Route::post('/signup', 'UsersController@postSignUp');

Route::get('/login', 'UsersController@getLogin');
Route::post('/login', 'UsersController@postLogin');

Route::get('/logout', 'UsersController@getLogout');

Route::get('/dashboard', 'AppController@getDashboard');