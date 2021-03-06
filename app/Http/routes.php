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
Route::get('home', 'AlbumController@show');
Route::get('store/{id}', 'AlbumController@choose');
Route::get('show/{id}', 'PhotoController@show');
Route::get('choose/{id}', 'PhotoController@choose');
Route::post('poll', 'VoteController@poll');
Route::get('pdpa', 'RedirectController@pdpa');
Route::get('thanks', 'RedirectController@thanks');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('lottery', 'RedirectController@lottery');
Route::post('touching/poll', 'TouchController@poll');
Route::post('touching/poll_yearly', 'TouchController@pollYear');
Route::get('touching/thanks', 'RedirectController@tunchingThanks');
Route::get('signup/data/{type}', 'PhotoController@signupData');
Route::get('touching/show', 'StoryController@show');
Route::get('touching', 'StoryController@show');
//Route::get('touching', 'TouchController@show');
//Route::get('touching/show', 'TouchController@show');
//Route::get('touching/yearly', 'TouchController@yearly');

Route::group(['prefix' => 'api'], function () {
    Route::get('callback_download', 'ApiController@callbackDownload');
    Route::get('callback_list', 'ApiController@callbackLists');
    Route::any('callback_edit', 'ApiController@callbackEdit');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::post('signup/step3', 'SignupController@step3');
    Route::get('/', 'RedirectController@adminHome');
    Route::get('photo/list', 'PhotoController@lists');
    Route::any('photo/edit', 'PhotoController@edit');

    Route::get('signup/choose/{type}', 'RedirectController@signupChoose');
    Route::get('signup/data/{type}', 'PhotoController@signupData');
//    Route::get('signup/la_choose', 'EmployeeController@la_choose');
//    Route::get('signup/lb_choose', 'EmployeeController@lb_choose');
//    Route::get('signup/lc_choose', 'EmployeeController@lc_choose');
//    Route::get('signup/ld_choose', 'EmployeeController@ld_choose');
//    Route::get('signup/le_choose', 'EmployeeController@le_choose');
//    Route::get('signup/luxgen_choose', 'EmployeeController@luxgen_choose');
    Route::get('signup/step1/{id}', 'EmployeeController@step1');
    Route::post('signup/step1/save', 'EmployeeController@saveEmployee');

    Route::get('signup/step2/{id}', 'SignupController@step2');
    Route::get('signup/step2/project/{project_id}', 'SignupController@step2Project');
    Route::get('signup/step2/course/{course_id}', 'SignupController@step2Course');
    Route::get('signup/step2/event/{event_id}', 'SignupController@step2Event');
    Route::post('signup/step3', 'SignupController@step3');
    Route::get('signup/list', 'SignupController@lists');
    Route::any('signup/edit', 'SignupController@edit');

    Route::get('employee/list', 'EmployeeController@lists');
    Route::any('employee/edit', 'EmployeeController@edit');
    Route::post('employee/batch', 'EmployeeController@batch');
    Route::get('employee/download', 'EmployeeController@download');
    Route::get('signup/downloadAll', 'SignupController@downloadAll');
});

Route::group(['prefix' => 'admin', 'middleware' => 'acl'], function () {
    Route::get('adv', 'RedirectController@adv');
    Route::get('wall/{id}', 'PhotoController@wall');
    Route::get('photo/adminlist', 'PhotoController@adminList');
    Route::any('photo/adminedit', 'PhotoController@adminEdit');
    Route::get('photo/reset', 'PhotoController@resetPhotos');
    Route::get('photo/download', 'PhotoController@download');
    Route::post('photo/batch', 'PhotoController@batch');

    //Route::controller('vote', 'VoteController');
    //Route::get('seed', 'VoteController@seed');
    Route::get('vote/list', 'VoteController@lists');
    Route::any('vote/edit', 'VoteController@edit');
    Route::get('vote/postlist', 'VoteController@postlists');
    Route::any('vote/postedit', 'VoteController@postedit');
    Route::get('vote/whitelist', 'VoteController@whitelists');
    Route::any('vote/whitelistedit', 'VoteController@whitelistedit');
    Route::get('summary', 'VoteController@count');
    Route::get('post_summary', 'VoteController@postcount');
    Route::get('vote/recal', 'VoteController@recal');
    Route::get('post_vote/recal', 'VoteController@postrecal');
    Route::get('vote/download', 'VoteController@downloadVote');
    Route::get('post_vote/download', 'VoteController@postdownloadVote');
    Route::get('summary/download', 'VoteController@downloadSummary');
    Route::get('post_summary/download', 'VoteController@postdownloadSummary');
    Route::get('whitelist_vote/download', 'VoteController@downloadWhitelistVote');
    Route::get('vote/syncvote', 'VoteController@syncvote');
    Route::get('vote/reset', 'VoteController@resetVotes');

    //Route::controller('whitelist', 'WhitelistController');
    Route::get('whitelist/list', 'WhitelistController@lists');
    Route::any('whitelist/edit', 'WhitelistController@edit');
    Route::post('whitelist/batch', 'WhitelistController@batch');
    Route::get('whitelist/download', 'WhitelistController@download');

    //Route::controller('album', 'AlbumController');
    Route::get('album/list', 'AlbumController@lists');
    Route::any('album/edit', 'AlbumController@edit');
    Route::post('album/batch', 'AlbumController@batch');
    Route::get('album/download', 'AlbumController@download');

    //Route::controller('title', 'TitleController');
    Route::get('title/list', 'TitleController@lists');
    Route::any('title/edit', 'TitleController@edit');
    Route::post('title/batch', 'TitleController@batch');
    Route::get('title/download', 'TitleController@download');

    //Route::controller('employee', 'EmployeeController');



    //Route::controller('project', 'ProjectController');
    Route::get('project/list', 'ProjectController@lists');
    Route::any('project/edit', 'ProjectController@edit');
    Route::post('project/batch', 'ProjectController@batch');
    Route::get('project/download', 'ProjectController@download');

    //Route::controller('course', 'CourseController');
    Route::get('course/list', 'CourseController@lists');
    Route::any('course/edit', 'CourseController@edit');
    Route::post('course/batch', 'CourseController@batch');
    Route::get('course/download', 'CourseController@download');

    //Route::controller('event', 'EventController');
    Route::get('event/list', 'EventController@lists');
    Route::any('event/edit', 'EventController@edit');
    Route::post('event/batch', 'EventController@batch');
    Route::get('event/download', 'EventController@download');

    //Route::controller('signup', 'SignupController');
    Route::get('signup/download', 'SignupController@download');
    Route::get('signup/reset', 'SignupController@resetSignups');
    Route::post('signup/batch', 'SignupController@batch');

    Route::post('touching/batch', 'TouchController@batch');
    Route::post('touching/topic', 'TouchController@topic');
    Route::get('touching/edit', 'RedirectController@touchingEdit');
    Route::get('touching/poll/list', 'TouchController@lists');
    Route::any('touching/poll/edit', 'TouchController@edit');
    Route::get('touching/poll/reset', 'TouchController@reset');
    Route::get('touching/poll/draw', 'TouchController@draw');
    Route::get('touching/poll/count', 'TouchController@count');
    Route::get('touching/poll/name/{id}', 'TouchController@name');
    Route::get('touching/download', 'TouchController@download');

    Route::get('touching2/list_title', 'StoryController@listTitle');
    Route::any('touching2/edit_title', 'StoryController@editTitle');
    Route::get('touching2/lists', 'StoryController@lists');
    Route::any('touching2/edit', 'StoryController@edit');
});
