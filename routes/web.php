<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OperationController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//admin
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('index', [HomeController::class, 'home'])->name('main')->middleware('isAdmin');
Route::get('/admin/product/search', [ProductController::class, 'search'])->name('productsearch')->middleware('isAdmin');
Route::get('admin-search',[OperationController::class, 'productsearch'])->name('admin-search')->middleware('isAdmin');
Route::resource('product_admin', AdminProductController::class)->middleware('isAdmin');
Route::resource('admin', AdminController::class)->middleware('isAdmin');

// user
Route::resource('userproduct', ProductController::class)->middleware('isUser');
Route::get('/user/product/search', [OrderController::class, 'productsearch'])->name('productsearch')->middleware('isUser');
Route::resource('user', UserController::class)->middleware('isUser');
Route::put('/user/card/{id}', [OrderController::class, 'updateProductTouser_id'])->name('updateProductTouser_id')->middleware('isUser');
Route::get('/product',[OrderController::class, 'userProduct'])->name('product')->middleware('isUser');
Route::get('/product_search', [OrderController::class, 'search'])->name('search')->middleware('isUser');
Route::get('/product_show', [OrderController::class, 'showuserproduct'])->name('showuserproduct')->middleware('isUser');
Route::delete('/product_delete/{id}', [OrderController::class, 'updateProductToNull'])->name('delete')->middleware('isUser');



