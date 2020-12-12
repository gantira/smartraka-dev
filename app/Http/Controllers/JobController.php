<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    function index3(){
        return view('job.index3');
    }
    function positions(){
        return view('job.positions');
    }
    function applicants(){
        return view('job.applicants');
    }
    function resumes(){
        return view('job.resumes');
    }
    function jobsettings(){
        return view('job.jobsettings');
    }
}
