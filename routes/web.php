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

Route::get('/', function () {
    return view('index');
});

Route::get('/store', function () {
    return view('store');
});

Route::get('/store/product/{id}', function () {
    return view('store');
});

Route::get('/store/brand/{category}', function () {
    return view('store');
});

Route::get('/store/brand/{brand}', function () {
    return view('store');
});

Route::get('/basket', function () {
    return view('basket');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/account', function () {
    return view('account');
});
