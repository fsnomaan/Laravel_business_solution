<?php

namespace App\Http\Controllers;

use App\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ProductDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productDetails=ProductDetail::all()->where('deletion','=',0);
        return view('product-detail.index')->withProductDetails($productDetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-detail.create');
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
            'product_code'=>'required|max:15'
//            'product_name'=>'required|max:100',
//            'description'=>'required|max:200',
//            'color'=>'required|max:50',
//            'height'=>'required|numeric|between:0.00,999999.99',
//            'style'=>'required|max:100',
//            'thickness'=>'required|numeric|between:0.00,999999.99',
//            'width'=>'required|numeric|between:0.00,999999.99',
//            'remark'=>'required|max:100'
        ]);

//        dd($request);

        $productDetail=new ProductDetail();
        $productDetail->product_code=$request->product_code;
        $productDetail->product_name=$request->product_name;
        $productDetail->description=$request->description;
        $productDetail->color=$request->color;
        $productDetail->height=$request->height;
        $productDetail->style=$request->style;
        $productDetail->thickness=$request->thickness;
        $productDetail->width=$request->width;
        $productDetail->remark=$request->remark;
        $productDetail->comment=$request->comment;
        $productDetail->user_id=Auth::id();
        $productDetail->deletion=0;
        $productDetail->save();

        Session::flash('message','New product detail added successfully!');
        return redirect()->route('product-detail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productDetail=ProductDetail::find($id);
        return view('product-detail.show')->withProductDetail($productDetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productDetail=ProductDetail::find($id);
        return view('product-detail.edit')->withProductDetail($productDetail);
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
            'product_code'=>'required|max:15'
//            'product_name'=>'required|max:100',
//            'description'=>'required|max:200',
//            'color'=>'required|max:50',
//            'height'=>'required|numeric|between:0.00,999999.99',
//            'style'=>'required|max:100',
//            'thickness'=>'required|numeric|between:0.00,999999.99',
//            'width'=>'required|numeric|between:0.00,999999.99',
//            'remark'=>'required|max:100'
        ]);

        $productDetail=ProductDetail::find($id);
        $productDetail->product_code=$request->product_code;
        $productDetail->product_name=$request->product_name;
        $productDetail->description=$request->description;
        $productDetail->color=$request->color;
        $productDetail->height=$request->height;
        $productDetail->style=$request->style;
        $productDetail->thickness=$request->thickness;
        $productDetail->width=$request->width;
        $productDetail->remark=$request->remark;
        $productDetail->comment=$request->comment;
        $productDetail->user_id=Auth::id();
        $productDetail->deletion=0;
        $productDetail->save();

        Session::flash('message','Product detail updated successfully!');
        return redirect()->route('product-detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDetail=ProductDetail::find($id);
        $productDetail->deletion=1;
        $productDetail->save();
        Session::flash('message','Product detail deleted successfully!');
        return redirect()->route('product-detail.index');
    }
}
