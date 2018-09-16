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
use App\Order;
use App\JsonDecoder;


Route::get('/', function () {
    return view('index')->with('title', 'Index');
});

Route::get('/store', 'StoreController@Catalogue');
Route::get('/store/product/{id}', 'StoreController@Product');
Route::get('/store/category/{category}', 'StoreController@CategoryCatalogue');
Route::get('/store/brand/{brand}', 'StoreController@BrandCatalogue');


Route::get('/basket', 'BasketController@Basket');
Route::get('/add/{id}', 'BasketController@AddToBasket');
Route::get('/delete/{id}', 'BasketController@DeleteFromBasket');
Route::get('/update/{id}', 'BasketController@UpdateItem');
Route::get('/delete', 'BasketController@DeleteBasket');

Route::get('/checkout', function () {
    return view('checkout')->with('title', 'Checkout');
});

Route::get('/login', 'LogInController@CreatePage');
Route::post('/login','LogInController@LogIn');

Route::get('/new-account', function () {
    return view('newaccount')->with('title', 'New Account');
});

Route::get('/invoice/{id}', function () {
    return view('checkout')->with('title', 'Checkout');
});

Route::get('/admin', function () {

    $outstanding = Order::CountUnshipped();
    $processed = Order::CountShipped();

    $title = 'Admin';

    return view('admin', compact('outstanding','processed','title'));
});

Route::get('/admin/account-search', function () {

    $search = User::SearchUser('Frederick');

    dd($search);

    return view('accountsearch')->with('title', 'Account Search');
});

Route::get('/admin/order-search', function () {

    $search = Order::SearchOrder(2);

    dd($search);

    return view('ordersearch')->with('title', 'Order Search');
});

Route::get('/admin/outstanding-orders', function () {

    $orders = Order::OutstandingOrders();

    $title = 'Outstanding Orders';

    return view('orders', compact('orders', 'title'));
});

Route::get('/admin/create-staff', 'StaffController@CreatePage');
Route::post('/admin/create-staff', 'StaffController@CreateStaff');


Route::get('/admin/staff-search', function () {
    return view('staffsearch')->with('title', 'Staff Search');
});

Route::get('/admin/create-product', 'ProductController@CreatePage');
Route::post('/admin/create-product', 'ProductController@CreateProduct');

Route::get('/admin/product-search', function () {

    $search = Products::SearchProduct('Paper');

    dd($search);

    return view('productsearch')->with('title', 'Product Search');
});

Route::get('/admin/product-search/edit-product', function () {
    return view('editproduct')->with('title', 'Edit Product');
});

Route::get('/account', 'AccountController@Account');

Route::get('/account/order/{id}', function ($id) {

});

Route::get('/account/edit-details', 'AccountController@EditDetails');
Route::post('/account/edit-details', 'AccountController@UpdateDetails');

Route::get('/account/change-password', 'AccountController@ChangePassword');
Route::post('/account/change-password', 'AccountController@UpdatePassword');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
