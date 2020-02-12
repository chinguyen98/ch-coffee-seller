<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Coffee;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        // $brand = Coffee::find(10)->brand;
        // return $brand->name;

        // $brands = Brand::all();
        // foreach ($brands as $brand) {
        //     echo $brand->name . ",";
        // }

        // $coffees = Coffee::all();
        // $coffees = $coffees->reject(function ($coffee) {
        //     return $coffee->price < 1000000;
        // });
        // foreach ($coffees as $coffee) {
        //     echo $coffee->price . ",";
        // }

        // Coffee::chunk(5, function ($coffees) {
        //     foreach ($coffees as $coffee) {
        //         echo $coffee->id . ',';
        //     }
        //     echo "End!";
        // });

        // $coffeesWithSubquery = Coffee::addSelect(['brand_name' => Brand::select('name')->whereColumn('id', 'id_brand')])->get();
        // foreach ($coffeesWithSubquery as $item) {
        //     echo $item->brand_name;
        // }

        // $coffee = Brand::find(1)->coffees()->where('id', 4)->first();
        // echo $coffee->name;
    }
}
