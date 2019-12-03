<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CheckOrderController extends Controller
{
    public function index()
    {
        $noneCheckOrder = DB::table('orders')->where('id_status', 1)->get();
        return view('admin/manage/orders/checkorder')->with(['orders' => $noneCheckOrder]);
    }
}
