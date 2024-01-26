<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::resource('products', ProductController::class);
Route::get('/', ProductController::class .'@index')->name('products.index');
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