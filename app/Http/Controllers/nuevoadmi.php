<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class nuevoadmi extends Controller
{
    

    use RegistersUsers;

  
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:administrador'],
            'tipo' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tipo' => $data['tipo'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    
    public function nuevo(Request $request){
        dd($request->all()); 
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $user->save();

        //return $this->registered($request, $user)
                       // ?: redirect($this->redirectPath());
    }
}
