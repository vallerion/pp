<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;

class TeamController extends Controller
{
    public function create(array $data){

        $validator = $this->validatorCreate($data);
        if ($validator->fails()) {
            return json_encode(
                ['successful' => false,
                    'detail' => $validator->errors()->all()]
            );
        };
        
        $team = Auth::user()->teams()->create($data);

        if($team)
            return json_encode(['successful' => true]);
    }

    private function validatorCreate(array $data){
        return Validator::make($data, [
            'name' => 'required|max:255',
            'about' => 'max:1024'
        ]);
    }
}
