<?php

namespace App\Http\Controllers\Auth;


//use App\Http\Requests\Request;
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

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), [ 'except' => ['getLogout', 'index', 'update', 'show'] ]);
    }

    public function index(Guard $auth){
        return view("workspace.profile", ['user' => $auth->user()]);
    }

    public function show($id){
        return view("workspace.profile", ['user' => User::findOrFail($id)]);
    }

    public function update(Request $request, User $user, $id){

        $user->findOrFail($id)->update([$request->name => $request->value]);
        return json_encode(['successful' => true]);

//        return $user->findOrFail($id)->update([$request->name => $request->value]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorRegister(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorLogin(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorReset(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'image' => asset('img/user_avatars/' .rand(1, 3). '.png'),
        ]);
    }

    /**
     * @return view
     */
    public function getRegister(){
        return view("auth.auth-page");
    }

    /**
     * @param Request $request
     * @return json
     */
    public function postRegister(Request $request){
//        sleep(5);
        $validator = $this->validatorRegister($request->all());
        if ($validator->fails()) {
            return json_encode(
                    ['successful' => false,
                    'detail' => $validator->errors()->all()]
                );
        };

        $user = $this->create($request->all());
        $code = CodeController::generateCode(64, md5($user->id));
        Code::create([
            'user_id' => $user->id,
            'code' => $code,
        ]);

        $url = url('/').'/auth/activate?c='.$code;
        Mail::send('emails.registration', array('url' => $url), function($message) use ($request)
        {
            $message->to($request->email)->subject('Registration');
        });

        return json_encode(['successful' => true,
                            'detail' => array('Registration complete!<br><br>Please confirm your email address')]);
    }

    /**
     * @param Request $request
     * @return successful ? auth : 404
     */
    public function getActivate(Request $request){

        $res = Code::where('code', $request->c)
                ->first();

        if($res){
            $res->delete();

            User::find($res->user_id)
                ->update([
                    'activated' => 1
                ]);


            return redirect()->to('auth');
        }

        return abort(404);
    }

    public function postLogin(Request $request){
        
        $validator = $this->validatorLogin($request->all());
        if ($validator->fails()) {
            return json_encode(['successful' => false,
                                'detail' => $validator->errors()->all()]
            );
        };

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'activated' => 1]))
            return json_encode(['successful' => true, 'redirect' => 'workspace']);

        return json_encode(['successful' => false,
                            'detail' => array('Check the correctness of the entered data')]);
    }

    public function getLogout(){
        Auth::logout();

//        return json_encode(['successful' => 'true', 'redirect' => 'auth']);
        return redirect()->to('auth');
    }

    public function postReset(Request $request){

        $validator = $this->validatorRegister($request->all());
        if ($validator->fails()) {
            return json_encode(['successful' => false,
                                'detail' => $validator->errors()->all()]
            );
        };

        $user = User::where('email', $request->email)->first();

        if($user){

            $code = CodeController::generateCode(64, md5($user->email));

            return json_encode(['successful' => false,
                                'code' => $code]);

        }
        else
            return json_encode(['successful' => false,
                                'detail' => 'User with a email does not exist']);

    }

}
