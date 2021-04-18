<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
