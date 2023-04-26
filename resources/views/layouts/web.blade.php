<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{secure_asset('images/favicon.ico')}}">
    <link rel="stylesheet" href="{{secure_asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('css/custom.css')}}">
    @yield('css')
</head>
<body>
<main>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center min-vh-100">
            <div class="col-md-8 col-lg-4">
            <a class="d-block text-center mb-5" href="{{secure_url('/')}}">
                <img class="img-fluid w-50 m-auto" src="{{secure_asset('images/evergreen_logo.png')}}" alt="Logo">
            </a>
            @yield('content')
            </div>
        </div>
    </div>
</main>
<script src="{{secure_asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@yield('js')
</body>
</html>
