<?php

namespace App\Http\Controllers;

use App\Product;
use App\StockMovement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class StockMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movements=StockMovement::all();
        return view('stock-movement.index')->withMovements($movements);
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
            'piece'=>'required|numeric|digits_between:1,10',
            'coil'=>'required|numeric|digits_between:1,10',
            'location'=>'required|max:200',
            'remark'=>'required|max:200',
            'entry_date'=>'required|date|max:200'
        ]);


        $new_weight=$request->weight;
        $new_piece=$request->piece;
        $new_coil=$request->coil;
        $new_location=$request->location;
        $new_remark=$request->remark;
        $new_entry_date=$request->entry_date;
        $new_comment=$request->comment;

//        dd($request);
//        exit();

        $old_id=$request->product_id;




        $old_product=Product::find($old_id);


//        dd($old_product);
//        exit();

        if ($old_product->available_weight<$new_weight){
            Session::flash('message','New weight must be less than old weight!');
            return redirect()->route('product.index');
        }

        if ($old_product->available_piece<$new_piece){
            Session::flash('message','New pieces must be less than old pieces!');
            return redirect()->route('product.index');
        }

        if ($old_product->available_coil<$new_coil){
            Session::flash('message','New coil must be less than old coil!');
            return redirect()->route('product.index');
        }


        $old_product->available_weight=($old_product->weight-$new_weight);
        $old_product->available_piece=($old_product->piece-$new_piece);
        $old_product->available_coil=($old_product->coil-$new_coil);

        $old_product->save();


        $product=new Product();
        $product->product_code=$old_product->product_code;
        $product->product_detail_id=$old_product->product_detail_id;

        $product->weight=$old_product->weight;
        $product->piece=$old_product->piece;
        $product->coil=$old_product->coil;
        $product->lc_code=$old_product->lc_code;
        $product->location=$new_location;
        $product->original_id=$old_id;
        $product->remark=$new_remark;
        $product->entry_date=Carbon::parse($new_entry_date);
        $product->comment=$new_comment;
        $product->available_weight=$new_weight;
        $product->available_piece=$new_piece;
        $product->available_coil=$new_coil;
        $product->user_id=Auth::id();
        $product->deletion=0;
        $product->save();


        $stockMovement=new StockMovement();
        $stockMovement->product_id=$old_id;
        $stockMovement->weight=$new_weight;
        $stockMovement->piece=$new_piece;
        $stockMovement->coil=$new_coil;
        $stockMovement->location=$new_location;
        $stockMovement->remark=$new_remark;
        $stockMovement->entry_date=Carbon::parse($new_entry_date);
        $stockMovement->comment=$new_comment;
        $stockMovement->user_id=Auth::id();
        $stockMovement->deletion=0;
        $stockMovement->save();


        Session::flash('message','Product moved successfully!');
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('stock-movement.create')->withId($id);
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
//        return view()
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
}
