<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffManagerController extends Controller
{
    public function index()
    {
        $staffs = DB::table('admins')->where('role', 0)->get();
        return view('admin/manage/staffs/index')->with(['staffs' => $staffs]);
    }
}
