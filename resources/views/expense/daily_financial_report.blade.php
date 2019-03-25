@extends('app')
@section('title','| Daily Financial Report')
@section('main_content')
    <div class="container-fluid">
      <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Daily Financial Report</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Daily Financial Report</li>
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
                        <h3><i class="fa fa-table"></i> Daily Financial Report</h3>
                        Here is all the daily financial report in the below table.
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('daily_financial_report')}}">
                            <div class="form-row">


                                <div style="margin-right: -20px;"  class="form-group col-md-3">
                                    <div  class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Date</label>
                                        <div style="margin-left: -50px;" class="col-sm-8">
                                            <input data-parsley-equalto="#date" type="text" name="date"
                                                   value="{{old('date')}}" required placeholder="Date"
                                                   class="form-control" id="date">

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
                            @if(isset($financials))
                            <table id="table" class="table table-bordered table-hover display">
                                <thead>
                                <?php $i=1;$total=0;$s_total=0;?>
                                <tr>
                                    <th>No</th>
                                    <th>Cheque Cash</th>
                                    <th>Received Due Cash</th>
                                    <th>Sales Cash</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($financials as $financial)
                                <tr>

                                    <td><?php echo $i;$i++;?></td>
                                    <td>{{$financial->cheque_cash}}</td>
                                    <td>{{$financial->due_cash}}</td>
                                    <td>{{$financial->sales_cash}}</td>
                                    <td><?php $s_total=$financial->cheque_cash+$financial->due_cash+$financial->sales_cash; echo $s_total; $total+=$s_total;?></td>
                                </tr>
                                    @endforeach

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: bold">Expenses</td>
                                    <td style="font-weight: bold">{{$expenses}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: bold">Total</td>
                                    <td style="font-weight: bold">{{$total}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: bold">Cash Available</td>
                                    <td style="font-weight: bold">{{$total-$expenses}}</td>
                                </tr>
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
            $('input[name="date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });


    </script>
@endsection
