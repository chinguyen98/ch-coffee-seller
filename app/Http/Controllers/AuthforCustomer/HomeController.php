<?php

namespace App\Http\Controllers\AuthforCustomer;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $orders = Order::with('order_details')->where('id_customer', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        foreach ($orders as $order) {
            $totalPrice = 0;
            foreach ($order->order_details as $item) {
                $item['coffee']  = DB::table('coffees')->where('id', $item->id_coffee)->first(['id', 'name']);
                $totalPrice += $item->price * $item->quantity;
            }
            $order["status"] = DB::table('statuses')->where('id', $order->id_status)->first(['id', 'name']);
            $order["totalPrice"] = $totalPrice;
        }
        return view('customers/home')->with(['title' => 'Tài khoản', 'orders' => $orders]);
    }

    public function updateCustomer(Request $request)
    {
        $uri = URL::previous();
        $user_id = Auth::id();
        $user = Customer::find($user_id);
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');
        $user->save();

        $request->session()->flash('update_notify', 'Cập nhật tài khoản thành công!');
        if ($uri == route('home')) {
            return redirect('/home');
        }
        if ($uri == route('checkout')) {
            return redirect('/checkout');
        }
    }

    public function changeCustomerPassword(Request $request)
    {
        $oldPassword = $request->input('oldPassword');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');

        if (strlen($password) < 8) {
            $request->session()->flash('err-password', 'Vui lòng nhập mật khẩu mới chứa 8 kí tự trở lên!');
            return redirect('/home');
        }

        if ($password != $confirmPassword) {
            $request->session()->flash('err-password', 'Xác nhận mật khẩu không khớp!');
            return redirect('/home');
        }

        if (strlen($password) < 8) {
            $request->session()->flash('err-password', 'Vui lòng nhập mật khẩu chứa 8 kí tự trở lên!');
            return redirect('/home');
        }

        $customer = Customer::find(Auth::user()->id);
        if (!Hash::check($oldPassword, $customer->password)) {
            $request->session()->flash('err-password', 'Mật khẩu cũ không đúng!');
            return redirect('/home');
        }

        $hashPassword = Hash::make($password);
        $customer->password = $hashPassword;
        $customer->save();
        $request->session()->flash('err-password', 'Cập nhật mật khẩu thành công!');
        return redirect('/home');
    }
}
