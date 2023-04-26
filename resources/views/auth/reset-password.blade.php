@extends('layouts.web')
@section('content')
    <div class="row bg-box px-md-4 px-2 py-4 mx-1">
        <div class="col-lg-12 mx-auto">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <h1 class="h3 mb-3 fw-normal text-center">Reset Password</h1>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email', $request->email)}}" id="email" required>
                    <span class="invalid-feedback d-block">{{$errors->get('email')[0] ?? ''}}</span>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    <span class="invalid-feedback d-block">{{$errors->get('password')[0] ?? ''}}</span>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    <span class="invalid-feedback d-block">{{$errors->get('password_confirmation')[0] ?? ''}}</span>
                </div>

                <button class="w-100 btn theme-btn mt-4" type="submit">Reset Password</button>
            </form>

        </div>
    </div>
@endsection
