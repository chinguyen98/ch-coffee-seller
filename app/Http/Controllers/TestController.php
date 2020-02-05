<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Coffee;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $brand = Coffee::find(10)->brand;
        return $brand->name;
    }
}
