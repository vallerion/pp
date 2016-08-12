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


    Route::get('test', function(){
        return Helper::filterHtml("test");
    });



//    Route::get('profile', 'Auth\AuthController@getProfile');
    
//    Route::get('profile/{user}', 'Auth\AuthController@getProfile');

    Route::resource('profile', 'Auth\AuthController', ['only' => [
        'index', 'show', 'update'
    ]]);




    Route::get('project/{project}/users', 'ProjectController@users');

    Route::get('project/{project}/mytask', 'ProjectController@myTask');

    Route::get('project/{project}/teams', 'ProjectController@teams');

    Route::get('project/{project}/modal', 'ProjectController@modal');

    Route::resource('project', 'ProjectController');



    Route::get('task/{task}/action', 'TaskController@action');

    Route::get('task/{task}/users', 'TaskController@users');

    Route::get('task/{task}/project', 'TaskController@project');

    Route::get('task/{task}/modal', 'TaskController@modal');

    Route::resource('task', 'TaskController');




    Route::get('team/{team}/users', 'TeamController@users');

    Route::get('team/{team}/projects', 'TeamController@projects');

    Route::get('team/{team}/modal', 'TeamController@modal');

    Route::resource('team', 'TeamController');

});


Route::get('auth/', 'Auth\AuthController@getRegister');

Route::get('auth/activate', 'Auth\AuthController@getActivate');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('auth/reset', 'Auth\AuthController@postReset');