<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Cheque;
use App\Customer;
use App\Finance;
use App\Product;
use App\sell;
use App\sellDetail;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells=Sell::join('customers','customers.id','=','sells.customer_id')
        ->select('sells.*','customers.company_name','customers.owner_name')
            ->where("sells.deletion","=",0)
        ->get();
        return view('sell.index')->withSells($sells);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sell.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);

        $this->validate($request, [
            'date' => 'required|date|max:200'
        ]);

        $new_customer=$request->new_customer;
        $old_customer=$request->customer_id;
        $customer_id=null;

//        if ($old_customer==null && $new_customer==null ){
//            Session::flash('message','Please select a customer or give the name of new customer!');
//            return redirect()->route('sell.create');
//        }elseif ($old_customer=!null){
//        if ($old_customer=!null){
//            $customer_id=$old_customer;
//        }elseif ($old_customer==null && $new_customer=!null)
//        {
            if ($old_customer){
            $customer_id=$old_customer;
        }elseif ($new_customer){
            $customer=new Customer();
            $customer->owner_name=$new_customer;
            $customer->company_name=$new_customer;
            $customer->cash_due=0;
            $customer->cheque_due=0;
            $customer->total_due=0;
            $customer->user_id = Auth::id();
            $customer->deletion = 0;
            $customer->save();

            $customer_id=$customer->id;
        }else{
            Session::flash('message', 'Please select a customer or give the name of new customer!');
            return redirect()->route('sell.create');
        }

        $prevSell=Sell::where('customer_id',$customer_id)->orderBy('id', 'desc')->first();


        $sell = new Sell();
        $sell->customer_id = $customer_id;
        $sell->date = Carbon::parse($request->date);
        $sell->cutting_cost = $request->cutting_cost;
        $sell->labour_cost = $request->labour_cost;
        $sell->previous_due = $request->previous_due;
        $sell->grand_total = $request->grand_total;
        $sell->cheque_paid = $request->cheque_paid;
        $sell->cash_paid = $request->cash_paid;
        $sell->due = $request->due;
        $sell->discount = $request->discount;
        $sell->previous_due = $request->previous_due;
        $sell->description = $request->sell_description;
        $sell->full_paid = ($request->due == 0 ? 1 : 0);
        $sell->user_id = Auth::id();
        $sell->deletion = 0;
        $sell->save();

        $customer=Customer::find($customer_id);
        $customer->cash_due=$request->due;
        if($request->cheque_paid>0){
            $customer->cheque_due=$request->cheque_paid;
        }
        $customer->save();


        $sellId = $sell->id;

        for ($i = 0; $i < count($request->product_id); $i++) {
            $sellDetail=new SellDetail();
            $sellDetail->sell_id=$sellId;
            $sellDetail->product_id=$request->product_id[$i];

            $product=Product::find($request->product_id[$i]);
//            $product->available_piece=$product->available_piece-$request->piece[$i];
            if($product->available_piece!=null){
                $product->available_piece=$product->available_piece-$request->piece[$i];
                $sellDetail->piece=$request->piece[$i];
            }

            if($product->available_coil!=null){
                $product->available_coil=$product->available_coil-$request->coil[$i];
                $sellDetail->coil=$request->coil[$i];
            }

            $product->available_weight=$product->available_weight-$request->weight[$i];
            $product->save();

            $sellDetail->product_code=$request->product_code[$i];
            $sellDetail->piece=$request->piece[$i];

            $sellDetail->weight=$request->weight[$i];
            $sellDetail->unit_price=$request->unit_price[$i];
            $sellDetail->description=$request->description[$i];
            $sellDetail->user_id = Auth::id();
            $sellDetail->deletion = 0;
            $sellDetail->save();
        }



        if($request->cheque_paid>0){
            $cheque=new Cheque();
            $cheque->customer_id=$customer_id;
            $cheque->sell_id=$sellId;
            $cheque->amount=$request->cheque_paid;
            $cheque->due_amount=$request->cheque_paid;
            $cheque->cheque_no=$request->cheque_no;
            $cheque->bank_name=$request->bank_name;
            $cheque->received_date=Carbon::parse($request->received_date);
            $cheque->withdrawal_date=Carbon::parse($request->withdrawal_date);
            $cheque->parent_cheque_id=0;
            $cheque->full_paid=0;
            $cheque->user_id = Auth::id();
            $cheque->deletion = 0;
            $cheque->save();
        }

        if($request->cash_paid>0){
            $cash=new Cash();
            $cash->sell_id=$sellId;
            $cash->amount=$request->cash_paid;
            $cash->received_date=Carbon::parse($request->received_date);
            $cash->cash_receive_comment=$request->cash_receive_comment;
            $cash->cash_for_cheque_id=0;
            $cash->user_id = Auth::id();
            $cash->deletion = 0;
            $cash->save();

            $finance=new Finance();
            $finance->sales_cash=$request->cash_paid;
            $finance->type=0;
            $finance->user_id = Auth::id();
            $finance->deletion = 0;
            $finance->save();

        }

        if ($sellId){
            $prevSell->due=0;
            $prevSell->save();

        }

        Session::flash('message','Successfully sold out!');
        return redirect()->route('sell.create');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sell = Sell::join('customers', 'customers.id', '=', 'sells.customer_id')
            ->where('sells.id','=',$id)
            ->select('sells.*', 'customers.company_name', 'customers.owner_name')
        ->first();

        $items=SellDetail::where('sell_id','=',$id)
            ->get();

        return view('sell.show')
            ->withSell($sell)
            ->withItems($items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sell=Sell::find($id);

        $sellDetails=SellDetail::all()->where('sell_id',$id);
        foreach ($sellDetails as $detail){
            $product=Product::find($detail->product_id);
            $product->available_piece=$product->available_piece+$detail->piece;
            $product->available_weight=$product->available_weight+$detail->weight;
            $product->save();

            $detail->deletion=1;
            $detail->save();

        }
        if($sell->cheque_paid>0){
            $cheques=Cheque::all()->where('sell_id',$id);
            foreach ($cheques as $cheque){
                $cheque->deletion=1;
                $cheque->save();
            }
        }

        if($sell->cash_paid>0){
            $cashes=Cash::all()->where('sell_id',$id);
            foreach ($cashes as $cash){
                $cash->deletion=1;
                $cash->save();

                $finance=new Finance();
                $finance->sales_cash= -$cash->amount;
                $finance->type=0;
                $finance->user_id = Auth::id();
                $finance->deletion = 0;
                $finance->save();
            }
        }

        $sell->deletion=1;
        $sell->save();

        Session::flash('message','Sell successfully deleted!');
        return redirect()->route('sell.index');

    }


    public function getInvoice($id)
    {
        $sell = Sell::join('customers', 'customers.id', '=', 'sells.customer_id')
            ->where('sells.id','=',$id)
            ->select('sells.*', 'customers.company_name', 'customers.owner_name')
            ->first();

        $items=SellDetail::where('sell_id','=',$id)
            ->get();
        $data = ['sell' => $sell,'items' => $items];

        $pdf = PDF::loadView('sell.invoice', $data);


        return $pdf->stream('invoice-'.$id.'.pdf', array("Attachment" => false));
//        return $pdf->download('invoice-'.$id.'.pdf');
    }

    public function getSellList(Request $request){
        $products = [];

        if($request->has('q')){
            $val = $request->q;

            $products = Sell::join('customers', 'customers.id', '=', 'sells.customer_id')
                ->select('sells.id','sells.due','sells.date','customers.company_name','customers.owner_name')

//                ->whereNotBetween('sells.due',[0.01,99999999.99])
//                ->whereRaw('sells.due BETWEEN 1.00 AND 99999999')
//                ->whereNotBetween('sells.due',[1,99999999])
//                ->orWhereRaw('sells.due >0.00')
//                ->orWhere('sells.due','=',0.0)
//                ->where('sells.full_paid','=',0)
                ->where('sells.due','!=',0)

//                ->orWhere('sells.id', 'LIKE', '%' . $val . "%")
                ->where('customers.company_name', 'LIKE', '%' . $val . "%")
//                ->orWhere('customers.owner_name', 'LIKE', '%' . $val . "%")
                ->orderBy('sells.created_at', 'desc')
                ->get();
//                ->first();
//                ->latest()->first();
        }
//        return Response($users);
        return response()->json($products);
    }
}
