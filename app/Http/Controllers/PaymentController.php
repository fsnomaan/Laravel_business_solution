<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Cheque;
use App\Customer;
use App\Finance;
use App\sell;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class PaymentController extends Controller
{
    public function addCash(){
        return view('cash.create');
    }

    public function storeCash(Request $request){
        $this->validate($request, [
            'amount' => 'required|numeric|between:0.00,999999.99',
            'received_date' => 'required|date|max:30'
        ]);
        $amount=$request->amount;

        $sell=Sell::where('id','=',$request->customer_id)
            ->first();

        $customer=Customer::find($sell->customer_id);

        if($sell->due <= $amount){
            $sell->due=0;
            $customer->cash_due=0;
        }else{
            $sell->due=($sell->due-$amount);
            $customer->cash_due=($customer->cash_due-$amount);
        }
        $sell->save();
        $customer->save();

        $cash=new Cash();
        $cash->sell_id=$sell->id;
        $cash->amount=$amount;
        $cash->received_date=Carbon::parse($request->received_date);
        $cash->cash_receive_comment=$request->cash_receive_comment;
        $cash->cash_for_cheque_id=0;
        $cash->user_id = Auth::id();
        $cash->deletion = 0;
        $cash->save();

        $finance=new Finance();
        $finance->due_cash=$amount;
        $finance->type=0;
        $finance->user_id = Auth::id();
        $finance->deletion = 0;
        $finance->save();


//        dd($sell);


        Session::flash('message','Cash added to sell successfully!');
        return view('cash.create');
    }


    public function addCheque(){
        return view('cheque.create');
    }

    public function storeCheque(Request $request){
        $this->validate($request, [
            'bank_name' => 'required',
            'cheque_no' => 'required|numeric',
            'amount' => 'required|numeric|between:0.00,999999.99',
            'received_date' => 'required|date|max:30',
            'withdrawal_date' => 'required|date|max:30'
        ]);
        $amount=$request->amount;

        $sell=Sell::where('id','=',$request->customer_id)
            ->first();

        $customer=Customer::find($sell->customer_id);

        if($sell->due <= $amount){
            $sell->due=0;
            $customer->cash_due=0;
        }else{
            $sell->due=($sell->due-$amount);
            $customer->cash_due=($customer->cash_due-$amount);
        }
        $sell->save();
        $customer->save();

        $cheque=new Cheque();
        $cheque->customer_id=$sell->customer_id;
        $cheque->sell_id=$sell->id;
        $cheque->amount=$amount;
        $cheque->bank_name=$request->bank_name;
        $cheque->cheque_no=$request->cheque_no;
        $cheque->due_amount=$amount;
        $cheque->received_date=Carbon::parse($request->received_date);
        $cheque->withdrawal_date=Carbon::parse($request->withdrawal_date);
        $cheque->parent_cheque_id=0;
        $cheque->full_paid=0;
        $cheque->user_id = Auth::id();
        $cheque->deletion = 0;
        $cheque->save();


//        dd($sell);


        Session::flash('message','Cheque added to sell successfully!');
        return view('cheque.create');
    }

    public function allCheque(){
        $cheques=Cheque::join('customers','cheques.customer_id','=','customers.id')
                ->select('cheques.*','customers.company_name')
                ->where('cheques.deletion','=',0)
//                 ->where('customer_addresses.current','=',1)
                ->get();

        return view('cheque.index')->withCheques($cheques);
    }

    public function chequePaid($id){




        $cheque=Cheque::find($id);
        $cheque->due_amount=0;
        $cheque->full_paid=1;
        $cheque->user_id=Auth::id();
        $cheque->save();

        $sell=Sell::where('id','=',$cheque->sell_id)
            ->first();

        $customer=Customer::find($sell->customer_id);
        $customer->cheque_due=0;
        $customer->user_id=Auth::id();
        $customer->save();


        $cash=new Cash();
        $cash->sell_id=$cheque->sell_id;
        $cash->amount=$cheque->amount;
        $cash->received_date=Carbon::today();
        $cash->cash_for_cheque_id=$cheque->id;
        $cash->user_id=Auth::id();
        $cash->deletion=0;
        $cash->save();

        $finance=new Finance();
        $finance->cheque_cash=$cheque->amount;
        $finance->type=0;
        $finance->user_id = Auth::id();
        $finance->deletion = 0;
        $finance->save();


        Session::flash('message','Cheque paid successfully!');
        return redirect()->route('allCheque');
    }


    public function viewCashAgainstCheque(){

        return view('cash.cashCheque');
    }


    public function storeCashAgainstCheque(Request $request){
//        dd($request);
        $this->validate($request, [
            'amount' => 'required|numeric|between:0.00,999999.99',
            'received_date' => 'required|date|max:30'
        ]);

        $cheque=Cheque::find($request->cheque_id);

        $cash=new Cash();
        $cash->sell_id=$cheque->sell_id;
        $cash->amount=$request->amount;
        $cash->received_date=Carbon::parse($request->received_date);
        $cash->cash_for_cheque_id=$cheque->id;
        $cash->user_id=Auth::id();
        $cash->deletion=0;
        $cash->save();



        if($cheque->due_amount<1){
            $cheque->due_amount=($cheque->amount-$request->amount);
        }else{
            $temp_amount=($cheque->due_amount-$request->amount);
            $cheque->due_amount=$temp_amount;
            if($temp_amount<1){
                $cheque->full_paid=1;
            }
        }

        $cheque->save();

        $finance=new Finance();
        $finance->cheque_cash=$request->amount;
        $finance->type=0;
        $finance->user_id = Auth::id();
        $finance->deletion = 0;
        $finance->save();


        Session::flash('message','Cash against cheque added successfully!');
        return redirect()->route('cashAgainstCheque');

    }

    public function chequeList(Request $request){
        $cheques = [];

        if($request->has('q')){
            $val = $request->q;

            $cheques = Cheque::join('customers', 'customers.id', '=', 'cheques.customer_id')
                ->select('cheques.id','cheques.amount','cheques.due_amount','customers.company_name','customers.owner_name')
                ->where('full_paid', '=',0)
                ->where('customers.company_name', 'LIKE', '%' . $val . "%")
//                ->where('customers.owner_name', 'LIKE', '%' . $val . "%")
                ->get();
        }
//        return Response($users);
        return response()->json($cheques);
    }
}
