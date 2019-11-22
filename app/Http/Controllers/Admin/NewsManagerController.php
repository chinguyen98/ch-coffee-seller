<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsManagerController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->get(['id', 'title']);
        return view('admin/manage/news/index')->with('news', $news);
    }


    public function show($id)
    {
        $new = DB::table('news')->where('id', $id)->first();
        return view('admin/manage/news/detail')->with('news',$new);
    }
}
