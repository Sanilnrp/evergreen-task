<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{secure_asset('images/favicon.ico')}}">
    <link rel="stylesheet" href="{{secure_asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('plugins/dashboard/dashboard.css')}}">
    <link rel="stylesheet" href="{{secure_asset('css/custom.css')}}">
    @yield('css')
</head>
<body>

<header class="navbar sticky-top bg-white flex-md-nowrap p-0 shadow-sm">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{secure_url('dashboard')}}">
        <img class="img-fluid col-md-8 col-5 m-auto" src="{{secure_asset('images/evergreen_logo.png')}}" alt="Logo">
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed border-0 shadow-none" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link px-4 theme-color" href="#" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="fa fa-sign-out"></i> Log
                    out</a>
            </form>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('dashboard')) active @endif" aria-current="page"
                           href="{{secure_url('dashboard')}}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('customer*')) active @endif"
                           href="{{secure_url('customer')}}">
                            <i class="fa fa-users"></i>
                            Customers
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3 mb-5">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    {{ session()->get('success') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    {{ session()->get('error') }}
                </div>
            @elseif(isset($errors) && count($errors)>0)
                <div class="alert alert-warning alert-dismissible" role="alert">
                    @foreach($errors->all() as $msg)
                        <span>{{$msg}} @if(!$loop->last)
                                <span class="theme-color">|</span
                            @endif </span>
                    @endforeach
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>


<!--Delete confirmation modal-->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content bg-alert">
            <div class="modal-header border-0">
                <h1 class="modal-title fs-5" id="deleteModalLabel">
                    <span><i class="fa fa-warning"></i> Alert</span>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Do you want to continue ?</h5>
            </div>
            <div class="modal-footer border-0">
                <form method="post" id="deleteForm">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn theme-btn">Yes</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script src="{{secure_asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{secure_asset('plugins/jquery/jquery-3.6.4.min.js')}}"></script>
<!--Laravel Js validation for form submission-->
<script src="{{secure_asset('plugins/jsvalidation/js/jsvalidation.js')}}"></script>

<!--Hide the alert message after 3 seconds-->
@if(session()->has('success'))
    <script>
        setTimeout(function () {
            $('.alert').hide();
        }, 3000);
    </script>
@endif

<!--This prevents multiple submission of forms at a time-->

<script>
    $("body").on("submit", "form", function () {
        $(this).submit(function () {
            return false;
        });
        return true;
    });
</script>

<!--On Click the Delete button which will open the Delete modal-->
<script>
    function deleteData(thisObj, url) {
        $('#deleteForm').attr('action', url);
        $('#deleteModal').modal('show');
    }
</script>
@yield('js')
</body>
</html>
