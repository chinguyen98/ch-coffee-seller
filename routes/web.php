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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index');

Route::get('/brandandtype', 'CoffeesController@getCoffeesByBrandAndType');

Route::get('/coffeesbytype', 'CoffeesController@getCoffeesByType');

Route::resource('coffees', 'CoffeesController');

Route::resource('intros', 'IntrosController');

Route::resource('news', 'NewsController');

Route::get('checkout', 'CheckoutController@index')->middleware('checkIfExistOrder')->name('checkout');

Route::post('checkout', 'CheckoutController@requestOrder');

Route::get('orders', 'OrdersController@index');

Route::get('orderstatus', 'OrdersController@showStatus');

Auth::routes();

Route::get('/home', 'AuthforCustomer\HomeController@index')->name('home');

Route::put('/updateCustomer', 'AuthforCustomer\HomeController@updateCustomer');

Route::put('/changeCustomerPassword', 'AuthforCustomer\HomeController@changeCustomerPassword');

Route::get('/admins/register', 'Admin\Auth\RegisterController@showRegisterForm');

Route::post('/admins/register', 'Admin\Auth\RegisterController@register')->name('admin.register');

Route::get('/admins/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');

Route::post('/admins/login', 'Admin\Auth\LoginController@login')->name('admin.login.submit');

Route::post('/admins/logout', 'Admin\Auth\LoginController@logout');

Route::get('/admins/home', 'Admin\AdminsController@index')->name('admin.home');

Route::group(['prefix' => 'admins/checkorder', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'Admin\CheckOrderController@index');
    Route::get('/{id}', 'Admin\CheckOrderController@show');
    Route::post('/handleOrder', 'Admin\CheckOrderController@handleOrder');
});

Route::group(['prefix' => 'admins/coffees', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'Admin\CoffeesManagerController@index');
    Route::get('/create', 'Admin\CoffeesManagerController@create');
    Route::post('/', 'Admin\CoffeesManagerController@store');
    Route::get('/{id}', 'Admin\CoffeesManagerController@show');
    Route::put('/{id}', 'Admin\CoffeesManagerController@update');
    Route::delete('/{id}', 'Admin\CoffeesManagerController@delete');
});

Route::group(['prefix' => 'admins/news', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'Admin\NewsManagerController@index');
    Route::get('/{id}', 'Admin\NewsManagerController@show');
});

Route::group(['prefix' => 'admins/staffs', 'middleware' => ['isSuperAdmin', 'auth:admin']], function () {
    Route::get('/', 'Admin\StaffManagerController@index');
});

Route::group(['prefix' => 'carts'], function () {
    Route::get('/', 'CartsController@index');
});

Route::group(['prefix' => 'admins/ordermanager', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'Admin\OrderController@index');
    Route::get('/{id}', 'Admin\OrderController@detail');
});
Route::group(['prefix' => 'admins/customer', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'Admin\CustomerController@index');
    Route::get('/{id}', 'Admin\CustomerController@show');
});


Route::get('/test', 'TestController@test');
