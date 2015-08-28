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

Route::get('/', 'AlbumController@show');

Route::get('store/{id}', 'AlbumController@choose');

Route::get('show/{id}', 'PhotoController@show');
Route::get('choose/{id}', 'PhotoController@choose');
Route::post('pull', 'PhotoController@pull');
Route::get('pdpa', function(){
    return view('pdpa');
});
Route::get('thanks', function(){
    return view('success');
});

//Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect('admin/photo/list');
    });
    Route::controller('photo', 'PhotoController');
    Route::controller('album', 'AlbumController');
    Route::controller('title', 'TitleController');
    Route::controller('vote', 'VoteController');
    Route::get('summary', 'VoteController@count');
    Route::get('seed', 'VoteController@seed');
});