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
Route::get('/home', 'AlbumController@show');
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

Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout','Auth\AuthController@getLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
//Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect('admin/photo/list');
    });
    Route::get('/home', function () {
        return redirect('admin/photo/list');
    });
    Route::controller('photo', 'PhotoController');

});

Route::group(['prefix' => 'admin', 'middleware' => 'acl'], function() {
    Route::controller('album', 'AlbumController');
    Route::controller('title', 'TitleController');
    Route::controller('vote', 'VoteController');
    Route::get('summary', 'VoteController@count');
    Route::get('reset', 'VoteController@reset');
    Route::get('votes/download', 'VoteController@downloadVote');
    Route::get('recal', 'VoteController@recal');
    Route::get('seed', 'VoteController@seed');
    Route::get('summary/download', 'VoteController@downloadSummary');
    Route::get('adv', function () {
        return view('admin.adv');
    });
});
