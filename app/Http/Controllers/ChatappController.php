<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatappController extends Controller
{
    function chat(){
        return view('chatapp.chat');
    }
}
