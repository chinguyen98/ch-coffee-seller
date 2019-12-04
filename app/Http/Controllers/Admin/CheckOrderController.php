<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\DB;

class CheckOrderController extends Controller
{
    public function index()
    {
        $noneCheckOrder = DB::table('orders')->where('id_status', 1)->get();
        return view('admin/manage/orders/checkorder')->with(['orders' => $noneCheckOrder]);
    }

    public function show($id)
    {
        $order = Order::with('order_details')->find($id);
        $totalPrice = 0;
        foreach ($order->order_details as $item) {
            $item['coffee_name'] = DB::table('coffees')->where('id', $item->id_coffee)->first(['name']);
            $totalPrice += $item->price * $item->quantity;
        }
        return view('admin/manage/orders/detail')->with(['order' => $order, 'totalPrice' => $totalPrice]);
    }
}
