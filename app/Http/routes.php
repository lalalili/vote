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
Route::post('pull', 'VoteController@pull');
Route::get('pdpa', function () {
    return view('pdpa');
});
Route::get('thanks', function () {
    return view('success');
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('/home', function () {
    return redirect('/admin/photo/list');
});
Route::get('admin/votes/syncvote', 'VoteController@syncvote');
Route::get('admin/votes/recal', 'VoteController@recal');
Route::get('admin/post_votes/recal', 'VoteController@postrecal');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect('/admin/photo/list');
    });
    Route::controller('photo', 'PhotoController');

});

Route::group(['prefix' => 'admin', 'middleware' => 'acl'], function () {
    Route::controller('album', 'AlbumController');
    Route::controller('title', 'TitleController');
    Route::controller('vote', 'VoteController');
    Route::get('summary', 'VoteController@count');
    Route::get('post_summary', 'VoteController@postcount');
    Route::get('reset/votes', 'VoteController@resetVotes');
    Route::get('reset/photos', 'VoteController@resetPhotos');
    Route::get('votes/download', 'VoteController@downloadVote');
    Route::get('post_votes/download', 'VoteController@postdownloadVote');
    Route::get('summary/download', 'VoteController@downloadSummary');
    Route::get('post_summary/download', 'VoteController@postdownloadSummary');
    Route::get('whitelist_votes/download', 'VoteController@downloadWhitelistVote');
    Route::get('adv', function () {
        return view('admin.adv');
    });
//    Route::get('seed', 'VoteController@seed');
    Route::controller('whitelist', 'WhitelistController');
//    Route::get('signup/{id}/step2', 'SignupController@step2');
//    Route::post('signup/{id}/step2', 'SignupController@step2');
    Route::controller('signup', 'SignupController');

});
