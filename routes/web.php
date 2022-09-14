<?php

use Illuminate\Support\Facades\Route;

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

//Welcome PHizza Hut to All Users
Route::get('/', 'WelcomeController@index');

// pizza detail page for guest
Route::get('guest/pizza/{id}', 'PizzaController@index_guest');

// pizza detail page for member
Route::get('pizza/{id}', 'PizzaController@index_user');

// pizza detail page for admin
Route::get('admin/pizza/{id}', 'PizzaController@index_admin');

// add pizza (create pizza)
Route::get('admin/create', 'PizzaController@create');
// store pizza (save to database)
Route::post('/admin', 'PizzaController@store');

// edit pizza (create pizza)
Route::get('admin/edit/{id}', 'PizzaController@edit');
// update pizza (save to database)
Route::post('admin/update/{id}', 'PizzaController@update');
Route::put('admin/update/{id}', 'PizzaController@update');

// display to delete pizza
Route::get('admin/delete/{id}', 'PizzaController@delete');

// destroy or delete pizza from database
Route::post('admin/destroy/{id}', 'PizzaController@destroy');
Route::delete('admin/destroy/{id}', 'PizzaController@destroy');

// Order with qty
Route::post('pizza/{id}', 'OrderController@store');

// View Cart Page
Route::get('viewcart', 'OrderController@index');

// Update Quantity
Route::post('viewcart/update/{id}', 'OrderController@update');
Route::put('viewcart/update/{id}', 'OrderController@update');

// Delete From Cart

Route::post('viewcart/delete/{id}', 'OrderController@destroy');
Route::delete('viewcart/delete/{id}', 'OrderController@destroy');

// Checkout
Route::get('checkout', 'OrderController@checkout');

// View Transaction History
Route::get('history', 'HistoryController@index');
Route::get('history/{id}', 'HistoryController@detail');

// View All User for Admin
Route::get('admin/viewuser', 'AdminController@view_user');

// View All User Transaction
Route::get('admin/usertrans', 'AdminController@trans');
Route::get('admin/usertrans/{id}', 'AdminController@trans_detail');

Auth::routes();

// View Member Page
Route::get('/home', 'HomeController@index')->name('home');

// View Admin Page
Route::get('/admin', 'AdminController@index')->name('admin');

// Search for all user
Route::get('/search', 'WelcomeController@search');

// Search for Member and Admin
Route::get('/search', 'HomeController@search');