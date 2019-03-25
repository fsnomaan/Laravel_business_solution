@extends('app')
@section('title','| Sell Table')
@section('main_content')
    <div class="container-fluid">



        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Sell Table</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Sell Table</li>
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
                        <h3><i class="fa fa-table"></i> Sell table</h3>
                        All sale will appear in this table.
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="d-table" class="table table-bordered table-hover display">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Company Name</th>
                                    <th>Customer Name</th>
                                    <th>Amount</th>
                                    <th>Due</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sells as $sell)
                                <tr>
                                    <td>{{$sell->id}}</td>
                                    <td>{{$sell->company_name}}</td>
                                    <td>{{$sell->owner_name}}</td>
                                    <td>{{$sell->grand_total}}</td>
                                    <td>{{$sell->due}}</td>
                                    <td>{{$sell->date}}</td>

                                    <td>

                                        <a class="btn btn-info" role="button" href="{{route('sell.show',$sell->id)}}"
                                           title="View Invoice">
                                            <i class="fa fa-drivers-license-o bigfonts"></i>
                                        </a>

                                        <a class="btn btn-dropbox" role="button" href="{{route('getInvoice',$sell->id)}}"
                                           title="Download Invoice PDF">
                                            <i class="fa fa-file-pdf-o bigfonts"></i>
                                        </a>

                                        <form action="{{route('sell.destroy',$sell->id)}}" method="post"
                                              style="float:left; margin:0px; padding-right:5px;">
                                            <button class="btn btn-danger" type="submit"
                                                    onclick="return confirmDelete()" title="Delete">
                                                <i class="fa fa-window-close bigfonts"></i>
                                            </button>
                                            @csrf

                                            @method('DELETE')
                                        </form>

                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div><!-- end card-->
            </div>

        </div>



    </div>


@endsection
