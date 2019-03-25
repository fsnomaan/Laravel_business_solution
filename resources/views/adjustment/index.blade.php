@extends('app')
@section('title','| Adjustments Table')
@section('main_content')
    <div class="container-fluid">



        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Adjustments Table</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Adjustments Table</li>
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
                        <h3><i class="fa fa-table"></i> Adjustments table</h3>
                        All product adjustments are in this below table.
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Code</th>
                                    <th>LC Number</th>
                                    <th>Weight</th>
                                    <th>Piece</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($adjustments as $adjust)
                                <tr>
                                    <td>{{$adjust->id}}</td>
                                    <td>{{$adjust->product_code}}</td>
                                    <td>{{$adjust->lc_code}}</td>
                                    <td>{{$adjust->weight}}</td>
                                    <td>{{$adjust->piece}}</td>
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
