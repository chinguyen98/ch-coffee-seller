<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $shipping_infos = DB::table('shipping_infos')->get();
        return view('carts/checkout')->with(['shipping_infos' => $shipping_infos]);
    }
}
