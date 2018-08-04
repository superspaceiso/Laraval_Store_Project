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

use App\Products;

Route::get('/', function () {  
    return view('index')->with('title', 'Index');
});

Route::get('/store', function () {
  
    $products = Products::IsForSale()->get();
    $title = 'Store';
    
    return view('store',compact('products','title'));
});

Route::get('/store/product/{id}', function ($id) {
  
    $product = Products::IsForSale()->find($id);
    
    return view('product',compact('product'));
});

Route::get('/store/brand/{category}', function () {
    return view('store')->with('title', 'Category');
});

Route::get('/store/brand/{brand}', function () {
    return view('store')->with('title', 'Brand');
});

Route::get('/basket', function () {
    return view('basket')->with('title', 'Basket');
});

Route::get('/checkout', function () {
    return view('checkout')->with('title', 'Checkout');
});

Route::get('/admin', function () {
    return view('admin')->with('title', 'Admin');
});

Route::get('/account', function () {
    return view('account')->with('title', 'Account');
});
