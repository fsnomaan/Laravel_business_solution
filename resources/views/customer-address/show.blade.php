@extends('app')
@section('title','| Show Customer Details')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Show Customer Details</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Show Customer Details</li>
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
                    <div class="card-header">

                    <div class="card-body">

                        <form action="" method="post" data-parsley-validate novalidate>

                            <div class="form-group">
                                <label for="address">Address<span class="text-danger">*</span></label>
                                <input type="text" name="address" value="{{$address->address}}"  data-parsley-trigger="change" required placeholder="Enter address" class="form-control" id="address">
                            </div>

                            <div class="form-group">
                                <label for="city">City<span class="text-danger">*</span></label>
                                <input type="text" name="city" value="{{$address->city}}"  data-parsley-trigger="change"  placeholder="Enter city" class="form-control" id="city">
                            </div>
                            <div class="form-group">
                                <label for="thana">Thana<span class="text-danger">*</span></label>
                                <input id="thana" name="thana" type="text" value="{{$address->thana}}" placeholder="Enter thana"  class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="district">District <span class="text-danger">*</span></label>
                                <input data-parsley-equalto="#district" type="text" name="district" value="{{$address->district}}"  placeholder="Enter district" class="form-control" id="district">
                            </div>

                            <div class="form-group">
                                <label for="other_name">Others Name </label>
                                <input data-parsley-equalto="#other_name" type="text" name="other_name" value="{{$address->other_name}}"  placeholder="Enter others name" class="form-control" id="other_name">
                            </div>

                            <div class="form-group">
                                <label for="address2">Address 2<span class="text-danger">*</span></label>
                                <input type="text" name="address2" value="{{$address->address2}}"  data-parsley-trigger="change"  placeholder="Enter address 2" class="form-control" id="address2">
                            </div>

                            <div class="form-group">
                                <label>Comments</label>
                                <div>
                                    <textarea required name="comment" class="form-control">{{$address->comment}}</textarea>
                                </div>
                            </div>

                            <div class="form-group text-right m-b-0">
                                <a class="btn btn-secondary m-l-5" role="button" href="{{route('customer-address.index')}}" title="Back">
                                    Back
                                </a>
                            </div>

                        </form>

                    </div>
                </div><!-- end card-->
            </div>




        </div>

    </div>



@endsection
