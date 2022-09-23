<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'dashboard'])->name('index');

//Product_Routes
Route::resource('product',ProductController::class)->except('destroy');
Route::get('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
//Category_Routes
Route::resource('category', CategoryController::class)->except('destroy');

