@extends('layouts.web')
@section('content')
    @if (Route::has('login'))
        <div class="row">
            <div class="col-lg-12 mx-auto text-center">
                @auth
                    <a href="{{ secure_url('dashboard') }}" class="btn theme-btn mb-2">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn theme-btn mb-2">Login</a>
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline theme-btn-outline ms-2 mb-2">Register</a>
                    @endif
                @endif
            </div>
        </div>
    @endif
@endsection
