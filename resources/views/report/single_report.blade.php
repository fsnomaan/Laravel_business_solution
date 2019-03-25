@extends('app')
@section('title','| Single Customer Sales Report')
@section('main_content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Single Customer Sales Report</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Single Customer Sales Report</li>
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

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-table"></i> Single Customer Sales Report</h3>
                        Here is the single customer sales report</a>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('singleReport')}}">
                        <div class="form-row">

                            <div class="form-group col-md-5">
                                <div class="form-group row">
                                    <label for="selectCustomer" class="col-sm-4 col-form-label">Select Customer</label>
                                    <div style="margin-left: -40px; margin-top: 5px;" class="col-sm-8" style="padding-top:5px;">
                                        <select class="selectCustomer form-control" id="selectCustomer"  name="customer_id"></select>
                                    </div>
                                </div>
                            </div>



                            <div style="margin-right: -20px;" class="form-group col-md-3">
                                <div class="form-group row">
                                    <label for="start_date" class="col-sm-4 col-form-label">Date</label>
                                    <div style="margin-left: -50px;" class="col-sm-8">
                                        <input data-parsley-equalto="#start_date" type="text" name="start_date"
                                               value="{{old('start_date')}}" required placeholder="Start date"
                                               class="form-control" id="start_date">

                                    </div>
                                </div>

                            </div>
                            <div style="margin-right: -20px;"  class="form-group col-md-3">
                                <div  class="form-group row">
                                    <label for="end_date" class="col-sm-4 col-form-label">Date</label>
                                    <div style="margin-left: -50px;" class="col-sm-8">
                                        <input data-parsley-equalto="#end_date" type="text" name="end_date"
                                               value="{{old('end_date')}}" required placeholder="End date"
                                               class="form-control" id="end_date">

                                    </div>
                                </div>

                            </div>


                            <div class="form-group col-md-1">

                                <button class="btn btn-primary" type="submit">
                                    <span style="font-size: 18px;"> &nbsp;Search &nbsp;</span>
                                </button>
                            </div>

                            @csrf
                        </div>
                        </form>
                        <div class="table-responsive">

                            @if(isset($sells))
                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <h3>Company Name: <span style="color: green;">{{$customer->company_name}}</span></h3>
                                    </div>
                                    <div class="form-group col-md-1">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <h3>Current Dues: <span style="color: red;">{{$customer->cash_due}}</span></h3>
                                    </div>
                                </div>
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Cheque</th>
                                    <th>Cash</th>
                                    <th>Bill amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sells as $sell)
                                <tr>
                                    <td>{{$sell->date}}</td>
                                    <td>{{$sell->description}}</td>
                                    <td>{{$sell->cheque_paid}}</td>
                                    <td>{{$sell->cash_paid}}</td>
                                    <td>{{$sell->grand_total}}</td>
                                </tr>
                                    @endforeach
                                @foreach($cheques as $cheque)
                                <tr>
                                    <td>{{$cheque->received_date}}</td>
                                    <td></td>
                                    <td>{{$cheque->amount}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                    @endforeach

                                @foreach($cashes as $cash)
                                    <tr>
                                        <td>{{$cash->received_date}}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{$cash->amount}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                @endif
                        </div>


                    </div>
                </div><!-- end card-->
            </div>

        </div>



    </div>


@endsection

@section('script')

    <script>
        $(function () {
            $('input[name="start_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });

        $(function () {
            $('input[name="end_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });

        $('.selectCustomer').select2({
            placeholder: 'Search customer',
            ajax: {
                url: '/mostofa_steel/public/get-all-customer',
                method: "GET",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            console.log(item);

                            return {
                                text: "" + item.owner_name + " : " + item.company_name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>

    <script>

        $(document).ready(function() {
            var table;
            if ($.fn.dataTable.isDataTable('#d-table')) {
                table = $('#d-table').DataTable();
//                alert("test");
            }
//        else {
//            table = $('#d-table').DataTable( {
//                paging: false
//            } );
//        }
            table.destroy();

            $('#d-table').DataTable({
                "order": [[0, "asc"]]
            });
        });

    </script>

@endsection
