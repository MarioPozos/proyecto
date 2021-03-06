<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/vista1';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:administrador'],
            'tipo' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tipo' => $data['tipo'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function registered(Request $request, $user)
    {
        //
    }
    public function redirectPath(){
        if(auth()->user()->tipo=='1'){
            return view('admi.admi1');
        }
        if(auth()->user()->tipo=='2'){
            return view('admi.admi2');;
        }
        return  view('admi.admi3');;
    }
    public function register(Request $request){
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        
        //dd($user->all());
        ///$this->guard()->login($user);
        return redirect('vista');
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
   
        
    }
    //redirigir la vistas 
   
    public function redirigir(){
        if(auth()->user()->tipo=='1'){
            return view('auth.register');
        }
        return redirect('vista');
    }
    
    protected function crear()
    {
        return view('registro.nuevoalumno');
    }

   
}
