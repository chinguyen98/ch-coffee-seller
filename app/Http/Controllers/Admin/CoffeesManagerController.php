<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoffeesManagerController extends Controller
{
    public function index()
    {
        $coffees = DB::table('coffees')->get();
        return view('admin/manage/coffees/index')->with(['coffees' => $coffees]);
    }

    public function show($id)
    {
        $coffee = DB::table('coffees')->where('id', $id)->first();
        return view('admin/manage/coffees/detail')->with(['coffee' => $coffee]);
    }
}
