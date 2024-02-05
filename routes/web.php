<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;


Route::resource('products', ProductController::class);
Route::get('product', ProductController::class .'@index')->name('products.index');
// returns the form for adding a post
Route::get('/product/create', ProductController::class . '@create')->name('products.create');
// adds a post to the database
Route::post('/product', ProductController::class .'@store')->name('products.store');
// returns a page that shows a full post
Route::get('/product/{product}', ProductController::class .'@show')->name('products.show');
// returns the form for editing a post
Route::get('/product/{product}/edit', ProductController::class .'@edit')->name('products.edit');
// updates a post
Route::put('/product/{product}', ProductController::class .'@update')->name('products.update');
// deletes a post
Route::delete('/product/{product}', ProductController::class .'@destroy')->name('products.destroy');

//Login Page
Route::get('/', LoginController::class.'@login')->name('login');
Route::post('loginaksi', LoginController::class.'@loginaksi')->name('loginaksi');
Route::get('index', ProductController::class.'@index')->middleware('auth');

//Logout Page
Route::get('logoutaksi', LoginController::class.'@logoutaksi')->name('logoutaksi')->middleware('auth');

//Regist Page
Route::get('regist', LoginController::class.'@register')->name('regist');
Route::post('addReg', LoginController::class.'@addReg')->name('addReg');