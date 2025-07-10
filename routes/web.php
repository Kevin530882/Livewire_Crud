<?php

use App\Livewire\Edit;
use App\Livewire\Show;
use App\Livewire\ProductIndex;
use App\Livewire\Login;
use App\Livewire\Create;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;


Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [Login::class, 'logout'])->name('logout');
    
    Route::get('/', ProductIndex::class)->name('products.index');
    Route::get('/products', ProductIndex::class)->name('products.index');
    Route::get('/products/create', Create::class)->name('products.create');
    Route::get('/products/{product}/edit', Edit::class)->name('products.edit');
    Route::get('/products/{product}', Show::class)->name('products.show');
});