<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\CompanyApiController;
use App\Http\Controllers\API\EmployeeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthApiController::class, 'login'])->middleware('guest');

Route::group(['middleware' => ['auth:sanctum']], function() {
    // Employee
    Route::resource('/employee', EmployeeApiController::class);
    Route::resource('/company', CompanyApiController::class);
});
