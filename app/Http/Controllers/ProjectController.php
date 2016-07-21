<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;

class ProjectController extends Controller
{
    public function create(array $data){

        $validator = $this->validatorCreate($data);
        if ($validator->fails()) {
            return json_encode(['successful' => false,
                    'detail' => $validator->errors()->all()]
            );
        };

        $project = Auth::user()->projects()->create($data);

        if($project)
            return json_encode(['successful' => true,
                'detail' => ['Team "' . $project->name . '" is created']
            ]);
    }

    private function validatorCreate(array $data){
        return Validator::make($data, [
            'name' => 'required|max:255',
            'about' => 'max:1024'
        ]);
    }
}
