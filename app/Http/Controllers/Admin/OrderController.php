<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')->where('id_status', 2)->get();
        foreach ($orders as $order) {
            if ($order->id_customer != null) {
                $order->customer = DB::table('customers')->where('id', $order->id_customer)->first(['name']);
            }
        }
        return view('admin/manage/orders/index')->with(['orders' => $orders]);
    }
    public function detail($id)
    {
        $customer = null;
        $order = DB::table('orders')->where('id', $id)->first();
        $shipping_info = DB::table('shipping_infos')->where('id', $order->id_shipping_info)->first(['price']);
        $totalPrice = $shipping_info->price;
        if ($order->id_customer != null) {
            $customer = DB::table('customers')->where('id', $order->id_customer)->first();
        }
        $order_detail = DB::table('order_details')->where('id_order', $id)->get();
        foreach ($order_detail as $item) {
            $item->coffee = DB::table('coffees')->where('id', $item->id_coffee)->first(['name']);
            $totalPrice += $item->price * $item->quantity;
        }
        return view('admin/manage/orders/detailcheck')->with(['order' => $order, 'customer' => $customer, 'orderdetail' => $order_detail, 'totalprice' => $totalPrice]);
    }
}
