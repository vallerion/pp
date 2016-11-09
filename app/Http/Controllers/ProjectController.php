<?php

namespace App\Http\Controllers;

use App\Project;
use App\Team;
use Input;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{

    public function get(Project $project, Request $request) {

        $user = Auth::user();

        $user = $project->users()->withPivot('user_id', 'user_group')->wherePivot('user_id', '=', $user->id)->first();

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
                return $project; //  return view(...);

            else if ($user->pivot->user_group === "user")
                return $project; //  return view(...);

        }
        else if ($project->visible === 1)
            return $project; //  return view(...);


        return response('access forbidden.', 403); // $response = 403
    }

    public function user(Project $project, Request $request) {

        $user = Auth::user();

        $user = $project->users()->withPivot('user_id', 'user_group')->wherePivot('user_id', '=', $user->id)->first();

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
                return $project->users()->get(); //  return view(...);

            else if ($user->pivot->user_group === "user")
                return $project->users()->get(); //  return view(...);

        }
        else if ($project->visible === 1)
            return $project->users()->get(); //  return view(...);


        return response('access forbidden.', 403); // $response = 403
    }

    public function team(Project $project, Request $request) {

        $user = Auth::user();

//        dd($project);

        $user = $project->users()->withPivot('user_id', 'user_group')->wherePivot('user_id', '=', $user->id)->first();

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
                return $project->teams()->get(); //  return view(...);

            else if ($user->pivot->user_group === "user")
                return $project->teams()->get(); //  return view(...);

        }
        else if ($project->visible === 1)
            return $project->teams()->get(); //  return view(...);


        return response('access forbidden.', 403); // $response = 403
    }

    public function getAjax(Project $project) {
        return view("ajax.modal.show.project", [ 'project' => $project ]);
    }

    public function getCreateAjax() {

        $user = Auth::user();

        $teams = $user->teams();

        if( ! $teams->isEmpty())
            return view("ajax.modal.create.project", [ 'teams' => $teams]);
        else
            return json_encode(['successful' => false,
                'detail' => ['You do not have have permission to create project']
            ]);

    }
    
    public function createAjax(ProjectRequest $request) {

        $team = Team::where('id', $request->team)->first();

        $project = $team->projects()->where('name', '=', $request->name)->first();

        if( ! is_null($project))
            return json_encode(
                [
                    'successful' => false,
                    'detail' => 'Such project in the team already exists' // уже существует в команде
                ]
             );

        if( ! is_null($team)){

            $project = Project::create([
                'name' => $request->name,
                'about' => isset($request->about) ? $request->about : ''
//                'about' => $request->about ?? '' // php 7
            ]);

            $project->teams()->attach($team->id);
        }
        else
            return json_encode(
                [
                    'successful' => false,
                    'detail' => 'Something wrong' // что-то пошло не так...
                ]
            );

    }

    public function updateAjax(Project $project, ProjectRequest $request) {
        $project->update($request->all());
    }

    public function deleteAjax(Project $project) {

        $project->teams()->detach();

        $project->delete();
    }
    
    
    
    
    public function index(Guard $auth){
//        return Auth::user()->projects->toJson();
//        return $auth->user()->projects->toJson();

        return view("workspace.projects", ["projects" => $auth->user()->projects]);
    }

    public function create(){
        return view("ajax.modal.create.project");
    }

    public function store(ProjectRequest $request, Guard $auth){

        $project = $auth->user()->projects()->create($request->all(), ['user_group' => 'author']);

        if($request->team_id){

//            $project->teams()->sync(["project_id" => $project->id, "team_id" => $request->team_id]);
            $project->teams()->sync([$project->id=>["project_id" => $project->id, "team_id" => $request->team_id]]);

        }

        if($project)
            return json_encode(['successful' => true,
                'detail' => ['Project "' . $project->name . '" is created']
            ]);
    }

    public function show(Request $request, $project){
//        echo \Request::ajax();
        return $project;
    }

    public function showModal($project){
//        return $project->toJson();
//        return ["project" => $project, "users" => ];
        return view("ajax.modal.show.project", ['project' => $project]);
    }

    public function edit($project){
        return view("ajax.modal.edit.project", ['project' => $project]);
    }
    
    public function users($project){
        return json_encode($project->users);
    }

    public function teams($project){
        return json_encode($project->teams);
    }

    public function update(ProjectRequest $request){

    }

    public function destroy($project){

    }

}
