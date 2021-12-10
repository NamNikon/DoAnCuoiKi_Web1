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

Route::get('/', 'PagesController@Index');

Route::get('/admin/dashboard', function () {
    return view('admin/mainLayout');
});

Route::get('/admin/user-manage', 'AdminController@viewUsers');

Route::get('/admin/delete/user/{id}', 'AdminController@removeUser');

Route::post('admin/changeRole', 'AdminController@changeRole');

Route::get('/admin/product-list', 'AdminController@viewProducts');

Route::get('/admin/product-add-new', function () {
    return view('admin/mainLayout');
});

Route::get('/admin/login', function () {
    return view('admin/auth/login');
});

Route::get('/user', function () {
    return view('users/mainLayoutUser');
});

Route::get('/search', function () {
    return view('users/search/searchPage');
});

Route::get('/product/details', function () {
    return view('users/products/productDetails');
});

Route::get('/payment/cart', function () {
    return view('users/payment/cartDetails');
});

Route::get('/payment/checkout', function () {
    return view('users/payment/checkout');
});

Route::get('/account', function () {
    return view('users/account/account');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
