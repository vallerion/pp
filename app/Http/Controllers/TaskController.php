<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;

class TaskController extends Controller
{

    public function index(){
        return view("workspace.tasks");
    }

    public function create(){
        return view("workspace.ajax_responce.modal_form.create_task", ["marks" => Task::marks]);
    }

    public function store(){
        $data = \Request::all();

        if(!empty($data["mark"]))
            $data["mark"] = implode(',', $data["mark"]);

        $validator = $this->validatorCreate($data);
        if ($validator->fails()) {
            return json_encode(['successful' => false,
                    'detail' => $validator->errors()->all()]
            );
        };

        $data = array_add($data, 'user_from_id', Auth::user()->id);

//        var_dump($data);exit;
        $task = Task::create($data);

        if($task)
            return json_encode(['successful' => true,
                'detail' => ['Task "' . $task->name . '" is created']
            ]);
    }

    private function validatorCreate(array $data){
        return Validator::make($data, [
            'name' => 'required|max:255',
            'about' => 'max:2048',
            'user_to_id' => 'required|integer|not_in:0',
            'team_id' => 'integer|not_in:0'
        ]);
    }

    public function show($task){
//        echo \Request::ajax();
    }

    public function modal($task){
        return view("workspace.ajax_responce.modal_form.show_task", ['task' => $task]);
    }

    public function users($task){
        return json_encode($task->users);
    }

    public function projects($task){
        return json_encode($task->projects);
    }

    public function update($task, $data){

    }

    public function destroy($task){

    }
}
