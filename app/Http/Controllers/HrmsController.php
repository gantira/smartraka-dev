<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HrmsController extends Controller
{
    function index(){
        return view('hrms.index');
    }
    function users(){
        return view('hrms.users');
    }
    function departments(){
        return view('hrms.departments');
    }
    function employee(){
        return view('hrms.employee');
    }
    function activities(){
        return view('hrms.activities');
    }
    function holidays(){
        return view('hrms.holidays');
    }
    function events(){
        return view('hrms.events');
    }
    function payroll(){
        return view('hrms.payroll');
    }
    function accounts(){
        return view('hrms.accounts');
    }
    function report(){
        return view('hrms.report');
    }
}
