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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'products','as'=>'products.'], function(){
    Route::get('', [ProductController::class, 'index'])->name('index'); //get all products
    Route::post('', [ProductController::class, 'store']); //create new product
    Route::get('/{product}', [ProductController::class, 'show']); //get product by id
    Route::put('/{product}', [ProductController::class, 'update']); //update product by id
    Route::delete('/{product}', [ProductController::class,'destroy']); //delete product by id
});
