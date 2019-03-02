<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admi1';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectPath(){
        if(auth()->user()->tipo=='1'){
            return ('vista');
        }
        if(auth()->user()->tipo=='2'){
            return ('vista');
        }
        return ('vista');
    }
    /*public function login(Request $request)
    {
        $reglas=[
            'email' => 'required', 'string', 'email', 'max:255', 'unique:administrador,email',
            'password' => 'required|string|same:password',
        ];

        $mensajes=[
            'name.required' => 'campo ogligatorio',
            'password.required'=>'contraseña incorrecta',
        ];
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        /*$validator=validated::make($request->all(),$reglas,$mensajes);
        if($validator->fails()){
            return view('login')->withErrors($validator);
        }
        return $this->sendFailedLoginResponse($request);
        
    } 
    protected function validateLogin(Request $request,$mensajes)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string|same:password',
        ]);
    }
    protected function sendFailedLoginResponse(Request $request,$mensajes)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed'),trans('auth.password')],
        ]);
        //$this->validator = $validator;
        //$validator=validator::make($request->all(),$reglas,$mensajes);
        //dd($validator);
      
        //$validator=validater($request,$reglas,$mensajes);
        /*if($this->fails()){
            return view('/')->withErrors($this);
        }
    } 
    */
}
