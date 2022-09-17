<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;



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

Route::get('/admin', [DashboardController::class, 'dashboard'])->name('index');
Route::get('/home', [HomeController::class, 'homepage'])->name('home');
Route::get('/product-list', [ProductController::class, 'index'])->name('productList');


//Admin Login
Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('/admin/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/admin/dashboard', [ProfileController::class,'dashboard'])->name('dashboard');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');


