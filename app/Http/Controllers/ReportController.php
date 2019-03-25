<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Cheque;
use App\Customer;
use App\Product;
use App\sell;
use App\sellDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function showSingleCustomerReport(){
        return view('report.single_report');
    }


    public function viewSingleCustomerReport(Request $request){
        $this->validate($request, [
            'customer_id' => 'required',
        ]);

        $customer_id=$request->customer_id;

        $from_date=Carbon::parse($request->start_date);
        $to_date=Carbon::parse($request->end_date);

//        $data=Sell::join('cheques','cheques.customer_id','sells.customer_id')
//            ->join('cashes','cashes.sell_id','sells.id')
//            ->select('sells.*','cheques.amount as cq_amount','cheques.id as cq_id','cheques.due_amount as cq_due_amount','cashes.amount as cs_amount',
//                'cashes.id as cs_id','cashes.amount as cs_amount')
////                'cashes.id as cs_id','cashes.amount as cs_amount',DB::raw('select max(weight) as t_weight from sell_details where sell_details.sell_id = 1'))
//            ->where('sells.customer_id','=',$customer_id)
////            ->whereBetween('sells.date',[$from_date->format('Y-m-d')." 00:00:00", $to_date->format('Y-m-d')." 23:59:59"])
////            ->whereBetween('cheques.received_date',[$from_date->format('Y-m-d')." 00:00:00", $to_date->format('Y-m-d')." 23:59:59"])
////            ->whereBetween('cashes.received_date',[$from_date->format('Y-m-d')." 00:00:00", $to_date->format('Y-m-d')." 23:59:59"])
////            ->orderBy('date', 'ASC')
//            ->get();

        $customer=Customer::find($customer_id);

        $sells=Sell::where('customer_id',$customer_id)
            ->whereBetween('date',[$from_date->format('Y-m-d')." 00:00:00", $to_date->format('Y-m-d')." 23:59:59"])
            ->orderBy('date', 'ASC')
            ->get();

        $cheques=Cheque::where('customer_id',$customer_id)
            ->whereBetween('received_date',[$from_date->format('Y-m-d')." 00:00:00", $to_date->format('Y-m-d')." 23:59:59"])
            ->orderBy('received_date', 'ASC')
            ->get();

        $cashes=Cash::join('sells','sells.id','cashes.sell_id')
            ->select('cashes.*','sells.customer_id')
            ->whereBetween('received_date',[$from_date->format('Y-m-d')." 00:00:00", $to_date->format('Y-m-d')." 23:59:59"])
            ->where('sells.customer_id',$customer_id)
            ->orderBy('received_date', 'ASC')
            ->get();

//Done By raw
//        $from_date=$from_date->format('Y-m-d')." 00:00:00";
//        $to_date=$to_date->format('Y-m-d')." 23:59:59";
//        $query='SELECT c.*,s.customer_id FROM  cashes as c,sells as s WHERE c.sell_id=s.id AND s.customer_id='.$customer_id.' AND c.received_date >='.'"'.$from_date.'"'.' AND c.received_date <='.'"'.$to_date.'"';
//        $cashes=DB::select(DB::raw($query));

        return view('report.single_report')
            ->withCustomer($customer)
            ->withSells($sells)
            ->withCheques($cheques)
            ->withCashes($cashes);
    }




    public function showSingleProductReport(){
        return view('report.product_report');
    }



    public function viewSingleProductReport(Request $request){
        $this->validate($request, [
            'product_id' => 'required',
        ]);

        $product_id=$request->product_id;

        $product=Product::find($product_id);

        $sells=SellDetail::where('product_id',$product_id)
            ->get();

        return view('report.product_report')
            ->withProduct($product)
            ->withSells($sells);
    }

}

