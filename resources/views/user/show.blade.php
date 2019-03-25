@extends('app')
@section('title','| Show User')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Show User</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Show User</li>
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
                        <h3><i class="fa fa-hand-pointer-o"></i> Show User</h3>
                        View existing user info.
                    </div>

                    <div class="card-body">

                        <form action="" method="post" data-parsley-validate novalidate>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="company_name">Full Name</label>
                                    <input type="text" name="company_name" value="{{$user->name}}" data-parsley-trigger="change" required placeholder="Enter company name" class="form-control" id="company_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="company_name_bn">Email</label>
                                    <input type="text"  name="company_name_bn" value="{{$user->email}}" data-parsley-trigger="change" required placeholder="Enter company name bn" class="form-control" id="company_name_bn">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input data-parsley-equalto="#phone" type="text" name="phone" value="{{$user->phone}}" required placeholder="Enter phone" class="form-control" id="phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dob">Date of birth</label>
                                    <input data-parsley-equalto="#dob" type="text" name="dob" value="{{Carbon\Carbon::parse($user->dob)->toFormattedDateString()}}" required placeholder="Date of birth" class="form-control" id="dob">
                                </div>
                            </div>


                            <div class="form-group text-right m-b-0">
                                <a class="btn btn-secondary m-l-5" role="button" href="{{route('user.index')}}" title="Back">
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
