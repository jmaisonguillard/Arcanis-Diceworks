<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\WebController@home')->name('welcome');
Route::get('/about-us', 'App\Http\Controllers\WebController@about_us')->name('about-us');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products');
Route::get('/products/{slug}', \App\Livewire\Product::class)->name('products.show');
Route::get('/order/success', 'App\Http\Controllers\OrderController@success')->name('order.success');
Route::get('/order/cancel', 'App\Http\Controllers\OrderController@cancel')->name('order.cancel');
Route::get('/orders', \App\Livewire\Orders::class)->name('orders');
Route::get('/3d', function() {
    return view('3d');
});
Route::get('customize', \App\Livewire\CustomizeDice::class)->name('customize');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
