@extends('app')
@section('title','| Add Cheque')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Add Cheque</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Add Cheque</li>
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
                        <h3><i class="fa fa-check-square-o"></i> Add Cheque</h3>
                        Add cheque to the sell where have dues
                    </div>

                    <div class="card-body">

                        <form action="{{route('addCheque')}}" method="post" autocomplete="off" action="#">
                            <div class="form-group">
                                <label for="inputAddress">Sell ID</label>
                                <select class="selectCustomer form-control" id="selectCustomer"  name="customer_id"></select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text"  name="bank_name" class="form-control" id="bank_name" placeholder="Bank name" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cheque_no">Cheque no</label>
                                    <input type="text" name="cheque_no" class="form-control" id="cheque_no" placeholder="Enter cheque no">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="amount">Amount</label>
                                    <input type="number" value="0" min="0" step="0.01" name="amount" class="form-control" id="amount" placeholder="Amount" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="received_date">Received date</label>
                                    <input type="text" name="received_date"
                                           class="form-control" id="received_date"
                                           placeholder="Enter received date">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="withdrawal_date">Received date</label>
                                    <input type="text" name="withdrawal_date"
                                           class="form-control" id="withdrawal_date"
                                           placeholder="Enter withdrawal date">
                                </div>
                            </div>


                            @csrf

                            <div class="form-group text-right m-b-0">

                                <button type="reset" class="btn btn-secondary m-l-5">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">Add Cheque</button>

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

        $('.selectCustomer').select2({
            placeholder: 'Search customer',
            ajax: {
                url: '/mostofa_steel/public/get-sell-list',
                method: "GET",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            console.log(item);

                            return {
                                text: ""+item.company_name+" ( Due: "+item.due+", Date: "+item.date+")",
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $(function() {
            $('input[name="received_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });

        $(function() {
            $('input[name="withdrawal_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });
    </script>

@endsection
