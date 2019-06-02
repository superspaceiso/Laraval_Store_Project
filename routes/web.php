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

Route::group(['store' => 'admin'], function(){
//Storefront
Route::get('/', 'StoreController@Catalogue');
Route::get('/product/{id}', 'StoreController@Product');
Route::get('/category/{category}', 'StoreController@CategoryCatalogue');
Route::get('/brand/{brand}', 'StoreController@BrandCatalogue');
});
//Basket
Route::get('/basket', 'BasketController@Basket');
Route::get('/add/{id}', 'BasketController@AddToBasket');
Route::get('basket/delete/{id}', 'BasketController@DeleteFromBasket');
Route::get('basket/update/{id}', 'BasketController@UpdateItem');
Route::get('basket/delete', 'BasketController@DeleteBasket');

Route::get('/checkout', function () {
    return view('checkout')->with('title', 'Checkout');
});


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

    $search = User::SearchCustomer('Smith');

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


Route::group(['prefix' => 'admin'], function(){
// Staff Creation
    Route::get('/create-staff', 'StaffController@CreatePage');
    Route::post('/create-staff', 'StaffController@CreateStaff');

//Staff Search
    Route::get('/staff-search', 'StaffController@SearchPage');
    Route::post('/staff-search', 'StaffController@Search');
    Route::get('/staff-search/edit/{id}', 'StaffController@Edit');
    Route::get('/staff-search/delete/{id}', 'StaffController@Delete');

//Product Creation
    Route::get('/create-product', 'ProductController@CreatePage');
    Route::post('/create-product', 'ProductController@CreateProduct');

//Product Search
    Route::get('/product-search', 'ProductController@SearchPage');
    Route::post('/product-search', 'ProductController@Search');
    Route::get('/product-search/edit/{id}', 'ProductController@Edit');
    Route::get('/admin/product-search/delete/{id}', 'ProductController@Delete');
    
//Order Search
	Route::get('/order-search', )
});

Route::group(['prefix' => 'account'], function(){
//Customer Account
    Route::get('/', 'AccountController@AccountPage');

    Route::get('/edit-details', 'AccountController@EditDetails');
    Route::post('//edit-details', 'AccountController@UpdateDetails');
    Route::get('/change-password', 'AccountController@ChangePassword');
    Route::post('/change-password', 'AccountController@UpdatePassword');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
