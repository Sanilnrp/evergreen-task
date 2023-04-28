@extends('layouts.admin')
@section('content')
    <div>
        <div
            class="d-md-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h4">Dashboard</h1>
        </div>
        <div>
            <h4>Hi <span class="theme-color text-capitalize">{{Auth::user()->name}}</span></h4>
            <a href="{{secure_url('customer/create')}}" class="btn theme-btn mb-3 mt-3"><i class="fa fa-plus"></i> Create Customer</a>
        </div>
    </div>
@endsection
