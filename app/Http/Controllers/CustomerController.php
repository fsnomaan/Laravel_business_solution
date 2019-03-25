<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $customers=Customer::join('customer_addresses','customer_addresses.customer_id','=','customers.id')
//                ->select('customers.*','customer_addresses.city')
//                ->where('customers.deletion','=',0)
//                 ->where('customer_addresses.current','=',1)
//                ->get();


//        Ok
//                $customers=Customer::leftJoin('customer_addresses','customer_addresses.customer_id','=','customers.id')
//                ->select('customers.*','customer_addresses.city',DB::raw('customer_addresses.current =1'))
//                ->where('customers.deletion','=',0)
////                 ->where('customer_addresses.current','=',1)
//                ->get();


                $customers=DB::select(DB::raw('SELECT customers.*,customer_addresses.city,customer_addresses.deletion FROM customers LEFT JOIN customer_addresses ON customers.id=customer_addresses.customer_id AND customer_addresses.current =1'));
//                dd($customers);

        return view('customer.index')->withCustomers($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'company_name'=>'required|max:100',
            'owner_name'=>'required|max:100'
            //'mobile'=>'required|numeric|min:13'
            //'phone'=>'required|numeric|min:13'
            //'rating'=>'required',
            //'remark'=>'required|max:100'
        ]);

        $customer=new Customer();
        $customer->company_name=$request->company_name;
        $customer->company_name_bn=$request->company_name_bn;
        $customer->owner_name=$request->owner_name;
        $customer->owner_name_bn=$request->owner_name_bn;
        $customer->mobile=$request->mobile;
        $customer->phone=$request->phone;
        $customer->remark=$request->remark;
        $customer->comment=$request->comment;
        $customer->rating=$request->rating;
        $customer->cash_due=0;
        $customer->cheque_due=0;
        $customer->total_due=0;
        $customer->user_id=Auth::id();
        $customer->deletion=0;
        $customer->save();

        Session::flash('message','New customer  added successfully!');
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::find($id);
        return view('customer.show')->withCustomer($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::find($id);
        return view('customer.edit')->withCustomer($customer);
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
        $this->validate($request,[
            'company_name'=>'required|max:100',
            'owner_name'=>'required|max:100'
            //'mobile'=>'required|numeric|min:13',
            //'phone'=>'required|numeric|min:13',
            //'rating'=>'required',
            //'remark'=>'required|max:100'
        ]);

        $customer=Customer::find($id);
        $customer->company_name=$request->company_name;
        $customer->company_name_bn=$request->company_name_bn;
        $customer->owner_name=$request->owner_name;
        $customer->owner_name_bn=$request->owner_name_bn;
        $customer->mobile=$request->mobile;
        $customer->phone=$request->phone;
        $customer->remark=$request->remark;
        $customer->comment=$request->comment;
        $customer->rating=$request->rating;
        $customer->user_id=Auth::id();
        $customer->deletion=0;
        $customer->save();

        Session::flash('message','Customer updated successfully!');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::find($id);
        $customer->deletion=1;
        $customer->save();
        Session::flash('message','Customer deleted successfully!');
        return redirect()->route('customer.index');
    }


    //    For client list ajax request
    public function getCustomerList(Request $request){
        $customers = [];

        if($request->has('q')){
            $val = $request->q;
//            $products = User::all()
            $customers = DB::table('customers')
                ->select("id","company_name","owner_name","mobile")
                ->where('company_name', 'LIKE', '%' . $val . "%")
//                ->orWhere('owner_name', 'LIKE', '%' . $val . "%")
//                ->orWhere('mobile', 'LIKE', '%' . $val . "%")
                ->get();
        }
//        return Response($users);
        return response()->json($customers);
    }

    //    For client list ajax request
    public function getCustomerDue(Request $request){
        $customers = [];

        if($request->has('q')){
            $val = $request->q;
//            $products = User::all()
            $customers = DB::table('customers')
                ->select("id","cash_due")
                ->where('id', '=', $val)
                ->first();
        }
//        return Response($users);
        return response()->json($customers);
    }

    public function viewAllDues(){
        $customers=Customer::leftJoin('customer_addresses','customer_addresses.customer_id','=','customers.id')
            ->select('customers.*','customer_addresses.city')
            ->where('customers.deletion','=',0)
            ->where('customers.cash_due','!=',0)
//            ->where('customer_addresses.current','=',1)

            ->get();

//        $customers=DB::select(DB::raw('SELECT customers.*,customer_addresses.city,customer_addresses.deletion FROM customers LEFT JOIN customer_addresses ON customers.id=customer_addresses.customer_id AND customers.cash_due!=0 AND customer_addresses.current =1 AND customers.deletion=0'));
//                dd($customers);
        return view('customer.all_dues')->withCustomers($customers);
    }
}
