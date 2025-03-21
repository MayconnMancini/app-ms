<?php

use App\Http\Controllers\ProductController;
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

//Route::apiResource('products', ProductController::class);

Route::prefix('products')->group(function () {

  Route::post('products/store', [ProductController::class, 'store']);
  Route::put('products/update', [ProductController::class, 'update']);

  Route::get('products', [ProductController::class, 'index']);
  Route::get('products/{product}', [ProductController::class, 'show']);

  Route::delete('products/{product}', [ProductController::class, 'destroy']);
});