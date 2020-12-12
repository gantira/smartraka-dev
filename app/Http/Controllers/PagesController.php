<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function search(){
        return view('pages.search');
    }
    function calendar(){
        return view('pages.calendar');
    }
    function contact(){
        return view('pages.contact');
    }
    function filemanager(){
        return view('pages.filemanager');
    }
}