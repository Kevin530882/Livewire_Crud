<?php

use App\Livewire\Edit;
use App\Livewire\Show;
use App\Livewire\Index;
use App\Livewire\Login;
use App\Livewire\Create;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;


Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');

Route::middleware(['auth'])->group(function () {
    Route::any('logout', Login::class)->name('logout');
    Route::get('/', function () {
        return view('components.layouts.app');
    });
    
    Route::get('/products/create', Create::class)->name('products.create');
    Route::get('/products/{product}/edit', Edit::class)->name('products.edit');
    Route::get('/products', Index::class)->name('products.index');
    Route::get('/products/{product}', Show::class)->name('products.show');
});