@extends('app')
@section('title','| Home')
@section('main_content')
    <div class="container-fluid">

        <?php
        $mytime = Carbon\Carbon::now();
        $mytime = $mytime->format('g:i A');
        //        echo $mytime->toDateTimeString();
        ?>

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Dashboard</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-line-chart"></i> Latest Sales Bill</h3>
                        Here is the latest sales bill.
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
                            <thead>
                            <tr>
                                <th>Bill No.</th>
                                <th>&nbsp; Customer &nbsp;</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latestSell as $sell)
                                <tr>
                                    <td>{{$sell->id}}</td>
                                    <td>{{$sell->owner_name}}</td>
                                    <td>{{$sell->description}}</td>
                                    <td>{{$sell->grand_total}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    <div class="card-footer small text-muted">Updated at {{$mytime}}</div>
                </div><!-- end card-->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fa fa-bar-chart-o"></i> Best Sellers </h3>
                        Here is top three best sellers.
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
                            <thead>
                            <tr>
                                <th>Product name</th>
                                <th>&nbsp; Code &nbsp;</th>
                                <th>Quantity Sold</th>
                                <th>Availability</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topSellers as $sell)
                                <tr>
                                    <td>{{$sell->product_name}}</td>
                                    <td>{{$sell->product_code}}</td>
                                    <td>{{($sell->weight-$sell->available_weight)}}</td>
                                    <td>{{$sell->available_weight}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer small text-muted">Updated at {{$mytime}}</div>
                </div><!-- end card-->
            </div>

        </div>

        {{--<div class="row">--}}

            {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">--}}
                {{--<div class="card mb-3">--}}
                    {{--<div class="card-header">--}}
                        {{--<h3><i class="fa fa-line-chart"></i> Items Sold Amount</h3>--}}
                        {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus--}}
                        {{--fermentum ultricies orci sit amet sollicitudin.--}}
                    {{--</div>--}}

                    {{--<div class="card-body">--}}
                        {{--<canvas id="lineChart"></canvas>--}}
                    {{--</div>--}}
                    {{--<div class="card-footer small text-muted">Updated at {{$mytime}}</div>--}}
                {{--</div><!-- end card-->--}}
            {{--</div>--}}

            {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">--}}
                {{--<div class="card mb-3">--}}
                    {{--<div class="card-header">--}}
                        {{--<h3><i class="fa fa-bar-chart-o"></i> Colour Analytics</h3>--}}
                        {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus--}}
                        {{--fermentum ultricies orci sit amet sollicitudin.--}}
                    {{--</div>--}}

                    {{--<div class="card-body">--}}
                        {{--<canvas id="pieChart"></canvas>--}}
                    {{--</div>--}}
                    {{--<div class="card-footer small text-muted">Updated at {{$mytime}}</div>--}}
                {{--</div><!-- end card-->--}}
            {{--</div>--}}

        {{--</div>--}}
        <!-- end row -->


    </div>



@endsection

@section('script')


@endsection
