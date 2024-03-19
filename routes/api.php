<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('company', CompanyController::class);
Route::apiResource('order', OrderController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('employee', EmployeeController::class);
