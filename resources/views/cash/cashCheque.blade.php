@extends('app')
@section('title','| Add Cash Against Cheque')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Add Cash Against Cheque</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Add Cash Against Cheque</li>
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
                        <h3><i class="fa fa-check-square-o"></i> Add Cash Against Cheque</h3>
                        Add cash against cheque to the sell form here
                    </div>

                    <div class="card-body">

                        <form action="{{route('cashAgainstCheque')}}" method="post" autocomplete="off" action="#">

                            <div class="form-row">
                                <div style="margin-top: 5px;" class="form-group col-md-8">
                                    <label for="inputAddress">Select Cheque</label>
                                    <select  class="selectCustomer form-control" id="selectCustomer"
                                            name="cheque_id"></select>
                                </div>
                                <div style="padding-left:15px;" class="form-group col-md-4">
                                    <label for="cheque_due">Cheque Dues</label>
                                    <input type="text" value="0" name="cheque_due" disabled=""
                                           class="form-control" id="cheque_due" placeholder="Cheque dues" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="amount">Amount</label>
                                    <input type="number"  value="0" min="0" step="0.01" name="amount"
                                           class="form-control" id="amount" placeholder="Amount" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="received_date">Received date</label>
                                    <input type="text" name="received_date"
                                           class="form-control" id="received_date"
                                           placeholder="Enter received_date">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cash_receive_comment">Cash receive comment</label>
                                <input class="form-control" name="cash_receive_comment" id="cash_receive_comment" placeholder="Enter cash receive comment" type="text">
                            </div>

                            @csrf

                            <div class="form-group text-right m-b-0">

                                <button type="reset" class="btn btn-secondary m-l-5">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">Add Cash Against Cheque</button>

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
        var a=[];

        $('.selectCustomer').select2({
            placeholder: 'Search cheque',
            ajax: {
                url: '/mostofa_steel/public/cheque-list',
                method: "GET",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            console.log(item);
                            a[item.id]=item.amount;

                            var amount=0;
                            if(item.due_amount<1){
                                amount=item.amount;
                            }else {
                                amount=item.due_amount;
                            }
                            return {
                                text: ""+item.company_name+" ( Amount: "+amount+")",
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });


        $('#selectCustomer').on('change', function () {
            var cid = $('#selectCustomer').val();
            console.log(a[cid]);
            document.getElementById("cheque_due").value=a[cid];
            document.getElementById("amount").value=a[cid];
        });

        $(function() {
            $('input[name="received_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });
    </script>

@endsection
