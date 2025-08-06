<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Product\ProductQueryController;
use App\Http\Controllers\API\SystemSetting\SystemSettingController;
use App\Http\Controllers\API\Product\ProductController;



// Route for System Setting
Route::get('/system-setting', [SystemSettingController::class, 'systemSetting']);


// Route for Products Query
Route::post('/order/result', [ProductQueryController::class, 'result']);
Route::post('/order/place', [ProductQueryController::class, 'findSKU']);


// Route for Products
Route::get('/product/list', [ProductController::class, 'index']);
Route::get('/product/show/{id}', [ProductController::class, 'show']);
