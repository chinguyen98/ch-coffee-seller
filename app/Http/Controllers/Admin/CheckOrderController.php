<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
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

    public function handleOrder(Request $request)
    {
        $id_order=$request->input('id_order');
        if ($request->input('acceptOrder')) {
            DB::table('orders')->where('id', $id_order)->update(['id_status' => 2]);
            $request->session()->flash('flash_message', "Duyệt đơn hàng thành công!");
            return redirect('/admins/checkorder');
        } elseif ($request->input('declineOrder')) {
            DB::table('order_details')->where('id_order',$id_order)->delete();
            DB::table('orders')->delete($id_order);
            $request->session()->flash('flash_message', "Huỷ đơn hàng thành công!");
            return redirect('/admins/checkorder');
        }
    }
}
