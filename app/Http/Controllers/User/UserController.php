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

    public function updateAjax(Request $request) {
//        if( ! $request->ajax())
//            return response('non found!', 404);

        /**
         * TODO:
         *
         * 1. fix it
         * 2. create request class - UserReqest
         *
         */

        $user = Auth::user();

        $user->update($request->all());
    }

    public function deleteAjax(User $user) {
        $user->delete();
    }

}
