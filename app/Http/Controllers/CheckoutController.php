<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfExistOrder');
    }

    public function index(Request $request)
    {
        $shipping_infos = DB::table('shipping_infos')->get();
        return view('carts/checkout')->with(['shipping_infos' => $shipping_infos]);
    }

    public function requestOrder(Request $request)
    {
        
        $order = array();
        $order[] = $request->input('name');
        $order[] = $request->input('email');
        $order[] = $request->input('address');
        $order[] = $request->input('phone_number');
        $order[] = $request->input('cart');
        $order[] = $request->input('shipping_info');
        $request->session()->put('order', $order);

        return redirect('/orderStatus');
    }
}
