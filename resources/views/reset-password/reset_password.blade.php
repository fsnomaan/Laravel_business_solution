@extends('app')
@section('title','| Reset Password')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Reset Password</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Reset Password</li>
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

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-check-square-o"></i> Reset Password</h3>
                        Reset password from here
                    </div>

                    <div class="card-body">

                        <form action="{{route('resetPasswordStore',$id)}}" method="post" autocomplete="off" action="#">

                            <div class="form-row">
                                <label for="password">New Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                            </div>

                            <div class="form-row">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter confirm password">
                            </div>


                            @csrf

                            <div class="form-group text-right m-b-0" style="margin-top: 20px;">

                                <button type="reset" class="btn btn-secondary m-l-5">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">Reset Password</button>

                            </div>

                        </form>

                    </div>
                </div><!-- end card-->
            </div>




        </div>

    </div>



@endsection

@section('script')


@endsection
