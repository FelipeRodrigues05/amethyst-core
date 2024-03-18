<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('company', CompanyController::class)->middleware('api');
Route::apiResource('order', OrderController::class)->middleware('api');
Route::apiResource('product', ProductController::class)->middleware('api');
