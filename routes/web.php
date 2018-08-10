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
use App\JsonDecoder;


Route::get('/', function () {

    return view('index')->with('title', 'Index');
});

Route::get('/store', function () {

    //$products = Products::IsForSale()->InStock()->get();
    $products = DB::table('products')->where('on_sale','=',1)->where('quantity','>=',0)->get();

    $title = 'Store';

    return view('store',compact('products','title'));
});

Route::get('/store/product/{id}', function ($id) {

    //$product = Products::IsForSale()->find($id);
    $product = DB::table('products')->join('brand_map', 'products.id', '=', 'brand_map.product_id')->join('product_brands', 'product_brands.id','=','brand_map.brand_id')->select('product_brands.name as brand_name','products.*')->where('products.id','=',$id)->get();

    return view('product',compact('product'));
});

Route::get('/store/{category}', function () {
    return view('store')->with('title', 'Category');
});

Route::get('/store/{brand}', function () {

    $brand = DB::table('product_brands');

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

Route::get('/new-account', function () {
    return view('newaccount')->with('title', 'New Account');
});

Route::get('/invoice/{id}', function () {
    return view('checkout')->with('title', 'Checkout');
});

Route::get('/admin', function () {
    return view('admin')->with('title', 'Admin');
});

Route::get('/admin/account-search', function () {
    return view('accountsearch')->with('title', 'Account Search');
});

Route::get('/admin/order-search', function () {
    return view('ordersearch')->with('title', 'Order Search');
});

Route::get('/admin/outstanding-orders', function () {
    return view('orders')->with('title', 'Outstanding Orders');
});

Route::get('/admin/create-staff', function () {
    return view('createstaff')->with('title', 'Create Staff Member');
});

Route::get('/admin/staff-search', function () {
    return view('staffsearch')->with('title', 'Staff Search');
});

Route::get('/admin/create-product', function () {
    return view('createproduct')->with('title', 'Create New Product');
});

Route::get('/admin/product-search', function () {
    return view('productsearch')->with('title', 'Product Search');
});

Route::get('/admin/product-search/edit-product', function () {
    return view('editproduct')->with('title', 'Edit Product');
});

Route::get('/account', function () {

    //session_start();
    //if (!isset($_SESSION['email'])) {header('Location: /login');}

    return view('account')->with('title', 'Account');
});

Route::get('/account/edit-details', function () {

    $title = 'Edit Details';
    $countries = new JsonDecoder('http://country.io/names.json');

    return view('editdetails', compact('title','countries'));
});

Route::get('/account/change-password', function () {
    return view('changepassword')->with('title', 'Change Password');
});
