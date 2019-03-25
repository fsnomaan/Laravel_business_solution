@extends('app')
@section('title','| Sell Product')

@section('style')
<style>
    .daterangepicker{
        z-index: 1100 !important;
    }
</style>
@endsection

@section('main_content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Sell Product</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Sell Product</li>
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
                        <h3><i class="fa fa-table"></i> Sell Product</h3>
                        It's product selling from.
                    </div>


                    <div class="card-body">


                        <!-- Modal -->
                        <div class="modal fade custom-modal" id="customModal"  role="dialog"
                             aria-labelledby="customModal" aria-hidden="true">
                            <div class="modal-dialog" style="max-width:600px;" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Add Item</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                    <h3><i class="fa fa-check-square-o"></i> Enter Item Details</h3>
                                                </div>

                                                <div class="card-body">

                                                    <form autocomplete="off" action="#" id="moadal-form" name="moadal-form">

                                                        <div class="form-group">
                                                            <label for="selectProduct">Select product</label>

                                                            <select class="selectProduct form-control" id="selectProduct" style="width: 100%;"  name="product_id"></select>


                                                            <input type="hidden" name="product_code" value="test"
                                                                   id="product_code">
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="piece">Pieces</label>
                                                                <input type="text" name="piece" class="form-control"
                                                                       id="piece" value="0" placeholder="Enter piece"
                                                                       autocomplete="off">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="coil">Coils</label>
                                                                <input type="text" value="0" name="coil" class="form-control"
                                                                       id="coil" placeholder="Enter coil"
                                                                       autocomplete="off">
                                                            </div>

                                                        </div>


                                                        <div class="form-row">

                                                            <div class="form-group col-md-6">
                                                                <label for="weight">Weight</label>
                                                                <input type="text" name="weight" class="form-control"
                                                                       id="weight" placeholder="Enter weight">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="unit_price">Unit price</label>
                                                                <input type="text" name="unit_price"
                                                                       class="form-control" id="unit_price"
                                                                       placeholder="Enter unit price">
                                                            </div>


                                                        </div>

                                                        <div class="form-group">
                                                            <label for="description">Description </label>
                                                            <input type="text" name="description" class="form-control"
                                                                   id="description" placeholder="Enter description">
                                                        </div>

                                                    </form>

                                                </div>
                                            </div><!-- end card-->
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" id="add_product_button" onclick="AddData()"
                                                class="btn btn-primary">Add Item
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <form action="{{route('sell.store')}}" method="post" data-parsley-validate novalidate name="sellForm">

                            <div class="form-row">


                                <div class="form-group col-md-5">
                                    <div class="form-group row">
                                        <label for="selectCustomer" class="col-sm-4 col-form-label">Select Customer</label>
                                        <div class="col-sm-8" style="padding-top:5px;">
                                            <select class="selectCustomer form-control" id="selectCustomer"  name="customer_id"></select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <div class="form-group row">
                                        <label for="previous-due" class="col-sm-6 col-form-label">Previous Due</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" readonly="" id="previous-due"
                                                   placeholder="N/A" autocomplete="off">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group col-md-3">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Date</label>
                                        <div class="col-sm-8">
                                            <input data-parsley-equalto="#date" type="text" name="date"
                                                   value="{{old('date')}}" required placeholder="Date"
                                                   class="form-control" id="date">

                                        </div>
                                    </div>

                                </div>


                                <div class="form-group col-md-1">

                                    <a href="#custom-modal" style="margin-bottom: 15px; " title="Add item"
                                       class="btn btn-primary m-r-5 m-b-10" data-target="#customModal"
                                       data-toggle="modal">
                                        <i class="fa fa-plus-square bigfonts" style="font-size: 25px;"
                                           aria-hidden="true"></i>
                                    </a>
                                </div>

                                <div class="form-group col-md-5" style="margin-bottom: -8px; margin-top: -8px;">
                                    <div class="form-group row">
                                        <label for="new" class="col-sm-4 col-form-label">If new customer</label>
                                        <div class="col-sm-8">
                                            <input  type="text" name="new_customer"
                                                    placeholder="Enter new customer name"
                                                   class="form-control" id="new">

                                        </div>
                                    </div>

                                </div>

                            </div>

                                <hr>
                            <table class="table table-responsive-xl table-hover table-bordered" id="list">
                                <thead>
                                <tr>
                                    <th scope="col">Product Id</th>
                                    <th scope="col">Product Code</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Pieces</th>
                                    <th scope="col">Coils</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>


                            <div class="form-row">


                                <div class="form-group col-md-8">
                                    <div class="form-group row">
                                        <label for="sell_description"
                                               class="col-sm-3 col-form-label">Sell description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="sell_description" id="sell_description"
                                                   placeholder="Enter sell description" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>


                                {{--Cheque model start here--}}
                                <div class="modal fade custom-modal " id="chequeModal" tabindex="-1"  role="dialog"
                                     aria-labelledby="chequeModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Add Cheque </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card mb-3">
                                                        <div class="card-header">
                                                            <h3><i class="fa fa-check-square-o"></i> Enter Cheque Details</h3>
                                                        </div>

                                                        <div class="card-body">



                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="amount">Amount</label>
                                                                    <input type="number" min="0" step="0.01" name="amount" class="form-control"
                                                                           id="amount" placeholder="Amount"
                                                                           autocomplete="off">
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="received_date">Received date</label>
                                                                    <input type="text" name="received_date"
                                                                           class="form-control" id="received_date"
                                                                           placeholder="Enter received_date">
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label for="withdrawal_date">Withdrawal date</label>
                                                                    <input type="text" name="withdrawal_date"  class="form-control"
                                                                           id="withdrawal_date" placeholder="Enter withdrawal_date">
                                                                </div>
                                                            </div>

                                                                <div class="form-group">
                                                                    <label for="bank_name">Bank name</label>
                                                                    <input type="text" name="bank_name" class="form-control"
                                                                           id="bank_name" placeholder="Enter bank name">
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="cheque_no">Cheque no </label>
                                                                    <input type="number" name="cheque_no" class="form-control"
                                                                           id="cheque_no" placeholder="Enter cheque no">
                                                                </div>





                                                                <div class="form-row">

                                                                </div>




                                                        </div>
                                                    </div><!-- end card-->
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" onclick="removeCheque()" data-dismiss="modal">Remove Cheque
                                                </button>

                                                <button type="button" class="btn btn-secondary" onclick="clearCheque()" data-dismiss="modal">Close
                                                </button>
                                                <button type="button" id="add_product_button" onclick="AddCheque()"
                                                        class="btn btn-primary">Add Cheque
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Cheque model end here--}}



                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <div class="card border-dark mb-3" style="max-width: 25rem;">
                                        <div class="card-header">Payment Details</div>
                                        <div class="card-body text-dark">

                                            <div class="form-group row" style="margin-bottom: 7px;">
                                                <label for="cheque_paid" class="col-sm-4 col-form-label">Cheque
                                                    Paid</label>


                                                <div class="col-sm-2">
                                                    <a href="#custom-modal" title="Add cheque"
                                                       class="btn btn-danger" data-target="#chequeModal"
                                                       data-toggle="modal">
                                                        <i class="fa fa-money bigfonts" style="font-size: 20px;"
                                                           aria-hidden="true"></i>

                                                    </a>
                                                </div>

                                                <div class="col-sm-6">
                                                    <input type="text"  readonly name="cheque_paid"
                                                           class="form-control" value="0" id="cheque_paid"
                                                           placeholder="Cheque paid" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-bottom: 7px;">
                                                <label for="cash_paid" class="col-sm-6 col-form-label">Cash
                                                    Paid</label>
                                                <div class="col-sm-6">
                                                    <input type="number" value="0" min="0" step="0.01" onchange="chngCashPaid()" name="cash_paid"
                                                           class="form-control" id="cash_paid"
                                                           placeholder="Cash paid" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-bottom: 7px;">
                                                <label for="due" class="col-sm-6 col-form-label">Current
                                                    Due</label>
                                                <div class="col-sm-6">
                                                    <input type="text" value="0" readonly class="form-control" id="due"
                                                           name="due" placeholder="Current due" autocomplete="off">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">

                                    <div class="form-group row" style="margin-bottom: 7px;">
                                        <label for="cutting_cost" class="col-sm-6 col-form-label">Cutting Cost</label>
                                        <div class="col-sm-6">
                                            <input type="number" value="0" min="0" step="0.01" class="form-control"
                                                   id="cutting_cost" name="cutting_cost" onfocus="setCuttingCost()"
                                                   onchange="chngCuttingCost()"
                                                   placeholder="cutting_cost" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-bottom: 7px;">
                                        <label for="labour_cost" class="col-sm-6 col-form-label">Labour Cost</label>
                                        <div class="col-sm-6">
                                            <input type="number" value="0" min="0" step="0.01" class="form-control"
                                                   id="labour_cost" name="labour_cost" onfocus="setLabourCost()"
                                                   onchange="chngLabourCost()"
                                                   placeholder="labour_cost" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-bottom: 7px;">
                                        <label for="previous_due" class="col-sm-6 col-form-label">Previous Due</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="0" readonly class="form-control" id="previous_due"
                                                   name="previous_due"
                                                   placeholder="previous_due" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-bottom: 7px;">
                                        <label for="discount" class="col-sm-6 col-form-label">Discount</label>
                                        <div class="col-sm-6">
                                            <input type="number" value="0" onchange="chngDisocunt()"  class="form-control" id="discount"
                                                   name="discount"
                                                   placeholder="Discount" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="grand_total" class="col-sm-6 col-form-label">Grand Total</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="0" readonly class="form-control" id="grand_total"
                                                   name="grand_total"
                                                   placeholder="grand_total" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group text-right m-b-0">

                                        <button type="reset" class="btn btn-secondary m-l-5">
                                            Cancel
                                        </button>
                                        <button class="btn btn-primary" type="submit">
                                            Sell
                                        </button>

                                    </div>

                                </div>
                                @csrf
                                <div class="form-group col-md-1">
                                </div>

                            </div>
                            </form>
                        </div>
                    </div><!-- end card-->
                </div>

            </div>

        </div>


    </div>


