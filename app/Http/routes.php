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

    Route::get('profile', 'Workspace\WorkspaceController@getProfile');
    
    Route::get('profile/{user}', 'Workspace\WorkspaceController@getProfile');

    


    Route::get('projects', 'Workspace\WorkspaceController@getProjects');

    Route::get('projects/create', 'Workspace\WorkspaceController@getProjectCreate');

    Route::post('projects/create', 'Workspace\WorkspaceController@postProjectCreate');

    Route::get('projects/{project}', 'Workspace\WorkspaceController@getProjects');




    Route::get('tasks', 'Workspace\WorkspaceController@getTasks');

    Route::get('tasks/create', 'Workspace\WorkspaceController@getTaskCreate');

    Route::post('tasks/create', 'Workspace\WorkspaceController@postTaskCreate');

    Route::get('tasks/{task}', 'Workspace\WorkspaceController@getTasks');




    Route::get('teams', 'Workspace\WorkspaceController@getTeams');

    Route::get('teams/create', 'Workspace\WorkspaceController@getTeamCreate');

    Route::post('teams/create', 'Workspace\WorkspaceController@postTeamCreate');

    Route::get('teams/{team}', 'Workspace\WorkspaceController@getTeams');


//    Route::get('test', function(){
//        session(['current_team_id' => 55]);
//        Session::forget('current_team_id');
//        $response = new \Illuminate\Http\Response();
//        return $response->withCookie(cookie('current_team_id', 'none'));
//        echo \App\Task::where('id', '1')->first()->users_from;
//    });
});

Route::get('auth/', 'Auth\AuthController@getRegister');

Route::get('auth/activate', 'Auth\AuthController@getActivate');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('auth/reset', 'Auth\AuthController@postReset');