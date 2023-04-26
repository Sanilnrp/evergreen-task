@extends('layouts.web')
@section('content')
    <div class="row bg-box px-md-4 px-2 py-4 mx-1">
        <div class="col-lg-12 mx-auto">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" required>
                    <span class="invalid-feedback d-block">{{$errors->get('name')[0] ?? ''}}</span>
                </div>

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

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                           required>
                    <span class="invalid-feedback d-block">{{$errors->get('password_confirmation')[0] ?? ''}}</span>
                </div>

                <button class="w-100 btn theme-btn mt-4" type="submit">Register</button>

            </form>

        </div>
    </div>
@endsection
