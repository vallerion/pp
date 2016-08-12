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
        return $auth->user()->projects->toJson();
    }

    public function create(){
        return view("workspace.forms.modal.create_project");
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

    public function modal($project){
//        return $project->toJson();
//        return ["project" => $project, "users" => ];
        return view("workspace.forms.modal.show_project", ['project' => $project]);
    }

    public function myTask($project, Guard $auth){
        return $project->tasks("id", "name")->where('user_to_id', $auth->user()->id)->orderBy('status', 'DESC')->get()->toJson();
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
