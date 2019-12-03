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
        $guest_name = $request->input('name');
        $guest_email = $request->input('email');
        $guest_address = $request->input('address');
        $guest_phone = $request->input('phone_number');
        $id_shipping_info = $request->input('shipping_info');

        $id_order = DB::table('orders')->insertGetId([
            'guest_name' => $guest_name,
            'guest_email' => $guest_email,
            'guest_address' => $guest_address,
            'guest_phone' => $guest_phone,
            'id_shipping_info' => $id_shipping_info,
            'created_at' => now()
        ]);

        $cart = $request->input('cart');
        $cartList = json_decode($cart, true);
        foreach ($cartList as $item) {
            foreach ($item as $id_coffee => $quantity) {
                $price = DB::table('coffees')->find($id_coffee, ['price']);
                DB::table('order_details')->insert(['id_order' => $id_order, 'id_coffee' => $id_coffee, 'quantity' => $quantity, 'price' => $price->price]);
            }
        }

        $request->session()->put('orderNotify', (string) $id_order);

        return redirect('/orders');
    }
}
