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

Route::get('/', function () {
    return view('home');
});

Route::get('/show', 'PhotoController@show');
Route::get('/choose/{id}', 'PhotoController@choose');
Route::post('/pull', 'PhotoController@poll');

//Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
Route::group(['prefix' => 'admin'], function () {
    Route::controller('photo', 'PhotoController');
    Route::controller('album', 'AlbumController');
    Route::controller('title', 'TitleController');
});