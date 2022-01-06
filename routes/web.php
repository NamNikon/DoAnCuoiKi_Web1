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

Route::get('/active', function () {
    return view('auth.activeRequired');
})->name('activeRequired');

Route::get('/admin/dashboard', function () {
    return view('admin/mainLayout');
});

Route::get('/admin/user-manage', 'AdminController@viewUsers');

Route::post('/admin/changeRole', 'AdminController@changeRole');

Route::get('/admin/delete/user/{id}', 'AdminController@removeUser');

Route::get('/admin/product-list', 'AdminController@viewProducts');

Route::get('/admin/product-add-new', 'AdminController@getCategories');

Route::post('/admin/product-add-new', 'AdminController@addProduct');

Route::get('/admin/login', function () {
    return view('admin/auth/login');
});

Route::get('/user', 'PagesController@Index');

Route::get('/search', 'PagesController@SearchProduct');

Route::get('/product/details/{pid}', 'PagesController@DetailsProduct');

Route::get('/product/add-to-cart/{productId}', 'CartController@AddItem')->name('cart.add');
Route::get('/product/remove-to-cart/{productId}', 'CartController@DeleteItem')->name('cart.remove');
Route::get('/payment/checkout', 'CartController@CartDetail')->name('cart.list');
Route::post('/payment/checkout', 'CartController@ProcessCheckout')->name('process.checkout');

Route::get('/account', function () {
    return view('users/account/account');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ADMIN PURCHAGES
Route::get('admin/purchages','AdminController@getPurchages');
Route::post('/admin/changeStatus', 'AdminController@changeStatus');
// ADMIN STATISTICS
Route::get('admin/statistics', function () {
    return view('/admin/mainLayout');
});

Route::post('/admin/statistic/day', 'AdminController@statisticDay');
Route::post('/admin/statistic/month', 'AdminController@statisticMonth');
Route::post('/admin/statistic/year', 'AdminController@statisticYear');
