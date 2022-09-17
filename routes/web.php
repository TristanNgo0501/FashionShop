<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
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

Route::get('/admin', [DashboardController::class, 'dashboard'])->name('index');
Route::get('/home', [HomeController::class, 'homepage'])->name('home');
Route::get('/product-list', [ProductController::class, 'index'])->name('productList');

Route::get('/admin/blog/bloglist', [BlogController::class,"blogList"]);
Route::get('/admin/blog/create', [BlogController::class,"create"]);
Route::post('/admin/blog/create', [BlogController::class,"Postcreate"]);
Route::get('/admin/blog/edit', [BlogController::class,"edit"]);
Route::post('/admin/blog/edit', [BlogController::class,"Postedit"]);
Route::get('/admin/blog/setstatus', [BlogController::class,"setstatus"]);
Route::get('/admin/blog/delete', [BlogController::class,"delete"]);
Route::get('/admin/blog/comment', [BlogController::class,"commentlist"]);
Route::get('/admin/blog/deletecomment', [BlogController::class,"deletecoment"]);
Route::get('/blog/deletecomment', [BlogController::class,"deletecomentuser"]);
Route::get('/blog', [BlogController::class,"Homeblog"]);
Route::get('/blog/detail', [BlogController::class,"Homeblogdetal"]);
Route::post('/blog/detail', [BlogController::class,"HomeblogAddcomment"]);
Route::get('/blog/view', [BlogController::class,"Homeblogview"]);

