<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_form(){
        return view("auth.login");
    }
    public function login(LoginRequest $request){

        $newdata = $request->only('email', 'password');
            if(Auth::attempt($newdata)){
                return redirect()->intended("/admin");
            }
    }
    public function logout(){
        Auth::logout();
        return redirect()->to("/login");
    }
}
