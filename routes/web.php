<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/brandandtype', 'CoffeesController@getCoffeesByBrandAndType');

Route::get('/coffeesbytype', 'CoffeesController@getCoffeesByType');

Route::resource('coffees', 'CoffeesController');

Route::resource('intros', 'IntrosController');

Route::resource('news', 'NewsController');

Route::resource('contacts', 'ContactsController');

Auth::routes();

Route::get('/home', 'AuthforCustomer\HomeController@index')->name('home');
