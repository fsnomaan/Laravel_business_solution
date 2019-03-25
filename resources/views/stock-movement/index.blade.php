@extends('app')
@section('title','| Stock Movements')
@section('main_content')
    <div class="container-fluid">



        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Stock Movements</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Stock Movements</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

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
                    <div class="card-header">
                        <h3><i class="fa fa-table"></i> Stock Movements</h3>
                        Here is the all products movement history</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Id</th>
                                    <th>Weight</th>
                                    <th>Piece</th>
                                    <th>Coil</th>
                                    <th>Location</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movements as $movement)
                                <tr>
                                    <td>{{$movement->id}}</td>
                                    <td>{{$movement->product_id}}</td>
                                    <td>{{$movement->weight}}</td>
                                    <td>{{$movement->piece}}</td>
                                    <td>{{$movement->coil}}</td>
                                    <td>{{$movement->location}}</td>
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
