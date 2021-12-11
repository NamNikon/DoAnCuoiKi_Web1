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

Route::get('/admin/product-list', function () {
    return view('admin/mainLayout');
});

Route::get('/admin/product-add-new', function () {
    return view('admin/mainLayout');
});


Route::get('/admin/login', function () {
    return view('admin/auth/login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
