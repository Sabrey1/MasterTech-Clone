<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function store(){
        //
    }
    public function login(){
        return view('Auth.Login');
    }
    public function register(){
        return view('Auth.Register');
    }
    public function logout(){
        return view('Auth.Login');
    }
    public function forgotPassword(){
        return view('Auth.ForgotPassword');
    }


}
