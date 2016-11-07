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

    public function get(Team $team, Request $request){

        $user = Auth::user();

        if($request->ajax())
            return $team;

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
                return 'admin access!';

            else if ($user->pivot->user_group === "user")
                return 'user access';

        }
        else if ($team->visible === 1)
            return $team;

        else
            return 'access forbiden!';

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
