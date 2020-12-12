@extends('layouts.authentication')
@section('title', 'Forgot Password')


@section('content')
<div class="card">
    <div class="text-center mb-2">
        <a class="header-brand" href="{{route('hrms.index')}}"><i class="fe fe-command brand-logo"></i></a>
    </div>
    <div class="card-body">
        <div class="card-title">Forgot password</div>
        <p class="text-muted">Enter your email address and your password will be reset and emailed to you.</p>
        <div class="form-group">
            <label class="form-label" for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block">Send me new password</button>
        </div>
    </div>
    <div class="text-center text-muted">
        Forget it, <a href="{{route('authentication.login')}}">Send me Back</a> to the Sign in screen.
    </div>
</div>
@stop
