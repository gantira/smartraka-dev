@extends('layouts.authentication')
@section('title', 'Login')


@section('content')
    <div class="card">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="text-center mb-2">
                <a class="header-brand" href="{{ route('hrms.index') }}"><i class="fe fe-command brand-logo"></i></a>
            </div>

            <div class="card-body">
                <div class="card-title">Login to your account</div>
                <div class="form-group">
                    <select class="custom-select">
                        <option>HR Dashboard</option>
                        <option>Project Dashboard</option>
                        <option>Job Portal</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label class="form-label">Password<a href="forgot-password.html" class="float-right small">I forgot
                            password</a></label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" />
                        <span class="custom-control-label">Remember me</span>
                    </label>
                </div>
                <div class="form-footer">
                    <a href="{{ route('hrms.index') }}" class="btn btn-primary btn-block" title="">Sign in</a>
                </div>
            </div>
            <div class="text-center text-muted">
                Don't have account yet? <a href="{{ route('authentication.register') }}">Sign up</a>
            </div>
        </form>
    </div>
@stop
