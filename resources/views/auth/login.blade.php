@extends('layouts.web')
@section('content')
    <div class="row bg-box px-md-4 px-2 py-4 mx-1">
        <div class="col-lg-12 mx-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

                <span class="theme-color">{{session('status')}}</span>


                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" required>
                    <span class="invalid-feedback d-block">{{$errors->get('email')[0] ?? ''}}</span>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    <span class="invalid-feedback d-block">{{$errors->get('password')[0] ?? ''}}</span>
                </div>

                <div class="mb-3 d-md-flex justify-content-between">
                    <div class="checkbox">
                        <label for="remember_me">
                            <input id="remember_me" name="remember" type="checkbox" class="checkbox-color"> Remember me
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="link-color mt-3 mt-md-0" href="{{ route('password.request') }}">Forgot your
                            password?</a>
                    @endif

                </div>

                <button class="w-100 btn theme-btn mt-4" type="submit">Log in</button>
            </form>

        </div>
    </div>
@endsection
