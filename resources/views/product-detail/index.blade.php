@extends('app')
@section('title','| Product Details Table')
@section('main_content')
    <div class="container-fluid">



        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Product Details Form</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Product Details Form</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <a role="button" class="btn btn-primary" style="margin-bottom: 10px;" href="{{route('product-detail.create')}}">Add Product Detail</a>

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
                                    <th>Id</th>
                                    <th>product_code</th>
                                    <th>product_name</th>
                                    <th>description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productDetails as $productDetail)
                                <tr>
                                    <td>{{$productDetail->id}}</td>
                                    <td>{{$productDetail->product_code}}</td>
                                    <td>{{$productDetail->product_name}}</td>
                                    <td>{{$productDetail->description}}</td>
                                    <td>

                                        <a class="btn btn-primary" role="button" href="{{route('product-detail.edit',$productDetail->id)}}" title="Edit">
                                            <i class="fa fa-edit bigfonts"></i>
                                        </a>

                                        <a class="btn btn-info" role="button" href="{{route('product-detail.show',$productDetail->id)}}" title="View">
                                            <i class="fa fa-search bigfonts"></i>
                                        </a>

                                        <form action="{{route('product-detail.destroy',$productDetail->id)}}" method="post"
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
