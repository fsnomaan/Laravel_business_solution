@extends('app')
@section('title','| Expense Table')
@section('main_content')
    <div class="container-fluid">
      <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">All Expenses</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">All Expenses</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <a role="button" class="btn btn-primary" style="margin-bottom: 10px;" href="{{route('expense.create')}}">Add Expense</a>

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
                        <h3><i class="fa fa-table"></i> All Expenses</h3>
                        Here is all the expenses in the below table.
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Purpose</th>
                                    <th>Amount</th>
                                    {{--<th>Actions</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($expenses as $expense)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($expense->company_name)}}</td>
                                    <td>{{$expense->name}}</td>
                                    <td>{{$expense->purpose}}</td>
                                    <td>{{$expense->amount}}</td>

                                    {{--<td>--}}

                                        {{--<a class="btn btn-primary" role="button" href="{{route('expense.edit',$expense->id)}}" title="Edit">--}}
                                            {{--<i class="fa fa-edit bigfonts"></i>--}}
                                        {{--</a>--}}

                                        {{--<a class="btn btn-info" role="button" href="{{route('expense.show',$expense->id)}}" title="View">--}}
                                            {{--<i class="fa fa-search bigfonts"></i>--}}
                                        {{--</a>--}}
                                        {{----}}
                                    {{--</td>--}}
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
