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

    Route::get('projects', 'Workspace\WorkspaceController@getProjects');

    Route::get('teams', 'Workspace\WorkspaceController@getTeams');

    Route::get('test', function(){
//        session(['current_team_id' => 55]);
//        Session::forget('current_team_id');
//        echo
//        $response = new \Illuminate\Http\Response();
//        return $response->withCookie(cookie('current_team_id', 55));
    });

    Route::get('teams/fcreate', 'Workspace\WorkspaceController@getTeamCreateFirst');
    Route::get('teams/create', 'Workspace\WorkspaceController@getTeamCreate');

    Route::post('teams/create', 'Workspace\WorkspaceController@postTeamCreate');

});

Route::get('auth/', 'Auth\AuthController@getRegister');

Route::get('auth/activate', 'Auth\AuthController@getActivate');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('auth/reset', 'Auth\AuthController@postReset');