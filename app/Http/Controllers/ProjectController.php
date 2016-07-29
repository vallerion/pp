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
        return view("workspace.ajax_responce.modal_form.create_project");
    }

    public function store(ProjectRequest $request, Guard $auth){

        $project = $auth->user()->projects()->create($request->all(), ['user_group' => 'author']);

        if($project)
            return json_encode(['successful' => true,
                'detail' => ['Project "' . $project->name . '" is created']
            ]);
    }

    public function show(Request $request, $project){
//        echo \Request::ajax();
    }

    public function modal($project){
//        return $project->toJson();
//        return ["project" => $project, "users" => ];
        return view("workspace.ajax_responce.modal_form.show_project", ['project' => $project]);
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
