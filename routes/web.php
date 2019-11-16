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

Route::get('/admins/register', 'Admin\Auth\RegisterController@showRegisterForm');

Route::post('/admins/register', 'Admin\Auth\RegisterController@register')->name('admin.register');

Route::get('/admins/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');

Route::post('/admins/login', 'Admin\Auth\LoginController@login')->name('admin.login.submit');

Route::post('/admins/logout', 'Admin\Auth\LoginController@logout');

Route::get('/admins/home', 'Admin\AdminsController@index')->name('admin.home');

Route::group(['prefix' => 'admins/staffs', 'middleware' => ['isSuperAdmin', 'auth:admin']], function () {
    Route::get('/', 'Admin\StaffManagerController@index');
});
