<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/customers', [CustomerController::class, 'getAll']);
Route::post('/customers', [CustomerController::class, 'storeCustomer']);
Route::get('/customers/{customer}', [CustomerController::class, 'getOne']);
Route::patch('/customers/{customer}', [CustomerController::class, 'updateVue']);
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);

Route::get('/orders',[OrderController::class, 'getAll']);
Route::post('/orders', [OrderController::class, 'storeOrder']);
Route::get('/orders/{order}',[OrderController::class, 'getOne']);
Route::patch('/orders/{order}', [OrderController::class, 'updateVue']);
Route::delete('/orders/{order}', [OrderController::class, 'destroy']);

Route::get('/menuitems',[MenuItemController::class, 'getAll']);
Route::post('/menuitems', [MenuItemController::class, 'storeMenuItem']);
Route::delete('/menuitems/{menuitem}', [MenuItemController::class, 'destroy']);

Route::get('/orderdetails',[OrderDetailController::class, 'getAll']);
Route::post('/orderdetails',[OrderDetailController::class, 'storeOrderDetail']);
Route::patch('/orderdetails/{orderdetail}',[OrderDetailController::class, 'updateVue']);
Route::delete('/orderdetails/{orderdetail}',[OrderDetailController::class, 'destroy']);

