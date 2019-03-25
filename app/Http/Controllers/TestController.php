<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function createCustomer(){
        return view('customer.add_customer');
    }
}
