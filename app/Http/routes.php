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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


Route::get('event', 'EventController@index');
Route::get('event/create', 'EventController@create');
Route::post('event/save', 'EventController@save');

Route::get('api/event/detail', 'EventController@detail');
Route::get('api/event/partecipate', 'EventController@partecipate');
Route::get('api/events', 'EventController@getList');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('picture', 'PictureController@index');
Route::get('picture/get/{id}', [
	'as' => 'getpicture', 'uses' => 'PictureController@get']);
Route::post('picture/add',[
	'as' => 'addpicture', 'uses' => 'PictureController@add']);


Route::resource('api/items','ItemsController');
Route:get('items','ItemsController@angular');
