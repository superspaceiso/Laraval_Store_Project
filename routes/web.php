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

Route::get('/store/{category}', function () {
    return view('store')->with('title', 'Category');
});

Route::get('/store/{brand}', function () {
    return view('store')->with('title', 'Brand');
});

Route::get('/basket', function () {
    return view('basket')->with('title', 'Basket');
});

Route::get('/checkout', function () {
    return view('checkout')->with('title', 'Checkout');
});

Route::get('/login', function () {
    return view('login')->with('title', 'Log In');
});

Route::get('/invoice/{id}', function () {
    return view('checkout')->with('title', 'Checkout');
});

Route::get('/admin', function () {
    return view('admin')->with('title', 'Admin');
});

Route::get('/admin/accountsearch', function () {
    return view('accountsearch')->with('title', 'Account Search');
});

Route::get('/admin/ordersearch', function () {
    return view('ordersearch')->with('title', 'Order Search');
});

Route::get('/admin/createstaff', function () {
    return view('createstaff')->with('title', 'Create Staff Member');
});

Route::get('/admin/staffsearch', function () {
    return view('staffsearch')->with('title', 'Staff Search');
});

Route::get('/admin/createproduct', function () {
    return view('createproduct')->with('title', 'Create New Product');
});

Route::get('/admin/productsearch', function () {
    return view('productsearch')->with('title', 'Product Search');
});

Route::get('/account', function () {
    return view('account')->with('title', 'Account');
});

Route::get('/account/editdetails', function () {
    return view('editdetails')->with('title', 'Edit Details');
});

Route::get('/account/changepassword', function () {
    return view('changepassword')->with('title', 'Change Password');
});
