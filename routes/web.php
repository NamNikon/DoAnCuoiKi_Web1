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
Route::get('/404', function () {
    return view('errors.404');
})->name('404');
Route::get('/admin/dashboard', function () {
    return view('admin/mainLayout');
})->middleware('role');

Route::get('/admin/user-manage', 'AdminController@viewUsers')->middleware('role');

Route::get('/admin/delete/user/{id}', 'AdminController@removeUser')->middleware('role');

Route::get('/admin/product-list', 'AdminController@viewProducts')->middleware('role');

Route::get('/admin/product-add-new', 'AdminController@getCategories')->middleware('role');

Route::post('/admin/product-add-new', 'AdminController@addProduct')->middleware('role');

Route::get('/admin/login', function () {
    return view('admin/auth/login');
});

Route::get('/user', 'PagesController@Index');

Route::get('/search', 'PagesController@SearchProduct');

Route::get('/product/details/{pid}', 'PagesController@DetailsProduct');

Route::get('/product/add-to-cart/{productId}', 'CartController@AddItem')->name('cart.add');
Route::get('/product/remove-to-cart/{productId}', 'CartController@DeleteItem')->name('cart.remove');
Route::get('/payment/checkout', 'CartController@CartDetail')->middleware('role')->name('cart.list');
Route::post('/payment/checkout', 'CartController@ProcessCheckout')->name('process.checkout');

Route::get('/account', function () {
    return view('users/account/account');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ADMIN PURCHAGES
Route::get('admin/purchages','AdminController@getPurchages');

// ADMIN STATISTICS
Route::get('admin/statistics', function () {
    return view('/admin/mainLayout');
});