@endsection



@section('script')
    <script>
        $('.selectProduct').on('change', function () {
            var product = $('.selectProduct').find(":selected").text();
            var end = product.indexOf("(");
//            var end = sentence.indexOf(".", start+1);

//            console.log(product.substring(0, end));
            var p=product.substring(0, end);

//            var list = sentence.substring(start+1, end);
            document.forms['moadal-form'].elements['product_code'].value = p;
        });


        $(function () {
            $('input[name="date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        })

        $(function () {
            $('input[name="received_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });
        $(function () {
            $('input[name="withdrawal_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });




$('.selectProduct').select2({
    placeholder: 'Search product',
    ajax: {
        url: '/mostofa_steel/public/get-available-product',
        method: "GET",
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
                results:  $.map(data, function (item) {
                    console.log(item);
                     var i;
                    if(item.original_id!=0){
                        i=item.original_id;
                    }
                    else{
                        i=item.id;
                    }
                    return {
                        text: ""+item.product_code+" (Product Id: "+i+", Available: "+item.available_weight+" kg, Loc: "+item.location+", "+item.entry_date+")",
                        id: item.id
                    }
                })
            };
        },
        cache: true
    }
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





        $('.selectCustomer').on('change', function () {
            var cid = $('#selectCustomer').val();
            console.log(cid);
//            document.forms['sellForm'].elements['product_code'].value = product;
            $.ajax({url: "/mostofa_steel/public/get-total-due",
                data: 'q=' + cid,
                dataType: 'json',
                success: function(result){
//                $("#div1").html(result);
                    console.log(result.cash_due);
                    document.getElementById("previous_due").value=result.cash_due;
                    document.getElementById("previous-due").value=result.cash_due;
//                    document.forms['sellForm'].elements['previous_due'].value = result.total_due;
//                    $('#previous-due').value=result.total_due;
                }});
        });

    </script>



    <script type="text/javascript">

        var subTotal = 0;
        var grandTotal = 0;
        var chequeAmount=0;
        var cashPaidAmount=0;

        var prevCuttingCost = 0;
        var prevLabourCost = 0;



        function AddData() {

            var product_id = document.getElementById("selectProduct").value;
            var product_code = document.getElementById("product_code").value;
            var piece = document.getElementById("piece").value;
            var piece = parseInt(piece);
//            alert(piece);
            var unit_price = document.getElementById("unit_price").value;
            var unit_price = parseFloat(unit_price);
            var weight = document.getElementById("weight").value;
            var weight = parseFloat(weight);

            var coil = document.getElementById("coil").value;
            var coil = parseFloat(coil);


            var description = document.getElementById("description").value;

            if (isNaN(piece) || piece == null) {
                showAlert("You must enter number of pieces!");
                return null;
            }
            else if (isNaN(unit_price) || unit_price == null) {
                showAlert("You must enter unit price!");
                return null;
            }
            else if (isNaN(weight) || weight == null) {
                showAlert("You must enter weight!");
                return null;
            }
            else if (isNaN(coil) || coil == null) {
                showAlert("You must enter coil!");
                return null;
            }
            var total = Math.floor(weight * unit_price);


            var rows = '<tr> <td><input  type="hidden" id="product_id" readonly="readonly" name="product_id[]" value="' + product_id + '">' + product_id + '</td>' +
                '<td><input  type="hidden" id="name" readonly="readonly" name="product_code[]" value="' + product_code + '">' + product_code + '</td>' +

                '<td><input  type="hidden" id="description" readonly="readonly" name="description[]" value="' + description + '">' + description + '</td>' +
                '<td><input id="piece"  name="piece[]" type="hidden" class="qty form-control"  value="' + piece + '">' + piece + '</td>' +
                '<td><input id="coil"  name="coil[]" type="hidden" class="qty form-control"  value="' + coil + '">' + coil + '</td>' +
                '<td><input name="weight[]" type="hidden" class="form-control" readonly="readonly" value="' + weight + '">' + weight + '</td>' +
                '<td><input name="unit_price[]" type="hidden" class="form-control" value="' + unit_price + '">' + unit_price + '</td>' +
                '<td>' + total + '</td>' +

                '<td><span class="fa fa-window-close bigfonts" style="font-size:20px; Color:red;" title="Delete item" onclick="deleteRow(this)"></span></td>'
            '</tr>'
            ;

            $(rows).appendTo("#list tbody");
            hideModalWithReset();

            addAmount(total);


        }


        function AddCheque() {

            var cheque_no = document.getElementById("cheque_no").value;

            var bank_name = document.getElementById("bank_name").value;

            var amount = document.getElementById("amount").value;
            chequeAmount = parseFloat(amount);

            if(bank_name == null || bank_name==""){
                showAlert("You must enter the bank name!");
                return null;
            }
            else if(cheque_no == null || cheque_no==""){
                showAlert("You must enter the cheque no!");
                return null;
            }
           else if (isNaN(chequeAmount) || chequeAmount == null) {
                showAlert("You must enter the amount!");
                return null;
            }

            document.getElementById("cheque_paid").value=chequeAmount;

            setDue();

            $('#chequeModal').modal('hide');

        }


        function clearCheque(){
            var amount = document.getElementById("amount").value;
            var amountData = parseFloat(amount);
            if(amount==null || amount=="" ||amountData<=0){
                document.getElementById("cheque_no").value="";
                document.getElementById("bank_name").value="";
                document.getElementById("amount").value="";
            }

        }
        function removeCheque(){
                chequeAmount=0;
                document.getElementById("cheque_no").value="";
                document.getElementById("bank_name").value="";
                document.getElementById("amount").value="";
                document.getElementById("cheque_paid").value=0;
            setDue();

        }


        function hideModalWithReset() {
            $('#customModal').modal('hide');
            ResetForm();
        }

        function ResetForm() {
            document.getElementById("moadal-form").reset();
        }


        function deleteRow(btn) {

            var row = btn.parentNode.parentNode;
            var delItem = row.childNodes[8].firstChild.nodeValue;

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this item!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    row.parentNode.removeChild(row);
                    substractAmount(delItem);
                }
            });


//            console.log(row.childNodes[7]);
//            console.log(row.childNodes[7].firstChild);
            console.log(row.childNodes[7].firstChild.nodeValue);
//            alert(row.childNodes[7].firstChild.nodeValue);


//            totalAmount();
//            totalQuantity();

        }

        function totalAmount() {

        }
        function addAmount(t) {
            subTotal += t;
            changeGrandTotal();
        }

        function substractAmount(t) {
            subTotal -= t;
            changeGrandTotal();
        }

        function chngDisocunt() {
            changeGrandTotal();
        }


        function changeGrandTotal() {
            var cutting = document.getElementById("cutting_cost").value;
            var cutting = parseFloat(cutting);

            var labour = document.getElementById("labour_cost").value;
            var labour = parseFloat(labour);

            var previous_due = document.getElementById("previous_due").value;
            var previous_due = parseFloat(previous_due);

            var discount = document.getElementById("discount").value;
            var discount = parseFloat(discount);

            grandTotal = subTotal +previous_due+ cutting + labour-discount;
            document.getElementById("grand_total").value = grandTotal;
            setDue();
        }

        function setDue() {
            var due=grandTotal-(chequeAmount+cashPaidAmount);
//            console.log("Grand:"+grandTotal+" cheque:"+chequeAmount);
//            console.log(due);
//            alert(due);
            document.getElementById("due").value=due;
        }

        function showAlert(msg) {
            swal("Oh noes!", "" + msg, "error");

        }

        function chngCashPaid() {
            var cash_paid = document.getElementById("cash_paid").value;
            cashPaidAmount=parseFloat(cash_paid);
            setDue();

        }


        function setCuttingCost() {
            prevCuttingCost = document.getElementById("cutting_cost").value;
        }
        function setLabourCost() {
            prevLabourCost = document.getElementById("labour_cost").value;
        }


        function chngCuttingCost() {
            changeGrandTotal();
        }

        function chngLabourCost() {
            changeGrandTotal();
        }



    </script>

@endsection
