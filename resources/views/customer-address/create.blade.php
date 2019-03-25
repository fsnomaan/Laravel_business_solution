@extends('app')
@section('title','| Add Customer  Details')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Add Customer Details</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Add Customer Details</li>
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

                        <form action="{{route('customer-address.store')}}" method="post" data-parsley-validate novalidate>

                            <input type="hidden" name="customer_id" value="{{$id}}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{old('address')}}"  data-parsley-trigger="change"  placeholder="Enter address" class="form-control" id="address">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="city">City</label>
                                    <input type="text" name="city" value="{{old('city')}}"  data-parsley-trigger="change"  placeholder="Enter city" class="form-control" id="city">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="thana">Thana</label>
                                    <input id="thana" name="thana" type="text" value="{{old('thana')}}" placeholder="Enter thana"  class="form-control">
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="district">District</label>
                                    <input data-parsley-equalto="#district" type="text" name="district" value="{{old('district')}}"  placeholder="Enter district" class="form-control" id="district">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="house_number">House Number</label>
                                    <input data-parsley-equalto="#house_number" type="text" name="house_number" value="{{old('house_number')}}"  placeholder="Enter house number" class="form-control" id="house_number">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="road_name">Road Name</label>
                                    <input type="text" name="road_name" value="{{old('road_name')}}"  data-parsley-trigger="change"  placeholder="Enter road name" class="form-control" id="road_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Comments</label>
                                <div>
                                    <textarea required name="comment" class="form-control">{{old('comment')}}</textarea>
                                </div>
                            </div>

                            {{csrf_field()}}

                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary" type="submit">
                                    Add Customer Details
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
