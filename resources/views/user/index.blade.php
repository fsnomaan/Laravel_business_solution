@extends('app')
@section('title','| User Details Table')
@section('main_content')
    <div class="container-fluid">



        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">User Details Table</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">User Details Table</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <a role="button" class="btn btn-primary" style="margin-bottom: 10px;" href="{{route('user.create')}}">Add New User</a>

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
                        <h3><i class="fa fa-table"></i> Customer Table</h3>
                        Here is all the user details in the below table.
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>

                                        <a class="btn btn-primary" role="button" href="{{route('user.edit',$user->id)}}" title="Edit User">
                                            <i class="fa fa-edit bigfonts"></i>
                                        </a>

                                        <a class="btn btn-info" role="button" href="{{route('user.show',$user->id)}}" title="View User">
                                            <i class="fa fa-search bigfonts"></i>
                                        </a>

                                        <a class="btn btn-dark" role="button" href="{{route('resetPassword',$user->id)}}" title="Reset Password">
                                            <i class="fa fa-key bigfonts"></i>
                                        </a>

                                        {{--<form action="{{route('customer.destroy',$user->id)}}" method="post"--}}
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
