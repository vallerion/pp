<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Project;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function get(Project $project, Task $task, TaskRequest $request){

        $task = $project->tasks()->where('id', '=', $task->id)->first();
        
        if( ! is_null($task)) {
            // TODO: change rights
            return $task;
        }

        return response('non found', 404);
    }
    
    public function getAjax(Project $project, Task $task, TaskRequest $request) {

        $task = $project->tasks()->where('id', '=', $task->id)->first();

        if( ! is_null($task))
            return $task;

        return json_encode([
            'successful' => false,
            'detail' => ['Task non found!']
        ]);
    }

    public function getCreateAjax(Project $project, TaskRequest $request) {

        $marks = Mark::all();

        return view("ajax.modal.create.task", ['project' => $project, 'marks' => $marks]);
    }
    
    public function createAjax(Project $project, TaskRequest $request) {

        $user_to = $project->users()->wherePivot('user_id', '=', $request->user_to_id)->first();

        // проверяем еслить ли в команде пользователь
        // права на создание задачи и назначение ее проверяеются в TaskRequest authorize()
        if( is_null($user_to))
            return json_encode([
                'successful' => false,
                'detail' => ['User not exist in team']
            ]);


        $request->request->add([
            'project_id' => $project->id,
            'user_from_id' => 1, // Auth::user()->id;
        ]);

        $task = Task::create($request->all());

        if( ! is_null($task))
            return json_encode([
                'successful' => true,
                'detail' => ['Task ' . $task->name . ' created!']
            ]);


        return json_encode([
            'successful' => false,
            'detail' => ['Something wrong']
        ]);
    }

    public function updateAjax(Project $project, Task $task, TaskRequest $request) {

        $projectTask = $task->project()->first();

        if(is_null($projectTask))
            return json_encode([
                'successful' => false,
                'detail' => ['Task not exist in team']
            ]);


        if($projectTask->id == $project->id){

            $user_to = $project->users()->wherePivot('user_id', '=', $request->user_to_id)->first();

            if(is_null($user_to))
                return json_encode([
                    'successful' => false,
                    'detail' => ['User not exist in team']
                ]);

            $request->request->add([
                'project_id' => $project->id,
                'user_from_id' => 1, // Auth::user()->id;
            ]);

            $update = $task->update($request->all());

            if($update)
                return json_encode([
                    'successful' => true,
                    'detail' => ['Task ' . $task->name . ' updated!']
                ]);
        }

        return json_encode([
            'successful' => false,
            'detail' => ['Something wrong']
        ]);
    }
    
    public function deleteAjax(Project $project, Task $task) {

        $projectTask = $task->project()->first();

        if(is_null($projectTask))
            return json_encode([
                'successful' => false,
                'detail' => ['Task not exist in team']
            ]);

        if($projectTask->id == $project->id){

            $deleted = $task->delete();

            if($deleted)
                return json_encode([
                    'successful' => true,
                    'detail' => ['Task ' . $task->name . ' deleted!']
                ]);
        }

        return json_encode([
            'successful' => false,
            'detail' => ['Something wrong']
        ]);
    }
    



//    public function index(Guard $auth){
//        return view("workspace.tasks");
//    }
//
//    public function create(TaskRequest $request){
////        return $request->project_id;
////        dd(Auth::user()->privilegesProjects()->where('id', $request->project_id)->get()->isEmpty());
//        return view("ajax.modal.create.task", ["marks" => Task::marks, 'project' => Auth::user()->privilegesProjects()->where('id', $request->project_id)->get()]);
//    }
//
//    public function store(TaskRequest $request, Guard $auth){
//
//        if(!empty($request->mark)) {
//            $mark = implode(',', $request->mark);
//            $request->merge(["mark" => $mark]);
//        }
//
//        $request->merge(["user_from_id" => $auth->user()->id]);
//
//        $task = Task::create($request->all());
//
//        if($task)
//            return json_encode(['successful' => true,
//                'detail' => ['Task "' . $task->name . '" is created']
//            ]);
//    }
//
//    public function show($task){
//        return $task;
//    }
//
//    public function showModal(Task $task){
//        return view("ajax.modal.show.task", ['task' => $task]);
//    }
//
//    public function edit($task){
//        return view("ajax.modal.edit.task", ['task' => $task]);
//    }
//
//    public function users($task){
//        return json_encode($task->users);
//    }
//
//    public function project($task){
//        return json_encode($task->project);
//    }
//
//    public function action(TaskRequest $request, $task){
//
//        if(!isset($request->action))
//            exit;
//
//        switch ($request->action){
//
//            case 'close':
//
//                $task->close();
//
//                break;
//
//            case 'open':
//
//                $task->open();
//
//                break;
//
//        }
//
//    }
//
//    public function update(TaskRequest $request, Task $task){
//        $task->update($request->all());
//
//        return json_encode(['successful' => true,
//            'detail' => ['Task "' . $task->name . '" is updated']
//        ]);
//    }
//
//    public function destroy($task){
//        $task->delete();
//    }
}
