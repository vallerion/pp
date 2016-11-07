<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function get(User $user, Request $request){

        $user = isset($user->name) ? $user : Auth::user();

        if(Auth::user()->id == $user->id)
            return view('workspace.profile', ['user' => $user]);
//        TODO: шаблон чужого профиля
//        else
//            return view('workspace.profile', ['user' => $user]);
    }

    public function updateAjax(User $user, Request $request) {
//        if( ! $request->ajax())
//            return response('non found!', 404);
        
        
    }

}
