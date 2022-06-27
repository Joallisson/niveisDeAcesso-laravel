<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserControlller extends Controller
{
    public function login(){
        return view('welcome');
    }

    public function auth(Request $request){

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'O email é obrigatório',
            'password.required' => 'A senha é obrigatória'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            
            return redirect()->back()->with('success', 'Login realizado com sucesso');

        }else{
            return redirect()->back()->with('danger', 'Email ou senha inválidas');
        }
    }
}
