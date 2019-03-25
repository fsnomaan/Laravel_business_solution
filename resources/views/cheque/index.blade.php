@extends('app')
@section('title','| View All Cheque')
@section('main_content')
    <div class="container-fluid">



        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">View All Cheque</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">View All Cheque</li>
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
                        <h3><i class="fa fa-table"></i> View All Cheque</h3>
                        Here is all the cheque in this table</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Cheque no</th>
                                    <th>Bank name</th>
                                    <th>Received date</th>
                                    <th>Withdrawal date</th>
                                    <th>Amount</th>
                                    <th>Status/Dues</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cheques as $cheque)
                                <tr>
                                    <td>{{$cheque->company_name}}</td>
                                    <td>{{$cheque->cheque_no}}</td>
                                    <td>{{$cheque->bank_name}}</td>
                                    <td>{{$cheque->received_date}}</td>
                                    <td>{{$cheque->withdrawal_date}}</td>
                                    <td>
                                        @if($cheque->full_paid!=1)
                                        <span class="btn btn-danger" style="color:white; margin-top: -5px;margin-bottom: -5px;">{{$cheque->amount}}</span>
                                        @else
                                        <span class="btn btn-default" style="background-color: #03dc07; color:white; margin-top: -5px;margin-bottom: -5px;">{{$cheque->amount}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($cheque->full_paid!=1)
                                        <span class="btn btn-default" style="background-color: #dc0e00;color:white; margin-top: -5px;margin-bottom: -5px;">{{$cheque->due_amount}}</span>
                                        @else
                                        <span class="btn btn-default" style="background-color: #03dc07; color:white; margin-top: -5px;margin-bottom: -5px;">Full Paid</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($cheque->full_paid!=1)
                                            <a href="{{route('chequePaid',$cheque->id)}}" class="btn btn-primary" style="color:white; margin-top: -5px;margin-bottom: -5px;" title="Make check paid">
                                                <i class="fa fa-check"></i>
                                            </a>
                                       @endif
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
