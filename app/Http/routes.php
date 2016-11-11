<?php

/**
 * User routing
 *
 * get - /workspace/user/{id}
 *  return user page (+ edit enable)
 *
 * post  - /ajax/user/
 *  create new user
 *
 * put - /ajax/user/
 *  update CURRENT user
 *
 * delete - /ajax/user/{id}
 *  delete user
 *
 */

/**
 * Team routing
 *
 * get - /workspace/team/{id}
 *  return html page (+ edit enable)
 *
 * get - /ajax/team/{id}
 *  return html modal (+ edit enable)
 *
 * get - /ajax/team/new
 *  return html modal (create enable)
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
 * get - /workspace/team/{id}/user
 *  return members in team, json
 *
 * get - /workspace/team/{id}/project
 *  return projects of team, json
 *
 */

/**
 * Project routing
 *
 * get - /workspace/project/{id}
 *  return html page (+ edit)
 *
 * get - /ajax/project/{id}
 *  return html modal (+ edit)
 *
 * get - /ajax/project/new
 *  return html modal (create)
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
 * get - /workspace/project/{id}/user
 *  return users which work in this project, json
 *
 * get - /workspace/project/{id}/team
 *  return teams which work in this project, json
 *
 *
 */

/**
 * Task routing
 *
 * get - /workspace/project/{project_id}/{id}
 *  return html page (+ edit)
 *
 * get - /ajax/project/{project_id}/{id}
 *  return html modal (+ edit)
 *
 * get - /ajax/project/{project_id}/new
 *  return html modal (create)
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




Route::get('/', function(){
    return redirect('workspace');
});

/**
 * auth prefix
 *
 * get - / - html page
 *
 * post - / - login user
 *
 * get /logout - logout user
 *
 */

Route::group(['prefix' => 'auth'], function(){

    Route::get('/', 'Auth\AuthController@get');

    Route::post('/', 'Auth\AuthController@loginAjax');

    Route::get('logout', 'Auth\AuthController@logout');

});


Route::get('/activate/{code}', 'User\UserController@activateUser');



/**
 * workspace prefix
 *
 * get - /workspace/user/{id}
 *
 * get - /workspace/team/{id}
 * get - /workspace/team/{id}/user
 * get - /workspace/team/{id}/project
 *
 * get - /workspace/project/{id}
 * get - /workspace/project/{id}/user
 * get - /workspace/project/{id}/team
 *
 * get - /workspace/project/{project_id}/{id}
 *
 *
 */

Route::group([ 'prefix' => 'workspace', 'middleware' => 'auth' ], function () {
//Route::group(['prefix' => 'workspace'], function () {

    Route::get('/', function () {
        return 'work!';
    });

    Route::group(['prefix' => 'user'], function () {

        Route::get('{user?}', 'User\UserController@get');

    });

    Route::group(['prefix' => 'team'], function () {

        Route::get('{team}', 'TeamController@get');

        Route::get('{team}/user', 'TeamController@user');

        Route::get('{team}/project', 'TeamController@project');

    });

    Route::group(['prefix' => 'project'], function () {

        Route::get('{project}', 'ProjectController@get');

        Route::get('{project}/user', 'ProjectController@user');

        Route::get('{project}/team', 'ProjectController@team');


        Route::get('{project}/{task}', 'TaskController@get');

    });


});


/**
 * ajax prefix
 *
 * post  - /ajax/user/  - create user
 * put - /ajax/user/    - update user
 * delete - /ajax/user/{id} - delete user
 *
 * get - /ajax/team/new     - html (modal) create team
 * get - /ajax/team/{id}    - html (modal) team
 * post - /ajax/team/       - create team
 * put - /ajax/team/{id}    - update team
 * delete - /ajax/team/{id} - delete team
 *
 * get - /ajax/project/new - html (modal) create project
 * get - /ajax/project/{id} - html (modal) project
 * post - /ajax/project/    - create new project
 * put - /ajax/project/{id} - update project
 * delete - /ajax/project/{id}  - delete project
 *
 * get - /ajax/project/{project_id}/{id} - html (modal) task
 * get - /ajax/project/{project_id}/new  - html (modal) create task
 * post - /ajax/project/{project_id}     - create new task
 * put - /ajax/project/{project_id}/{id} - update task
 * delete - /ajax/project/{project_id}/{id} - delete task
 *
 *
 */

Route::group([ 'prefix' => 'ajax'], function () {


    Route::post('user', 'User\UserController@createAjax');


    Route::group([ 'middleware' => 'auth'  ], function () {


        Route::group(['prefix' => 'user'], function () {

            Route::put('/', 'User\UserController@updateAjax'); //not work yet

            Route::delete('{user}', 'User\UserController@deleteAjax');

        });

        Route::group(['prefix' => 'team'], function () {

            Route::get('{team}', 'TeamController@getAjax');

            Route::get('/new', 'TeamController@getCreateAjax');

            Route::post('/', 'TeamController@createAjax');

            Route::put('{team}', 'TeamController@updateAjax');

            Route::delete('{team}', 'TeamController@deleteAjax');

        });

        Route::group(['prefix' => 'project'], function () {

            Route::get('{project}', 'ProjectController@getAjax');

            Route::get('/new', 'ProjectController@getCreateAjax');

            Route::post('/', 'ProjectController@createAjax');

            Route::put('{project}', 'ProjectController@updateAjax');

            Route::delete('{project}', 'ProjectController@deleteAjax');

            // -- task -- //

            Route::get('{project}/{task}', 'TaskController@getAjax');

            Route::get('{project}/new', 'TaskController@getCreateAjax');

            Route::post('{project}', 'TaskController@createAjax');

            Route::put('{project}/{task}', 'TaskController@updateAjax');

            Route::delete('{project}/{task}', 'TaskController@deleteAjax');

        });


    });



});


