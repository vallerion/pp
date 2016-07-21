<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;

class TaskController extends Controller
{
    public function create(array $data){

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
            'user_to_id' => 'required|integer',
            'team_id' => 'integer'
        ]);
    }
}
