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
//        $user = $user->name ?? Auth::user();

        if($request->ajax())
            return $user;

        if(Auth::user()->id == $user->id)
            return view('workspace.profile', ['user' => $user]);
//        TODO: шаблон чужого профиля
//        else
//            return view('workspace.profile', ['user' => $user]);
    }

}
