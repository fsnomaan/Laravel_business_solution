<?php

namespace App\Http\Controllers;

use App\Adjustment;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adjustments=Adjustment::all()->where('deletion',0);
        return view('adjustment.index')->withAdjustments($adjustments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'weight'=>'required|numeric|between:0.00,999999.99',
            'piece'=>'required|numeric|digits_between:1,10'
        ]);

        $product=Product::find($request->product_id);
        $product->available_weight=$product->available_weight-$request->weight;
        $product->available_piece=$product->available_piece-$request->piece;
        $product->save();

        $adjust=new Adjustment();
        $adjust->product_id=$request->product_id;
        $adjust->product_code=$product->product_code;
        $adjust->product_detail_id=$product->product_detail_id;
        $adjust->weight=$request->weight;
        $adjust->piece=$request->piece;
        $adjust->lc_code=$product->lc_code;
        $adjust->comment=$request->comment;
        $adjust->description=$request->description;
        $adjust->date=Carbon::parse($request->date);
        $adjust->user_id=Auth::id();
        $adjust->deletion=0;
        $adjust->save();

        Session::flash('message','Product adjusted successfully!');
        return redirect()->route('adjustment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function addAdjustment($id){
        return view('adjustment.create')->withId($id);
    }
}
