<?php

use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\UserController;
use App\Http\Controllers\Web\Backend\Product\ProductImportController;
use App\Http\Controllers\Web\Backend\Order\OrderController;
use App\Http\Controllers\Web\Backend\Product\ProductController;
use Illuminate\Support\Facades\Route;

// Route for Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Route for Users Page
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');


// Route for Products
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::patch('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/product/status/{id}', [ProductController::class, 'status'])->name('product.status');
Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


// Route for Product Import
Route::get('/import', [ProductImportController::class, 'index'])->name('products.import.index');
Route::get('/import/file', [ProductImportController::class, 'importFile'])->name('products.import.file');
Route::get('/import/show/{id}', [ProductImportController::class, 'show'])->name('products.import.show');
Route::post('/import', [ProductImportController::class, 'import'])->name('products.import');
Route::delete('/import/delete/{id}', [ProductImportController::class, 'destroy'])->name('products.import.delete');


// Route for Orders
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order/status/{id}', [OrderController::class, 'status'])->name('order.status');
Route::get('/order/show/{id}', [OrderController::class, 'show'])->name('order.show');
Route::delete('/order/destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
