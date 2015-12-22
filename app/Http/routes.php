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
    Route::get('signup/la_choose', 'EmployeeController@la_choose');
    Route::get('signup/lb_choose', 'EmployeeController@lb_choose');
    Route::get('signup/lc_choose', 'EmployeeController@lc_choose');
    Route::get('signup/ld_choose', 'EmployeeController@ld_choose');
    Route::get('signup/le_choose', 'EmployeeController@le_choose');
    Route::get('signup/luxgen_choose', 'EmployeeController@luxgen_choose');
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
    Route::get('wall/{id}', 'PhotoController@wall');
    Route::get('signup/choose', 'EmployeeController@choose');
    Route::get('signup/step1/{id}', 'EmployeeController@step1');
    Route::post('signup/step1/save', 'EmployeeController@saveEmployee');
    Route::get('signup/step2/{id}', 'SignupController@step2');
    Route::get('signup/step2/project/{project_id}', 'SignupController@step2Project');
    Route::get('signup/step2/course/{course_id}', 'SignupController@step2Course');
    Route::get('signup/step2/event/{event_id}', 'SignupController@step2Event');
    Route::post('signup/step3', 'SignupController@step3');
    Route::controller('signup', 'SignupController');
    Route::controller('employee', 'EmployeeController');
    Route::controller('project', 'ProjectController');
    Route::controller('course', 'CourseController');
    Route::controller('event', 'EventController');
});
