@extends('app')
@section('title','| Show Product')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Show Product</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Show Product</li>
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

            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                <div class="card mb-3">

                    <div class="card-body">

                        <form action="" method="post" data-parsley-validate novalidate name="product">

                            <input type="hidden" name="product_code" value="{{old('product_code')}}" id="product_code">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="select2">Product Code </label>
                                    <select class="form-control select2" id="select2" name="product_detail_id">
                                        @foreach($productDetails as $p)
                                            <option value=""></option>
                                            <option value="{{$p->id}}">{{$p->product_code}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="lc_code">LC Code <span class="text-danger">*</span></label>
                                    <input data-parsley-equalto="#lc_code" type="text" name="lc_code"
                                           value="{{$product->lc_code}}" required placeholder="LC Code"
                                           class="form-control" id="lc_code">

                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="weight">Weight <span class="text-danger">*</span></label>
                                    <input id="weight" name="weight" type="number" value="{{$product->weight}}" placeholder="Weight" required class="form-control">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="piece">Piece</label>
                                    <input data-parsley-equalto="#piece" type="number" name="piece" value="{{$product->piece}}"  placeholder="Piece" class="form-control" id="piece">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="coil">Coil</label>
                                    <input data-parsley-equalto="#coil" type="number" name="coil" value="{{$product->coil}}"  placeholder="Coil" class="form-control" id="coil">

                                </div>
                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="location">Location <span class="text-danger">*</span></label>
                                    <input data-parsley-equalto="#location" type="text" name="location" value="{{$product->location}}" required placeholder="Location" class="form-control" id="location">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="remark">Remark </label>
                                    <input data-parsley-equalto="#remark" type="text" name="remark" value="{{$product->remark}}"  placeholder="Remark" class="form-control" id="remark">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="entry_date">Entry Date <span class="text-danger">*</span></label>
                                    <input data-parsley-equalto="#entry_date" type="text" name="entry_date" value="{{Carbon\Carbon::parse($product->entry_date)->format('m/d/Y')}}" required placeholder="Entry date" class="form-control" id="entry_date">

                                </div>
                            </div>


                            <div class="form-group">
                                <label>Comments</label>
                                <div>
                                    <textarea  name="comment" class="form-control">{{$product->comment}}</textarea>
                                </div>
                            </div>

                            <div class="form-group text-right m-b-0">
                                <a class="btn btn-secondary m-l-5" role="button" href="{{route('product.index')}}" title="Back">
                                    Back
                                </a>
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

        $('#select2').on('change', function () {
            var product = $('#select2').find(":selected").text();
            document.forms['product'].elements['product_code'].value=product;
        });

        $(function() {
            $('input[name="entry_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });

        document.forms['product'].elements['product_detail_id'].value="{{$product->product_detail_id}}";
    </script>

@endsection
