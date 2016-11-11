<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\CodeController;
use Illuminate\Http\Request;

//use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Code;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;

class UserController extends Controller {

    public function get(User $user, UserRequest $request){

        $user = isset($user->name) ? $user : Auth::user();

        if(Auth::user()->id == $user->id)
            return view('workspace.profile', ['user' => $user]);
//        TODO: шаблон чужого профиля
//        else
//            return view('workspace.profile', ['user' => $user]);
    }
    
    public function activateUser(Code $code) {

        $user = User::find($code->user_id);



        if( ! is_null($user)){
            $user->update([ 'activated' => 1]);
//            $user->save();

            $code->delete();

            $login = Auth::loginUsingId($user->id);

//            $attempt = Auth::attempt(['email' => $user->email, 'password' => $user->password]);
//
//            dd($user);

            if($login)
                return redirect()->to('workspace');
        }

        return redirect()->to('auth');
    }
    
    public function createAjax(Request $request) {

        /* TODO:

            1. fix UserRequest
                it not show validation error, just redirect to pira.loc

            2. remove validation from this class

        */

        $validator = $this->validatorRegister($request->all());
        if ($validator->fails()) {
            return json_encode([
                    'successful' => false,
                    'detail' => $validator->errors()->all()
            ]);
        };

        $user = User::create($request->all());


        if( ! is_null($user)) {

            $code = CodeController::generateCode(64, md5($user->id));
            Code::create([
                'user_id' => $user->id,
                'code' => $code,
            ]);

            $url = url(CodeController::$activateUrl . $code);
            $email = $user->email;

            $mailed = Mail::send('emails.registration', array('url' => $url), function ($message) use ($email) {
                $message->to($email)->subject('Registration on pira project');
            });


//            if ($mailed)
                return json_encode([
                    'successful' => true,
                    'detail' => [ 'Registration complete!<br><br>Please confirm your email address' ]
                ]);

        }

        return json_encode([
            'successful' => false,
            'detail' => [ 'Something wrong' ]
        ]);
    }

    public function updateAjax(UserRequest $request) {
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


    protected function validatorRegister(array $data) {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }
}
