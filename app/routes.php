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

/*Route::get('/', function()
{
	return View::make('hello');
});*/
Route::get('/', 'HomeController@showIndex');

Route::get('login', 'HomeController@getLogin');
Route::post('login', 'HomeController@postLogin');
Route::when('login', 'guest');

Route::get('logout', 'HomeController@getLogout');

Route::get('register', 'HomeController@getRegister');
Route::post('register', 'HomeController@postRegister');
Route::when('register', 'guest');

Route::get('admin', 'AdminController@showIndex');
Route::when('admin', 'admin');

Route::get('api/forms/list/{lastUpdateTimestamp?}', 'FormsApiController@getList');
