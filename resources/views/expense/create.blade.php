@extends('app')
@section('title','| Add Expense')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Add Expense</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Add Expense</li>
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

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-check-square-o"></i> Add Expense</h3>
                        Add expense from here
                    </div>

                    <div class="card-body">

                        <form action="{{route('expense.store')}}" method="post" autocomplete="off" action="#">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name (Who)</label>
                                    <input type="text"  name="name"
                                           class="form-control" id="name" placeholder="Enter name" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                {{--<div style="margin-top: 5px;" class="form-group col-md-6">--}}
                                    <label for="inputAddress">Purpose</label>
                                    {{--<select class="form-control select2" id="select2" name="purpose">--}}
                                        {{--<option value="">Select purpose</option>--}}
                                        {{--<option value="test">Test</option>--}}
                                        {{--<option value="test 1">Test 1</option>--}}
                                        {{--<option value="test 2">Test 2</option>--}}
                                    {{--</select>--}}

                                    <input type="text"  name="purpose"
                                           class="form-control" id="inputAddress" placeholder="Enter purpose" autocomplete="off">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="amount">Amount</label>
                                    <input type="number" value="0" min="0" step="0.01" name="amount" class="form-control" id="amount" placeholder="Amount" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date">Date</label>
                                    <input type="text" name="date"
                                           class="form-control" id="date"
                                           placeholder="Enter date">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="expense_comment">Comment about expense</label>
                                <input class="form-control" name="comment" id="expense_comment" placeholder="Enter comment about expense" type="text">
                            </div>

                            @csrf

                            <div class="form-group text-right m-b-0">

                                <button type="reset" class="btn btn-secondary m-l-5">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">Add Expense</button>

                            </div>

                        </form>

                    </div>
                </div><!-- end card-->
            </div>




        </div>

    </div>



@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });


        $(function() {
            $('input[name="date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });
    </script>

@endsection
