<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginContoller extends Controller
{
    //
    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){

        $dato = $request->validate([
            'usuario'=>'required|string',
            'password'=>'required',
        ]);

        if(Auth::attempt($dato)){
            $request->session()->regenerate();

            return redirect()->route('tarea.index');
        }

        return back()->withErrors([
            'usuario'=>'Contraseña o usuario incorrecto'
        ])->onlyInput('usuario');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');

    }
}
