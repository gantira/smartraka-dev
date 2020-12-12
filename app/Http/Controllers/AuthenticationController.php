<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    function login(){
        return view('authentication.login');
    }
    function register(){
        return view('authentication.register');
    }
    function forgotpassword(){
        return view('authentication.forgotpassword');
    }
    function error404(){
        return view('authentication.error404');
    }
    function error500(){
        return view('authentication.error500');
    }
}