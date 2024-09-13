<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\WebController@home')->name('welcome');
Route::get('/about-us', 'App\Http\Controllers\WebController@about_us')->name('about-us');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products');
Route::get('/products/{slug}', \App\Livewire\Product::class)->name('products.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
