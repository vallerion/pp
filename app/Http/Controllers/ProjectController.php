<?php

namespace App\Http\Controllers;

use Input;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{

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
