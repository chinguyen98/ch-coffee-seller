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
			$type = DB::select('select distinct coffee_types.name from coffee_types join coffees on coffee_types.id=coffees.id_type join brands on brands.id=coffees.id_brand where coffees.id_brand= ?', [$brand->id]);
			$coffee_types[$brand->id] = $type;
		}

		return view('coffees/index')->with(['title' => 'Sản phẩm', 'coffeeactive' => 'active', 'brands' => $brands, 'coffee_types' => $coffee_types, 'menu_types' => $menu_types]);
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
		//
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
