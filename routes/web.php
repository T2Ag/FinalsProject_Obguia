<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\SiteController;
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


Route::get('/',[SiteController::class, 'base']);
Route::get('/home',[SiteController::class, 'home']);

Route::get('/customers',[CustomerController::class, 'index']);
Route::get('/customers/create',[CustomerController::class, 'create']);
Route::post('/customers/create',[CustomerController::class, 'store']);
Route::get('/customers/{customer}',[CustomerController::class, 'edit']);
Route::post('/customers/{customer}',[CustomerController::class, 'update']);
Route::delete('/customers/delete/{customer}', [CustomerController::class, 'delete']);

Route::get('/menuitems',[MenuItemController::class, 'index']);
Route::get('/menuitems/create',[MenuItemController::class, 'create']);
Route::post('/menuitems/create',[MenuItemController::class, 'store']);
Route::get('/menuitems/{menuitem}',[MenuItemController::class, 'edit']);
Route::post('/menuitems/{menuitem}',[MenuItemController::class, 'update']);
Route::delete('/menuitems/delete/{menuitem}',[MenuItemController::class, 'delete']);

Route::get('/orders',[OrderController::class, 'index']);
Route::get('/orders/create',[OrderController::class, 'create']);
Route::post('/orders/create',[OrderController::class, 'store']);
Route::get('/orders/{order}',[OrderController::class, 'edit']);
Route::post('/orders/{order}',[OrderController::class, 'update']);
Route::delete('/orders/delete/{order}',[OrderController::class, 'delete']);

Route::get('/orderdetails',[OrderDetailController ::class, 'index']);
Route::get('/orderdetails/create',[OrderDetailController ::class, 'create']);
Route::post('/orderdetails/create',[OrderDetailController ::class, 'store']);
Route::get('/orderdetails/{orderdetail}',[OrderDetailController::class, 'edit']);
Route::post('/orderdetails/{orderdetail}',[OrderDetailController::class, 'update']);
Route::delete('/orderdetails/delete/{orderdetail}',[OrderDetailController::class, 'delete']);
