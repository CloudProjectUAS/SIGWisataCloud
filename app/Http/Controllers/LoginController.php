<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function postlogin () {

        return view('Login.login');
    }

    public function loginsession (Request $request) {

        if(Auth::attempt(
            $request->only('email', 'password'))){
                return redirect('/Dashboard');
            }
            return redirect('/');
    }

    public function logout () {

        Auth::logout();
        return redirect ('/');
    }

    public function register () {

        return view('Login.register');
    }

    public function postregister (Request $request) {

        User::create([
            'name' => $request->name,
            'level' => 'user', 
            'email' => $request->email, 
            'password' => bcrypt($request->password), 
            'remember_token' => Str::random(60),
        ]);

        return view('Login.login');
    }
}
