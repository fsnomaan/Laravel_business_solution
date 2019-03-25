<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $products=Product::all()->where('deletion','=',0);
//        $products=Product::where('deletion','=',0)->groupBy('lc_code')->get();
//        $products=DB::select('select * from products where deletion = 0 group by lc_code');
//        $products=Product::where('deletion','=',0)
//            ->value(DB::raw("SUM(available_weight + available_coil)"));
//
//            ->groupBy('lc_code')
//            ->sum('available_weight')->where('deletion','=',0);
////            ->get(['projects.id', DB::raw('sum(variations.value) as value')])
////            ->sum('available_weight');
////            ->get();


        //        $products=DB::table('products')
////            ->groupBy(DB::raw("lc_code"))
//            ->groupBy("lc_code")
//            ->select(DB::raw("lc_code,SUM(available_weight) as a_weight,SUM(available_piece) as a_piece,SUM(available_coil) as a_coil"),
//
//                DB::raw()
//            )
////            ->select("SUM(available_weight) as a_weight,SUM(available_piece) as a_piece,SUM(available_coil) as a_coil")
////            ->sum('available_weight')
//            ->orderBy("created_at","desc")
//
//            ->get();

//
//        $products=DB::select('select s1.lc_code,s1.original_id,s1.available_weight
//from products as s1 inner join (select lc_code,max(available_weight) as a_weight,sum(available_piece) as p
//from products group by lc_code) as s2
//on s2.lc_code = s1.lc_code
//and s2.a_weight = s1.available_weight');

//        $products=DB::select('select s1.lc_code,s1.original_id,s1.available_weight,s1.available_piece
//from products as s1 inner join (select lc_code,original_id,sum(available_weight) as a_weight,sum(available_piece) as a_piece
//from products group by lc_code) as s2
//on s2.lc_code = s1.lc_code
//and s2.original_id = s1.original_id');
//        $products=DB::table('products')
//            ->where('lc_code','=','cc1202')
//            ->sum('available_weight');



// Successfully Done
        $products=DB::table('products')
            ->groupBy("lc_code","product_code")
            ->select(DB::raw("id,product_code,weight,piece,coil,location,lc_code,SUM(available_weight) as a_weight,SUM(available_piece) as a_piece,SUM(available_coil) as a_coil"))
            ->orderBy("created_at","desc")
            ->get();






//        dd($products);
//        die();


        return view('product.index')->withProducts($products);
    }

    public function indexEx()
    {

        $products=Product::where('deletion',0)->get();

        return view('product.index_ex')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=ProductDetail::all();
        return view('product.create')->withProductDetails($products);
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
            'product_code'=>'required|max:15',
            'weight'=>'required|numeric|between:0.00,999999.99',
            //'piece'=>'required|numeric|digits_between:1,10',
            //'coil'=>'required|numeric|digits_between:1,10',
            'location'=>'required|max:200',
            //'remark'=>'required|max:200',
            'lc_code'=>'required|max:50',
            'entry_date'=>'required|date|max:200'
        ]);

        $product=new Product();
        $product->product_code=$request->product_code;
        $product->product_detail_id=$request->product_detail_id;
        $product->weight=$request->weight;
        $product->piece=$request->piece;
        $product->coil=$request->coil;
        $product->location=$request->location;
        $product->lc_code=$request->lc_code;
        $product->original_id=0;
        $product->remark=$request->remark;
        $product->entry_date=Carbon::parse($request->entry_date);
        $product->comment=$request->comment;
        $product->available_weight=$request->weight;
        $product->available_piece=$request->piece;
        $product->available_coil=$request->coil;
        $product->user_id=Auth::id();
        $product->deletion=0;
        $product->save();

        Session::flash('message','New product added successfully!');
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
        $products=ProductDetail::all();
        $product=Product::find($id);
        return view('product.show')->withProduct($product)->withProductDetails($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=ProductDetail::all();
        $product=Product::find($id);
        return view('product.edit')->withProduct($product)->withProductDetails($products);
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
            'weight'=>'required|numeric|between:0.00,999999.99',
            //'piece'=>'required|numeric|digits_between:1,10',
            //'coil'=>'required|numeric|digits_between:1,10',
            'location'=>'required|max:200',
            //'remark'=>'required|max:200',
            'lc_code'=>'required|max:50',
            'entry_date'=>'required|date|max:200'
        ]);

        $product=Product::find($id);
        $product->product_detail_id=$request->product_detail_id;
        $product->weight=$request->weight;
        $product->piece=$request->piece;
        $product->coil=$request->coil;
        $product->location=$request->location;
        $product->lc_code=$request->lc_code;
        $product->original_id=0;
        $product->remark=$request->remark;
        $product->entry_date=Carbon::parse($request->entry_date);
        $product->comment=$request->comment;
        $product->available_weight=$request->weight;
        $product->available_piece=$request->piece;
        $product->available_coil=$request->coil;
        $product->user_id=Auth::id();
        $product->deletion=0;
        $product->save();

        Session::flash('message','Product update successfully!');
        return redirect()->route('productUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->deletion=1;
        $product->save();
        Session::flash('message','Product deleted successfully!');
        return redirect()->route('product.index');
    }

    public function getProductList(Request $request){
        $products = [];

        if($request->has('q')){
            $val = $request->q;
//            $products = User::all()
            $products = DB::table('products')
                ->select("id","product_code","original_id","available_weight","lc_code","location","entry_date")
                ->where('available_weight',">",0)
                ->where('product_code', 'LIKE', '%' . $val . "%")
                ->get();
        }
//        return Response($users);
        return response()->json($products);
    }


    public function getAllProductList(Request $request){
        $products = [];

        if($request->has('q')){
            $val = $request->q;
//            $products = User::all()
            $products = DB::table('products')
                ->select("id","product_code","original_id","available_weight","lc_code","location","entry_date")
                ->where('product_code', 'LIKE', '%' . $val . "%")
                ->get();
        }
        return response()->json($products);
    }
}
