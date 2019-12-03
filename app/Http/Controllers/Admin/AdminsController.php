<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $order_approvals_count = DB::table('orders')->where('id_status', 1)->count();
        return view('admin/home')->with('order_count', $order_approvals_count);
    }
}
