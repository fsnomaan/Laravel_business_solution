<?php

namespace App\Http\Controllers;

use App\Product;
use App\sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestSell=Sell::join('customers','customers.id','=','sells.customer_id')
            ->select('sells.*','customers.owner_name')
            ->where("sells.deletion","=",0)
            ->limit(5)
            ->get();

        $topSellers=Product::join('product_details','product_details.id','=','products.product_detail_id')
            ->select('products.*','product_details.product_name')
            ->where("products.deletion","=",0)
            ->limit(5)
            ->get();



//        dd($products);
//        die();
        return view('dashboard.dashboard')->withLatestSell($latestSell)->withTopSellers($topSellers);
    }
}
