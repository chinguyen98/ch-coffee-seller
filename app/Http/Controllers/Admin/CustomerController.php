<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = DB:: table('customers')->get(['id','name']);
        return view('admin/manage/customer/index')->with('customers', $customer);
    }
    public function show($id)
    {
        $customer = DB::table('customers')->where('id', $id)->first();
        return view('admin/manage/customer/detail')->with('customers',$customer);
    }
    
}
