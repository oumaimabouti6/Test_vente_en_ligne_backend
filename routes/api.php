<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('log-out', [AuthController::class, 'logOut']);


    Route::post('add-order', [OrderController::class, 'addOrder']);
    Route::post('update-order', [OrderController::class, 'updateOrder']);
    Route::delete('delete-order/{order}', [OrderController::class, 'deleteOrder']);
    Route::get('get-orders', [orderController::class, 'getOrder']);
});

Route::get('products/category/{categoryId}', [ProductController::class, 'getByCategory']);
Route::get('get-products', [ProductController::class, 'getAllProduct']);

Route::delete('delete-panier/{panier}', [PanierController::class, 'destroy']);
Route::post('add-panier', [PanierController::class, 'addPanier']);
Route::post('update-panier/{panier}', [PanierController::class, 'updatePanier']);
Route::get('get-paniers', [PanierController::class, 'getAllPaniers']);


Route::get('test-connection', function () {
    return true;
});
Route::post('sign-in', [AuthController::class, 'signIn']);
Route::post('sign-up', [AuthController::class, 'signUp']);
