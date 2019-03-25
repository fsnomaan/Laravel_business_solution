@extends('app')
@section('title','| Customer Details Tables')
@section('main_content')
    <div class="container-fluid">



        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Customer Details Tables</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Customer Details Tables</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


<!--        <a role="button" class="btn btn-primary" style="margin-bottom: 10px;" href="{{route('customer-address.create')}}">Add Customer Details</a>-->

        @if(session('message'))
            <div class="alert alert-success" role="alert">
                <h3 style="color: black;">
                    {{session('message')}}
                </h3>
            </div>
        @endif



        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card mb-3">
                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
<!--                                    <th>Id</th>-->
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>House/Shop Number</th>
                                    <th>Road Name</th>
                                    <th>City</th>
                                    <th>Thana</th>
                                    <th>District</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($addresses as $address)
                                <tr>
<!--                                    <td>{{$address->id}}</td>-->
                                    <td>{{$address->company_name}}</td>
                                    <td>{{$address->customer_id}}</td>
                                    <td>{{$address->address}}</td>
                                    <td>{{$address->house_number}}</td>
                                    <td>{{$address->road_name}}</td>
                                    <td>{{$address->city}}</td>
                                    <td>{{$address->thana}}</td>
                                    <td>{{$address->district}}</td>
                                    <td>

                                        <a class="btn btn-primary" role="button" href="{{route('customer-address.edit',$address->id)}}" title="Edit">
                                            <i class="fa fa-edit bigfonts"></i>
                                        </a>

                                        <a class="btn btn-info" role="button" href="{{route('customer-address.show',$address->id)}}" title="View">
                                            <i class="fa fa-search bigfonts"></i>
                                        </a>

                                        <form action="{{route('customer-address.destroy',$address->id)}}" method="post"
                                              style="float:left; margin:0px; padding-right:5px;">
                                            <button class="btn btn-danger" type="submit"
                                                    onclick="return confirmDelete()" title="Delete">
                                                <i class="fa fa-window-close bigfonts"></i>
                                            </button>
                                            @csrf

                                            @method('DELETE')
                                        </form>

                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div><!-- end card-->
            </div>

        </div>



    </div>


@endsection
