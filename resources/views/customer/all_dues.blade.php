@extends('app')
@section('title','| View All Dues')
@section('main_content')
    <div class="container-fluid">
      <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">View All Dues</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">View All Dues</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <a role="button" class="btn btn-primary" style="margin-bottom: 10px;" href="{{route('customer.create')}}">Add Customer</a>

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
<!--                    <div class="card-header">
                        <h3><i class="fa fa-table"></i> All Customers</h3>
                        Here is all the customer in the below table.
                    </div>-->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                              <th>Id</th>
                                    <th>Compnay Name</th>
                                    <th>Owner Name</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Dues</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                <tr>
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->company_name}}</td>
                                    <td>{{$customer->owner_name}}</td>
                                    <td>{{$customer->mobile}}</td>
                                    <td>{{$customer->city}}</td>
                                    <td>
                                        <span class="btn btn-danger" style="color:white; margin-top: -5px;margin-bottom: -5px;">{{$customer->cash_due}}</span>
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
