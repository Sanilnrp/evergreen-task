@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{secure_asset('plugins/datatables/datatables.min.css')}}"/>
@endsection
@section('content')
    <div>
        <div
            class="d-md-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3 border-bottom">
            <h1 class="h4">Customers</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="link-color"
                                                       href="{{secure_url('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customers</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{secure_url('customer/create')}}" class="btn theme-btn mb-3"><i class="fa fa-plus"></i>
                        Create</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered w-100" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col" style="width: 25%;">Address</th>
                                <th scope="col" class="noSort" style="width: 20%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="text-capitalize"><a class="link-color"
                                                                   href="{{secure_url('customer/'.$customer->id)}}">{{$customer->company_name}}</a>
                                    </td>
                                    <td class="text-capitalize">{{$customer->first_name}}</td>
                                    <td class="text-capitalize">{{$customer->last_name}}</td>
                                    <td>{{$customer->phone_number}}</td>
                                    <td class="text-capitalize">{{$customer->address_line1}}
                                        , {{$customer->address_line2}}, {{$customer->city}}
                                        , {{$customer->country}},<span
                                            class="text-uppercase"> {{$customer->postcode}}</span></td>
                                    <td>
                                        <a href="{{secure_url('customer/'.$customer->id.'/edit')}}"
                                           class="btn btn-sm btn-success mb-1">Edit</a>
                                        <a href="{{secure_url('customer/'.$customer->id)}}"
                                           class="btn btn-sm btn-secondary mb-1">View</a>
                                        <a onclick="deleteData(this,'{{secure_url('customer/'.$customer->id)}}')"
                                           class="btn btn-sm btn-danger mb-1">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{secure_asset('plugins/datatables/datatables.min.js')}}"></script>

    <script>
        $('#myTable').DataTable({
            responsive: true,
            columnDefs: [
                {targets: "noSort", orderable: false},
            ]
        });
    </script>
@endsection
