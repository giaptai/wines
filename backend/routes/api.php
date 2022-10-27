<?php

use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BrandController;
use App\Http\Controllers\Api\V1\OriginController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\FileUploadController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//api/v1/ -- auth
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'/* ,'middleware' => 'auth:sanctum' */], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('orderdetails', OrderDetailController::class);
    Route::apiResource('brands', BrandController::class);
    Route::apiResource('origins', OriginController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    // Route::post('orderdetails/bulk', ['uses' => 'OrderDetailController@bulkStore']);
});
//api/v1/ 
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::get('brands', [BrandController::class, 'index']);
    Route::get('origins', [OriginController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('brands/{brand}', [BrandController::class, 'show']);
    Route::get('origins/{origin}', [OriginController::class, 'show']);
    Route::get('categories/{category}', [CategoryController::class, 'show']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{product}', [ProductController::class, 'show']);
    Route::post('register', [AuthController::class, 'store']);
    Route::post('login', [AuthController::class, 'index']);
    Route::post('upload', [FileUploadController::class, 'upload']);
});
