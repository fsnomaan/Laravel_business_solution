@extends('app')
@section('title','| Update Customer Details')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Update Customer Details</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Update Customer Details</li>
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

                        <form action="{{route('customer-address.update',$address->id)}}" method="post" data-parsley-validate novalidate>



                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{$address->address}}"  data-parsley-trigger="change" required placeholder="Enter address" class="form-control" id="address">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="city">City</label>
                                    <input type="text" name="city" value="{{$address->city}}"  data-parsley-trigger="change" required placeholder="Enter city" class="form-control" id="city">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="thana">Thana</label>
                                    <input id="thana" name="thana" type="text" value="{{$address->thana}}" placeholder="Enter thana" required class="form-control">
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="district">District</label>
                                    <input data-parsley-equalto="#district" type="text" name="district" value="{{$address->district}}" required placeholder="Enter district" class="form-control" id="district">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="house_number">House Number</label>
                                    <input data-parsley-equalto="#house_number" type="text" name="house_number" value="{{$address->house_number}}" required placeholder="Enter house number" class="form-control" id="house_number">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="road_name">Road Name</label>
                                    <input type="text" name="road_name" value="{{$address->road_name}}"  data-parsley-trigger="change" required placeholder="Enter road name" class="form-control" id="road_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Comments</label>
                                <div>
                                    <textarea required name="comment" class="form-control">{{$address->comment}}</textarea>
                                </div>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label for="address">Address<span class="text-danger">*</span></label>--}}
                                {{--<input type="text" name="address" value="{{$address->address}}"  data-parsley-trigger="change" placeholder="Enter address" class="form-control" id="address">--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="city">City<span class="text-danger">*</span></label>--}}
                                {{--<input type="text" name="city" value="{{$address->city}}"  data-parsley-trigger="change" placeholder="Enter city" class="form-control" id="city">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="thana">Thana<span class="text-danger">*</span></label>--}}
                                {{--<input id="thana" name="thana" type="text" value="{{$address->thana}}" placeholder="Enter thana" class="form-control">--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="district">District <span class="text-danger">*</span></label>--}}
                                {{--<input data-parsley-equalto="#district" type="text" name="district" value="{{$address->district}}" placeholder="Enter district" class="form-control" id="district">--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="other_name">Others Name </label>--}}
                                {{--<input data-parsley-equalto="#other_name" type="text" name="other_name" value="{{$address->other_name}}" placeholder="Enter others name" class="form-control" id="other_name">--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="address2">Address 2<span class="text-danger">*</span></label>--}}
                                {{--<input type="text" name="address2" value="{{$address->address2}}"  data-parsley-trigger="change" placeholder="Enter address 2" class="form-control" id="address2">--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label>Comments</label>--}}
                                {{--<div>--}}
                                    {{--<textarea  name="comment" class="form-control">{{$address->comment}}</textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            @csrf

                            @method('PUT')

                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary" type="submit">
                                    Update Customer Details
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
