@extends('layouts.admin')
@section('content')
    <div>
        <div
            class="d-md-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3 border-bottom">
            <h1 class="h4">Edit Customer</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="link-color"
                                                       href="{{secure_url('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="link-color"
                                                       href="{{secure_url('customer')}}">Customers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="bg-box px-md-4 px-2 py-4 mx-1">
            <form method="post" action="{{secure_url('customer/'.$customer->id)}}" id="validation_form">
                @csrf
                @method('put')
                <input type="hidden" name="unique_id" value="{{$customer->id}}">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                   value="{{$customer->company_name ?? ''}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                   value="{{$customer->first_name ?? ''}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                   value="{{$customer->last_name ?? ''}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                   value="{{$customer->phone_number ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="address_line1" class="form-label">Address Line 1</label>
                            <input type="text" class="form-control" id="address_line1" name="address_line1"
                                   value="{{$customer->address_line1 ?? ''}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="address_line2" class="form-label">Address Line 2</label>
                            <input type="text" class="form-control" id="address_line2" name="address_line2"
                                   value="{{$customer->address_line2 ?? ''}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city"
                                   value="{{$customer->city ?? ''}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country"
                                   value="{{$customer->country ?? ''}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="postcode" class="form-label">Postcode</label>
                            <input type="text" class="form-control" id="postcode" name="postcode"
                                   value="{{$customer->postcode ?? ''}}">
                        </div>
                    </div>
                    <div class="col-lg-12 text-lg-end">
                        <button class="btn theme-btn mt-4" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateCustomerRequest','#validation_form') !!}
@endsection
