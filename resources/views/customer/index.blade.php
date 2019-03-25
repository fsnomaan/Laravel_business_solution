@extends('app')
@section('title','| Customer Table')
@section('main_content')
    <div class="container-fluid">
      <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">All Customers Details</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Customer Table</li>
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
<!--                                    <th>Id</th>-->
                                    <th>Compnay Name</th>
                                    <th>Owner Name</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Cash Due</th>
                                    <th>Cheque Due</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                <tr>
<!--                                    <td>{{$customer->id}}</td>-->
                                    <td>{{$customer->company_name}}</td>
                                    <td>{{$customer->owner_name}}</td>
                                    <td>{{$customer->mobile}}</td>
                                    <td>{{$customer->city}}</td>
                                    <td>{{$customer->cash_due}}</td>
                                    <td>{{$customer->cheque_due}}</td>
<!--                                    <td>{{$customer->phone}}</td>-->
                                    <td>

                                        <a class="btn btn-primary" role="button" href="{{route('customer.edit',$customer->id)}}" title="Edit">
                                            <i class="fa fa-edit bigfonts"></i>
                                        </a>

                                        <a class="btn btn-info" role="button" href="{{route('customer.show',$customer->id)}}" title="View">
                                            <i class="fa fa-search bigfonts"></i>
                                        </a>

                                        <a class="btn btn-flickr" role="button" href="{{route('customer-address.show',$customer->id)}}" title="Add Address">
                                            <i class="fa fa-address-book bigfonts"></i>
                                        </a>

                                        <form action="{{route('customer.destroy',$customer->id)}}" method="post"
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
