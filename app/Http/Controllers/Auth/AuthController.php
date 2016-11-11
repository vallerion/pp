<?php

namespace App\Http\Controllers\Auth;


//use App\Http\Requests\Request;
use App\Http\Controllers\Validators\AuthValidator;
use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CodeController;
use App\Code;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Mail;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     *
     * Default login|registration page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get() {
        return view('auth.index');
    }

    /**
     *
     * Login user
     *
     * @param Request $request
     * @return string
     */
    public function loginAjax(Request $request) {

        $valid = AuthValidator::login($request->all());

        // if invalid input data
        if($valid->fails())
            return json_encode([
                    'successful' => false,
                    'detail' => $valid->errors()->all()
            ]);


        $attempt = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'activated' => 1]);

        // if user exist and successfully authenticated
        if ($attempt)
            return json_encode([
                'successful' => true,
                'redirect' => 'workspace'
            ]);

        return json_encode([
            'successful' => false,
            'detail' => ['Check the correctness of the entered data']
        ]);
    }

    /**
     *
     * Logout user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {

        Auth::logout();

        return redirect()->to('auth');
    }

}
