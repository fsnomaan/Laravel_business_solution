<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CustomerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $addresses = CustomerAddress::all()->where('deletion','=',0);
//        return view('customer-address.index')->withAddresses($addresses);

    $addresses=CustomerAddress::leftJoin('customers','customer_addresses.customer_id','=','customers.id')
    ->select('customers.company_name','customer_addresses.*')
    ->where('customer_addresses.deletion','=',0)
//                 ->where('customer_addresses.current','=',1)
    ->get();
    
    return view('customer-address.index')->withAddresses($addresses);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('customer-address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'address' => 'required|max:100',
            //'city' => 'required|max:50',
            //'thana' => 'required|max:50',
            //'district' => 'required|max:50'
        ]);

        $customer_id=$request->customer_id;
        $customer=CustomerAddress::where('customer_id','=',$customer_id)
        ->where('current','=',1)
        ->first();

        if ($customer){
            $customer->current=0;
            $customer->save();
        }

        $address = new CustomerAddress();
        $address->customer_id = $customer_id;
        $address->address = $request->address;
        $address->city = $request->city;
        $address->thana = $request->thana;
        $address->district = $request->district;
        $address->comment = $request->comment;
        $address->house_number = $request->house_number;
        $address->road_name = $request->road_name;
        $address->user_id = Auth::id();
        $address->current=1;
        $address->deletion=0;
        $address->save();

        Session::flash('message', 'New address added successfully!');
        return redirect()->route('customer-address.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('customer-address.create')->withId($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = CustomerAddress::find($id);
        return view('customer-address.edit')->withAddress($address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'address' => 'required|max:100',
            'city' => 'required|max:50',
            //'thana' => 'required|max:50',
            //'district' => 'required|max:50'
        ]);

        $address = CustomerAddress::find($id);
        $address->address = $request->address;
        $address->city = $request->city;
        $address->thana = $request->thana;
        $address->district = $request->district;
        $address->comment = $request->comment;
        $address->house_number = $request->house_number;
        $address->road_name = $request->road_name;
        $address->deletion=0;
        $address->save();

        Session::flash('message', 'Customer address updated successfully!');
        return redirect()->route('customer-address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address=CustomerAddress::find($id);
        $address->deletion=1;
        $address->save();
        Session::flash('message','Customer address deleted successfully!');
        return redirect()->route('customer-address.index');
    }
}
