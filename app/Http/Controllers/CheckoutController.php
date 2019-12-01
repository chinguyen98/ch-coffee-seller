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
        DB::table('orders')->insert(['id_guest' => $request->session()->getId(), 'id_shipping_info' => $request->input('shipping_info')]);
        $id_order = DB::table('orders')->where('id_guest', $request->session()->getId())->first(['id']);
        $cart = $request->input('cart'); //String
        $cartList = json_decode($cart, true);
        foreach ($cartList as $item) {
            foreach ($item as $id_coffee => $quantity) {
                $price = DB::table('coffees')->find($id_coffee, ['price']);
                DB::table('order_details')->insert(['id_order' => $id_order->id, 'id_coffee' => $id_coffee, 'quantity' => $quantity, 'price' => $price->price]);
            }
        }
        $order = array();
        $order['name'] = $request->input('name');
        $order['email'] = $request->input('email');
        $order['address'] = $request->input('address');
        $order['phone_number'] = $request->input('phone_number');
        $order['status'] = 1;
        $request->session()->put('order', $order);

        return redirect('/orderStatus');
    }
}
