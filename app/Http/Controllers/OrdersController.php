<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function orderStatus(Request $request)
    {
        //Clear order session, only for test!
        //$request->session()->forget('order');
        //return $request->session()->get('order');

        if (!$request->session()->get('order')) {
            return redirect('/carts');
        }
        return view('carts/order');
    }
}
