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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/home/search', 'HomeController@search');

Route::get('/create', 'CreateController@index');
Route::post('/create', 'CreateController@save');
Route::delete('/create/{id}', 'CreateController@remove');

Route::get('/manage', 'ManageController@index');
Route::post('/manage/{id}', 'ManageController@save');
Route::post('/manage/{id}/share', 'ManageController@share');
Route::get('/manage/{id}', 'ManageController@show');
Route::delete('/manage/{id}/item/{item_id}', 'ManageController@remove');
Route::get('/manage/{id}/item/{item_id}', 'ManageController@itemUpdate');
Route::put('/manage/{id}/item/{item_id}', 'ManageController@update');


Route::get('inventory', 'InventoryController@index');
Route::get('inventory/{id}', 'InventoryController@show');

Route::get('/profile', 'ProfileController@index');
Route::put('/profile/update', 'ProfileController@update');
Route::get('/profile/reset', 'ProfileController@reset');
