<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard',  function () {
    return view('admin.index');
})->name('dashboard');

Route::resource('category', 'CategoryController');