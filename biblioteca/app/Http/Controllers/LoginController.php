<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    //
    public function showLogin()
    {
        return View('auth.login');
    }

    public function login(Request $request){

        $dato = $request->validate([
            'usuario'=>'required|string',
            'password'=>'required'
        ]);

        if(Auth::attempt($dato)){
            $request->session()->regenerate();

            return redirect()->route('libro.index');
        }

        return back()->withErrors([
            'usuario'=> 'Su usuario o contraseña estan incorrecta'
        ])->onlyInput('usuario');
        
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
