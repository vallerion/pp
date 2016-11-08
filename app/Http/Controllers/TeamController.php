<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Team;

use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{

    public function get(Team $team, Request $request) {

        $user = Auth::user();

        $user = $team->users()->withPivot('user_id', 'user_group')->wherePivot('user_id', '=', $user->id)->first();

        if( ! is_null($user)){

            /*
             * TODO: change access system
             *
             * example:
             *
             * if($user->userGroup()->right >= Rights::admin()) // where userGroup individual table, with record for THIS team
             *
             *
             */

            if($user->pivot->user_group === "author")
                return $team; //  return view(...);

            else if ($user->pivot->user_group === "user")
                return $team; //  return view(...);

        }
        else if ($team->visible === 1)
            return $team; //  return view(...);


        return response('access forbidden.', 403); // $response = 403
    }

    public function user(Team $team, Request $request) {

        $user = Auth::user();

        $user = $team->users()->withPivot('user_id', 'user_group')->wherePivot('user_id', '=', $user->id)->first();

        if( ! is_null($user)){

            /*
             * TODO: change access system
             *
             * example:
             *
             * if($user->userGroup()->right >= Rights::admin()) // where userGroup individual table, with record for THIS team
             *
             *
             */

            if($user->pivot->user_group === "author")
                return $team->users()->get(); //  return view(...);

            else if ($user->pivot->user_group === "user")
                return $team->users()->get(); //  return view(...);

        }
        else if ($team->visible === 1)
            return $team->users()->get(); //  return view(...);


        return response('access forbidden.', 403); // $response = 403
    }

    public function project(Team $team, Request $request) {

        $user = Auth::user();

        $user = $team->users()->withPivot('user_id', 'user_group')->wherePivot('user_id', '=', $user->id)->first();

        if( ! is_null($user)){

            /*
             * TODO: change access system
             *
             * example:
             *
             * if($user->userGroup()->right >= Rights::admin()) // where userGroup individual table, with record for THIS team
             *
             *
             */

            if($user->pivot->user_group === "author")
                return $team->projects()->get(); //  return $ajax ? $team : view(...);

            else if ($user->pivot->user_group === "user")
                return $team->projects()->get(); //  return $ajax ? $team : view(...);

        }
        else if ($team->visible === 1)
            return $team->projects()->get(); //  return $ajax ? $team : view(...);


        return response('access forbidden.', 403); // $response = 403
    }

    public function getAjax(Team $team, Request $request) {
        return view("ajax.modal.show.team", [ 'team' => $team ]);
    }

    public function createAjax(TeamRequest $request) {

        $user = Auth::user();

        $team = Team::create($request->all());

        $team->users()->attach($user->id);
    }

    public function updateAjax(Team $team, TeamRequest $request) {
        $team->update($request->all());
    }
    
    public function deleteAjax(Team $team) {

        $team->users()->detach(); // delete relation (user_team table)

        $team->delete();
    }
    


    public function index(Guard $auth){
        return $auth->user()->teams->toJson();
    }

    public function create(){
        return view("ajax.modal.create.team");
    }

    public function store(TeamRequest $request, Guard $auth){
        
        $team = $auth->user()->teams()->create($request->all(), ['user_group' => 'author']);

        if($team)
            return json_encode(['successful' => true,
                                'detail' => ['Team "' . $team->name . '" is created']
                                ]);
    }

    public function show($team){
//        echo \Request::ajax();
        return $team;
    }

    public function showModal($team){
        return view("ajax.modal.show.team", ['team' => $team]);
    }

    public function edit($team){
        return view("ajax.modal.edit.team", ['team' => $team]);
    }

    public function users($project){
        return json_encode($project->users);
    }

    public function projects($project){
        return json_encode($project->projects);
    }

    public function update($team, $data){

    }

    public function destroy($team){

    }

}
