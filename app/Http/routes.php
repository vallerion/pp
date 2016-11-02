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

Route::get('/', function(){
    return redirect('workspace');
});

Route::group(['prefix' => 'workspace', 'middleware' => 'auth'], function () {

    Route::get('/', 'Workspace\WorkspaceController@index');


//    Route::get('profile', 'Auth\AuthController@getProfile');
    
//    Route::get('profile/{user}', 'Auth\AuthController@getProfile');

    Route::resource('profile', 'Auth\AuthController', ['only' => [
        'index', 'show', 'update'
    ]]);


    Route::resource('project', 'ProjectController', ['except' => [
        'create', 'edit'
    ]]);


    Route::resource('task', 'TaskController', ['except' => [
        'create', 'edit'
    ]]);


    Route::resource('team', 'TeamController', ['except' => [
        'create', 'edit'
    ]]);

});

Route::group(['prefix' => 'ajax', 'middleware' => 'auth'], function () {

    Route::group(['prefix' => 'user'], function(){

        Route::get('task/{id?}', 'Auth\AuthController@myTask');

        Route::get('{user}/profile-sm', 'Auth\AuthController@profileSm');


    });



    Route::group(['prefix' => 'project'], function(){

        Route::get('create', 'ProjectController@create');

        Route::get('{project}/teams', 'ProjectController@teams');

        Route::get('{project}/users', 'ProjectController@users');

        Route::get('{project}/show', 'ProjectController@showModal');

        Route::get('{project}/edit', 'ProjectController@edit');

    });



    Route::group(['prefix' => 'task'], function(){

        Route::get('create', 'TaskController@create');

        Route::get('{task}/action', 'TaskController@action');

        Route::get('{task}/users', 'TaskController@users');

        Route::get('{task}/project', 'TaskController@project');

        Route::get('{task}/show', 'TaskController@showModal');

        Route::get('{task}/edit', 'TaskController@edit');

    });



    Route::group(['prefix' => 'team'], function(){

        Route::get('create', 'TeamController@create');

        Route::get('{team}/users', 'TeamController@users');

        Route::get('{team}/projects', 'TeamController@projects');

        Route::get('{team}/show', 'TeamController@showModal');

        Route::get('{team}/edit', 'TeamController@edit');

    });



});

Route::group(['prefix' => 'auth'], function(){

    Route::get('/', 'Auth\AuthController@getRegister');

    Route::get('activate', 'Auth\AuthController@getActivate');

    Route::get('logout', 'Auth\AuthController@getLogout');

    Route::post('login', 'Auth\AuthController@postLogin');

    Route::post('register', 'Auth\AuthController@postRegister');

    Route::post('reset', 'Auth\AuthController@postReset');

});