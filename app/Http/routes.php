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

/**
 *  User routing
 *
 * get - /user/{id}
 *  return user page (+ edit enable)
 *
 * post  - /ajax/user/
 *  create new user
 *
 * put - /ajax/user/{id}
 *  update user
 *
 * delete - /ajax/user/{id}
 *  delete user
 *
 */

/**
 * Team routing
 *
 * get - /team/{id}
 *  return html page (+ edit enable)
 *
 * get - /ajax/team/{id}
 *  return html modal (+ edit enable)
 *
 * post - /ajax/team/
 *  create new team
 *
 * put - /ajax/team/{id}
 *  update team from modal or page
 *
 * delete - /ajax/team/{id}
 *  delete team
 *
 * get - /team/{id}/user
 *  return members in team, json
 *
 * get - /team/{id}/project
 *  return projects of team, json
 *
 */

/**
 * Project routing
 *
 * get - /project/{id}
 *  return html page (+ edit)
 *
 * get - /ajax/project/{id}
 *  return html modal (+ edit)
 *
 * post - /ajax/project/
 *  create new project
 *
 * put - /ajax/project/{id}
 *  update project from modal or page
 *
 * delete - /ajax/project/{id}
 *  delete project
 *
 * get - /project/{id}/user
 *  return users which work in this project, json
 *
 * get - /project/{id}/team
 *  return teams which work in this project, json
 *
 *
 */

/**
 * Task routing
 *
 * get - /project/{project_id}/{id}
 *  return html page (+ edit)
 *
 * get - /ajax/project/{project_id}/{id}
 *  return html modal (+ edit)
 *
 * post - /ajax/project/{project_id}/
 *  create new task in project
 *
 * put - /ajax/project/{project_id}/{id}
 *  update task: open, close, reopen, edit
 *
 * delete - /ajax/project/{project_id}/{id}
 *  delete task
 *
 */



Route::group(['prefix' => 'workspace', 'middleware' => 'auth'], function () {

    Route::get('/', 'Workspace\WorkspaceController@index');

    Route::resource('profile', 'Auth\AuthController', ['only' => [
        'index', 'show', 'update'
    ]]);

//    Route::put

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