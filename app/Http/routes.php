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
    return "welcome";
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('workspace', 'Workspace\WorkspaceController@index');

    Route::get('workspace/projects', 'Workspace\WorkspaceController@getProjects');

});

Route::get('auth/', 'Auth\AuthController@getRegister');

Route::get('auth/activate', 'Auth\AuthController@getActivate');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('auth/reset', 'Auth\AuthController@postReset');

