<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        $units = DB::table('units')->get();
        $brands = DB::table('brands')->get();
        $coffee_types = DB::table('coffee_types')->get();
        return view('admin/manage/coffees/detail')->with(['coffee' => $coffee, 'units' => $units, 'brands' => $brands, 'coffee_types' => $coffee_types]);
    }

    public function update(Request $request, $id)
    {
        $coffee_update = $request->all();
        DB::table('coffees')->where('id', $id)->update([
            'name' => $coffee_update["name"],
            'price' => $coffee_update["price"],
            'info' => $coffee_update["info"],
            'specific' => $coffee_update["specific"],
            'expired' => $coffee_update["expired"],
            'capacity' => $coffee_update["capacity"],
            'ingredient' => $coffee_update["ingredient"],
            'id_unit' => $coffee_update["id_unit"],
            'id_brand' => $coffee_update["id_brand"],
            'id_type' => $coffee_update["id_type"],
        ]);

        if ($request->hasFile("image")) {
            $file = $request->image;
            $oldFilePath = public_path("images/coffees/") . $coffee_update["oldImage"];
            File::delete($oldFilePath);
            DB::table('coffees')->where('id', $id)->update([
                'image' => $file->getClientOriginalName()
            ]);
            $file->move(public_path() . '/images/coffees', $file->getClientOriginalName());
        }

        $request->session()->flash('flash_message', 'Cập nhật sản phẩm thành công!');
        $coffee = DB::table('coffees')->where('id', $id)->first();
        return redirect("/admins/coffees/$id")->with(['coffees' => $coffee]);
    }
}
