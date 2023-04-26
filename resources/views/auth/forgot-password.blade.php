@extends('layouts.web')
@section('content')
    <div class="row bg-box px-md-4 px-2 py-4 mx-1">
        <div class="col-lg-12 mx-auto">

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-center">Reset Password</h1>

                <span class="theme-color">{{session('status')}}</span>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" required>
                    <span class="invalid-feedback d-block">{{$errors->get('email')[0] ?? ''}}</span>
                </div>


                <button class="w-100 btn theme-btn mt-4" type="submit">Email Password Reset Link</button>
            </form>

        </div>
    </div>
@endsection
