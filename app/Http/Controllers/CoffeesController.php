<?php

namespace App\Http\Controllers;

use App\Brand;
use App\CoffeeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoffeesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() //GET REQUEST
	{
		$brands = Brand::all();

		$menu_types = CoffeeType::with('coffees')->get();

		$coffee_types = array();

		foreach ($brands as $brand) {
			$type = DB::select('select distinct coffee_types.name, coffee_types.id from coffee_types join coffees on coffee_types.id=coffees.id_type join brands on brands.id=coffees.id_brand where coffees.id_brand= ?', [$brand->id]);
			$coffee_types[$brand->id] = $type;
		}

		return view('coffees/index')->with(['title' => 'Sản phẩm', 'coffeeactive' => 'active', 'brands' => $brands, 'coffee_types' => $coffee_types, 'menu_types' => $menu_types]);
	}

	public function getCoffeesByBrandAndType(Request $request)
	{
		$id_brand = $request->query('brand');
		$id_coffee_type = $request->query('type');

		$brand = DB::table('brands')->where('id', $id_brand)->first();
		$coffee_type = DB::table('coffee_types')->where('id', $id_coffee_type)->first();

		$coffees = DB::table('coffees')->where('id_brand', $brand->id)->where('id_type', $coffee_type->id)->get();

		return view('coffees/brandandtype')->with(['title' => $coffee_type->name . ' ' . $brand->name, 'coffeeactive' => 'active', 'brand' => $brand, 'coffee_type' => $coffee_type, 'coffees' => $coffees]);
	}

	public function getCoffeesByType(Request $request)
	{
		$id_type = $request->query('type');

		$type = DB::table('coffee_types')->where('id', $id_type)->first();
		$coffees = DB::table('coffees')->where('id_type', $type->id)->get();

		return view('coffees/coffeesbytype')->with(['title' => $type->name, 'coffeeactive' => 'active', 'type' => $type, 'coffees' => $coffees]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$coffee = DB::table('coffees')->where('id', $id)->first();
		$brand = DB::table('brands')->where('id', $coffee->id_brand)->first();
		$coffee_type = DB::table('coffee_types')->where('id', $coffee->id_type)->first();
		$unit = DB::table('units')->where('id', $coffee->id_unit)->first();
		$relateBrandCoffees = DB::table('coffees')->where('id_brand', $brand->id)->get()->random(5);
		return view('coffees/coffee')->with(['title' => $coffee->name, 'coffeeactive' => 'active', 'coffee' => $coffee, 'brand' => $brand, 'coffee_type' => $coffee_type, 'unit' => $unit, 'relateBrandCoffees' => $relateBrandCoffees]
		);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
