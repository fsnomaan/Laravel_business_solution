@extends('app')
@section('title','| Move Product')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Move Product</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Move Product</li>
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
                    <div class="card-header">
                        <h3><i class="fa fa-hand-pointer-o"></i> Move Product</h3>
                        Add the details of this product which want to move.
                    </div>

                    <div class="card-body">

                        <form action="{{route('stock-movement.store')}}" method="post" data-parsley-validate novalidate name="product">

                            <input type="hidden" name="product_id" value="{{$id}}" id="product_id">


                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="weight">Weight <span class="text-danger">*</span></label>
                                    <input id="weight" name="weight" type="number" value="{{old('weight')}}" placeholder="Weight" required class="form-control">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="piece">Piece <span class="text-danger">*</span></label>
                                    <input data-parsley-equalto="#piece" type="number" name="piece" value="{{old('piece')}}" required placeholder="Piece" class="form-control" id="piece">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="coil">Coil <span class="text-danger">*</span></label>
                                    <input data-parsley-equalto="#coil" type="number" name="coil" value="{{old('coil')}}" required placeholder="Coil" class="form-control" id="coil">

                                </div>
                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="location">Location <span class="text-danger">*</span></label>
                                    <input data-parsley-equalto="#location" type="text" name="location" value="{{old('location')}}" required placeholder="Location" class="form-control" id="location">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="remark">Remark <span class="text-danger">*</span></label>
                                    <input data-parsley-equalto="#remark" type="text" name="remark" value="{{old('remark')}}" required placeholder="Remark" class="form-control" id="remark">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="entry_date">Entry Date <span class="text-danger">*</span></label>
                                    <input data-parsley-equalto="#entry_date" type="text" name="entry_date" value="{{old('entry_date')}}" required placeholder="Entry date" class="form-control" id="entry_date">

                                </div>
                            </div>

                            <div class="form-group">
                                <label>Comments</label>
                                <div>
                                    <textarea required name="comment" class="form-control">{{old('comment')}}</textarea>
                                </div>
                            </div>

                            {{csrf_field()}}

                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary" type="submit">
                                    Move Product
                                </button>
                                <button type="reset" class="btn btn-secondary m-l-5">
                                    Cancel
                                </button>
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
        //        document.forms['product'].elements['product_code'].value=document.forms['product'].elements['product_detail_id'].value;
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
    </script>

@endsection
