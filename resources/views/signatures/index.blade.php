@extends('layouts.app')

@section('title', 'Signature')

@section('content')
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Signature</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    @if (session()->has('message'))
                        {{ session('message') }}
                    @endif
                    <livewire:signature.create>
                    <livewire:signature.index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
