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
use App\User;
use App\Admin;
use App\JsonDecoder;


Route::get('/', function () {

    return view('index')->with('title', 'Index');
});

Route::get('/store', function () {

    $products = Products::ListProducts();

    $title = 'Store';

    return view('store',compact('products','title'));
});

Route::get('/store/product/{id}', function ($id) {

    $product = Products::GetProduct($id);

    return view('product',compact('product'));
});

Route::get('/store/category/{category}', function ($category) {

    $products = Products::GetCategory($category);

    $title = 'Store';

    return view('store',compact('products','title'));
});

Route::get('/store/brand/{brand}', function ($brand) {

    $products = Products::GetBrand($brand);

    $title = 'Store';

    return view('store',compact('products','title'));
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

    $outstanding = Admin::CountUnshipped();
    $processed = Admin::CountShipped();

    $title = 'Admin';

    return view('admin', compact('outstanding','processed','title'));
});

Route::get('/admin/account-search', function () {
    return view('accountsearch')->with('title', 'Account Search');
});

Route::get('/admin/order-search', function () {
    return view('ordersearch')->with('title', 'Order Search');
});

Route::get('/admin/outstanding-orders', function () {

    $orders = Admin::OutstandingOrders();

    $title = 'Outstanding Orders';

    return view('orders', compact('orders', 'title'));
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

    $account_info = User::AccountInfo(2);
    $account_orders = User::OrderItems(2);

    $title = 'Account';

    return view('account', compact('account_info','account_orders','title'));
});

Route::get('/account/order/{id}', function ($id) {

});

Route::get('/account/edit-details', function () {

    $account_info = User::AccountInfo(1);

    $title = 'Edit Details';

    $countries = new JsonDecoder('http://country.io/names.json');

    return view('editdetails', compact('title','account_info','countries'));
});

Route::get('/account/change-password', function () {
    return view('changepassword')->with('title', 'Change Password');
});
