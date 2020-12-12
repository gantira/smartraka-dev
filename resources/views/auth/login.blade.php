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
                    <label class="form-label">Username</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" />
                        <span class="custom-control-label">Remember me</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button class="btn btn-primary btn-block" title="">Sign in</button>
                </div>
            </div>
          
        </form>
    </div>
@stop
