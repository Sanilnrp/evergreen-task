@extends('layouts.admin')

@section('content')
    <div>
        <div
            class="d-md-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3 border-bottom">
            <h1 class="h4">View Customer</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="link-color"
                                                       href="{{secure_url('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="link-color"
                                                       href="{{secure_url('customer')}}">Customers</a></li>
                        <li class="breadcrumb-item"><a class="link-color"
                                                       href="{{secure_url('customer/'.$customer->id.'/edit')}}">Edit
                                Customer</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Customer</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="bg-box px-md-4 px-2 py-4 mx-1">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <h5 class="text-capitalize">{{$customer->company_name ?? ''}}</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <h5 class="text-capitalize">{{$customer->first_name ?? ''}}</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <h5 class="text-capitalize">{{$customer->last_name ?? ''}}</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <h5 class="text-capitalize">{{$customer->phone_number ?? ''}}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="address_line1" class="form-label">Address</label>
                        <h5 class="text-capitalize">{{$customer->address_line1}}, {{$customer->address_line2}}, {{$customer->city}}, {{$customer->country}}, <span
                                class="text-uppercase">{{$customer->postcode}}</span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-8 m-auto">
                <div id="place">
                    <iframe width='100%' height='350'
                            src='https://maps.google.com/maps?&amp;q="{{$customer->company_name}} {{$customer->address_line1}} {{$customer->address_line2}} {{$customer->city}} {{$customer->country}} {{$customer->postcode}}"&amp;output=embed'></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
