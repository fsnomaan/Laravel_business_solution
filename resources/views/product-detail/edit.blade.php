@extends('app')
@section('title','| Update Product Detail')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Update Product Detail</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Update Product Detail</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        @if(session('message'))
            <div class="alert alert-success" role="alert">
                <h3 style="color: white;">
                    {{session('message')}}
                </h3>
            </div>
        @endif


        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif




        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                <div class="card mb-3">

                    <div class="card-body">

                        <form action="{{route('product-detail.update',$productDetail->id)}}" method="post" data-parsley-validate novalidate>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_code">Product Code <span class="text-danger">*</span></label>
                                    <input type="text" name="product_code" value="{{$productDetail->product_code}}" data-parsley-trigger="change"  placeholder="Enter product code" class="form-control" id="product_code">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="product_name">Product Name </label>
                                    <input type="text" name="product_name" value="{{$productDetail->product_name}}"  data-parsley-trigger="change"  placeholder="Enter product name" class="form-control" id="product_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Description </label>
                                <div>
                                    <textarea required name="description" class="form-control">{{$productDetail->description}}</textarea>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="color">Color </label>
                                    <input data-parsley-equalto="#color" type="text" name="color" value="{{$productDetail->color}}"  placeholder="Enter color" class="form-control" id="color">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="height">Height </label>
                                    <input data-parsley-equalto="#height" type="number" name="height" value="{{$productDetail->height}}"  placeholder="Enter height" class="form-control" id="height">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="style">Style </label>
                                    <input data-parsley-equalto="#style" type="text" name="style" value="{{$productDetail->style}}"  placeholder="Enter style" class="form-control" id="style">

                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="thickness">Thickness </label>
                                    <input data-parsley-equalto="#thickness" type="number" name="thickness" value="{{$productDetail->thickness}}"  placeholder="Enter thickness" class="form-control" id="thickness">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="width">Width </label>
                                    <input data-parsley-equalto="#width" type="number" name="width" value="{{$productDetail->width}}"  placeholder="Enter width" class="form-control" id="width">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="passWord2">Remark </label>
                                    <input data-parsley-equalto="#passWord2" type="text" name="remark" value="{{$productDetail->remark}}"  placeholder="Enter remark" class="form-control" id="passWord2">

                                </div>
                            </div>


                            <div class="form-group">
                                <label>Comments</label>
                                <div>
                                    <textarea required name="comment" class="form-control">{{$productDetail->comment}}</textarea>
                                </div>
                            </div>


                            @csrf

                            @method('PUT')

                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary" type="submit">
                                    Update Product Detail
                                </button>
                                <button type="reset" class="btn btn-secondary m-l-5">
                                    Cancel
                                </button>
                            </div>

                        </form>

                    </div>
                </div><!-- end card-->
            </div>




        </div>

    </div>



@endsection
