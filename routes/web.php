<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
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

Route::get('/', [OrderController::class, 'index']);
Route::get('/invoice/{id}', [OrderController::class, 'struk']);
Route::post('/checkout', [OrderController::class, 'checkout']);
Route::post('/midtrans-callback', [OrderController::class, 'callback']);

Route::get('cart', [ProdukController::class, 'showCartTable']);
Route::get('/home', [ProdukController::class, 'home']);

Route::get('add-to-cart/{id}', [CartController::class, 'addToCart']);
Route::delete('remove-from-cart', [CartController::class, 'removeCartItem']);
Route::get('/clear-cart', [CartController::class, 'clearCart']);
