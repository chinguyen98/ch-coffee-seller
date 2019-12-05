<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        return view('carts/order')->with(['orderactive' => 'active']);
    }

    public function showStatus(Request $request)
    {
        $status = DB::table('orders')->where('id', $request->input('id_order'))->first(['id_status']);
        return view('carts/status')->with(['status' => $status]);
    }
}
