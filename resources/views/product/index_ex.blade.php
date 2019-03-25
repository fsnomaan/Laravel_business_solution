@extends('app')
@section('title','| Update Products Table')
@section('main_content')
    <div class="container-fluid">



        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Update Products </h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Update Products </li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <a role="button" class="btn btn-primary" style="margin-bottom: 10px;" href="{{route('product.create')}}">Add Product</a>

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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Item Code</th>
                                    <th>LC Number</th>
                                    <th>Weight</th>
                                    <th>Piece</th>
                                    <th>Coil</th>
                                    <th>Location</th>
                                    <th>Product Availability</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($products as $product)
                                <tr>
                                    <!--<td><?php echo $i; $i++;?></td>-->
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->product_code}}</td>
                                    <td>{{$product->lc_code}}</td>
                                    <td>{{$product->weight}}</td>
                                    <td>{{$product->piece}}</td>
                                    <td>{{$product->coil}}</td>
                                    <td>{{$product->location}}</td>
                                    <td>Available weight: {{$product->available_weight}}, Available pieces: {{$product->available_piece}}, Available coil: {{$product->available_coil}}</td>
                                    <td>

                                        <a class="btn btn-primary" role="button" href="{{route('product.edit',$product->id)}}" title="Edit">
                                            <i class="fa fa-edit bigfonts"></i>
                                        </a>

                                        <a class="btn btn-info" role="button" href="{{route('product.show',$product->id)}}" title="View">
                                            <i class="fa fa-search bigfonts"></i>
                                        </a>

                                        <a class="btn btn-info" role="button" href="{{route('stock-movement.show',$product->id)}}" title="Move Product">
                                            <i class="fa fa-crop bigfonts"></i>
                                        </a>

                                        <a class="btn btn-primary" style="background: #ff950e;" role="button" href="{{route('add-adjustment',$product->id)}}" title="Adjustment">
                                            <i class="fa fa-adjust bigfonts"></i>
                                        </a>

                                        {{--<form action="{{route('product.destroy',$product->id)}}" method="post"--}}
                                              {{--style="float:left; margin:0px; padding-right:5px;">--}}
                                            {{--<button class="btn btn-danger" type="submit"--}}
                                                    {{--onclick="return confirmDelete()" title="Delete">--}}
                                                {{--<i class="fa fa-window-close bigfonts"></i>--}}
                                            {{--</button>--}}
                                            {{--@csrf--}}

                                            {{--@method('DELETE')--}}
                                        {{--</form>--}}

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
