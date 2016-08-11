<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;

use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{

    public function index(Guard $auth){
        return view("workspace.tasks");
    }

    public function create(){
        return view("workspace.forms.modal.create_task", ["marks" => Task::marks]);
    }

    public function store(TaskRequest $request, Guard $auth){
        
        if(!empty($request->mark)) {
            $mark = implode(',', $request->mark);
            $request->merge(["mark" => $mark]);
        }

        $request->merge(["user_from_id" => $auth->user()->id]);

        $task = Task::create($request->all());

        if($task)
            return json_encode(['successful' => true,
                'detail' => ['Task "' . $task->name . '" is created']
            ]);
    }

    public function show($task){
        return $task;
    }

    public function modal($task){
        return view("workspace.forms.modal.show_task", ['task' => $task]);
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
