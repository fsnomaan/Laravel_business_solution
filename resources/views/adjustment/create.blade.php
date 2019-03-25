@extends('app')
@section('title','| Product Adjustment')
@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Product Adjustment</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Product Adjustment</li>
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

                        <form action="{{route('adjustment.store')}}" method="post" data-parsley-validate novalidate name="adjustment">

                            <input type="hidden" name="product_id" value="{{$id}}">



                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="weight">Weight <span class="text-danger">*</span></label>
                                    <input id="weight" name="weight" type="number" value="{{old('weight')}}" required placeholder="Weight" required class="form-control">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="piece">Piece </label>
                                    <input data-parsley-equalto="#piece" type="number" name="piece" value="{{old('piece')}}" placeholder="Piece" class="form-control" id="piece">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="date">Date </label>
                                    <input data-parsley-equalto="#date" type="text" name="date" value="{{old('date')}}" placeholder="Enter date" class="form-control" id="date">

                                </div>
                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="comment">Comment</label>
                                    <input data-parsley-equalto="#comment" type="text" name="comment" value="{{old('comment')}}" required placeholder="Comment" class="form-control" id="comment">

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="description">Description </label>
                                    <input data-parsley-equalto="#description" type="text" name="description" value="{{old('description')}}" placeholder="Description" class="form-control" id="description">

                                </div>

                            </div>

                            {{csrf_field()}}

                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary" type="submit">
                                    Adjust
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

        $(function() {
            $('input[name="date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });
    </script>

@endsection
