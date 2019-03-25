@extends('app')
@section('title','| Products Report')
@section('main_content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Products Report</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Products Report</li>
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
                        <h3><i class="fa fa-table"></i> Products Report</h3>
                        Here is the single product report</a>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('productsReport')}}">
                        <div class="form-row">

                            <div class="form-group col-md-7">
                                <div class="form-group row">
                                    <label for="selectCustomer" class="col-sm-4 col-form-label">Select Product</label>
                                    <div style="margin-left: -40px; margin-top: 5px;" class="col-sm-8" style="padding-top:5px;">
                                        <select class="selectProduct form-control" id="selectProduct" style="width: 100%;"  name="product_id"></select>

                                    </div>
                                </div>
                            </div>

                            {{--<div class="form-group col-md-5" >--}}
                                {{--<label for="selectProduct">Select product</label>--}}

                                {{----}}

                                {{--<input type="hidden" name="product_code" value="test"--}}
                                       {{--id="product_code">--}}
                            {{--</div>--}}



                            <div class="form-group col-md-2">

                                <button class="btn btn-primary" type="submit">
                                    <span style="font-size: 18px;"> &nbsp;Search &nbsp;</span>
                                </button>
                            </div>
                            <div class="form-group col-md-3">

                            </div>

                            @csrf
                        </div>
                        </form>
                        <div class="table-responsive">

                            @if(isset($sells))
                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <h3>Product Code: <span style="color: green;">{{$product->product_code}}</span></h3>
                                    </div>
                                    <div class="form-group col-md-1">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <h3>Product ID: <span style="color: red;">{{$product->id}}</span></h3>
                                    </div>
                                </div>
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                                    <th>Sell ID</th>
                                    <th>Pieces</th>
                                    <th>Coils</th>
                                    <th>Weight</th>
                                    <th>Unit Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sells as $sell)
                                <tr>
                                    <td>{{$sell->sell_id}}</td>
                                    <td>{{$sell->piece}}</td>
                                    <td>{{$sell->coil}}</td>
                                    <td>{{$sell->weight}}</td>
                                    <td>{{$sell->unit_price}}</td>
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

    $('.selectProduct').select2({
        placeholder: 'Search product',
        ajax: {
            url: '/mostofa_steel/public/get-all-product',
            method: "GET",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        console.log(item);
//                        var i;
//                        if(item.original_id!=0){
//                            i=item.original_id;
//                        }
//                        else{
//                            i=item.id;
//                        }
                        return {
                            text: ""+item.product_code+" (Product Id: "+item.id+", Available: "+item.available_weight+" kg, Loc: "+item.location+", "+item.entry_date+")",
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>



@endsection
