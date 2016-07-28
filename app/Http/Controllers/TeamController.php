<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;

class TeamController extends Controller
{

    public function index(){
        return Auth::user()->teams;
    }

    public function create(){
        return view("workspace.ajax_responce.modal_form.create_team");
    }

    public function store(){
        $data = \Request::all();

        $validator = $this->validatorCreate($data);
        if ($validator->fails()) {
            return json_encode(['successful' => false,
                                'detail' => $validator->errors()->all()]
            );
        };
        
        $team = Auth::user()->teams()->create($data, ['user_group' => 'author']);

        if($team)
            return json_encode(['successful' => true,
                                'detail' => ['Team "' . $team->name . '" is created']
                                ]);
    }

    private function validatorCreate(array $data){
        return Validator::make($data, [
            'name' => 'required|max:255',
            'about' => 'max:1024'
        ]);
    }

    public function show($team){
//        echo \Request::ajax();
    }

    public function modal($team){
        return view("workspace.ajax_responce.modal_form.show_team", ['team' => $team]);
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
