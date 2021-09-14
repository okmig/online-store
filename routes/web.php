<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('basicAuth');

Route::post('/create/product', [DashboardController::class, 'storeProduct']);
Route::put('/update/product/{id}', [DashboardController::class, 'updateProduct']);
Route::delete('/delete/product/{id}', [DashboardController::class, 'destroyProduct']);

Route::post('/create/category', [DashboardController::class, 'storeCategory']);
Route::put('/update/category/{id}', [DashboardController::class, 'updateCategory']);
Route::delete('/delete/category/{id}', [DashboardController::class, 'destroyCategory']);

Route::post('/create/discount', [DashboardController::class, 'storeDiscount']);
Route::put('/update/discount/{id}', [DashboardController::class, 'updateDiscount']);
Route::delete('/delete/discount/{id}', [DashboardController::class, 'destroyDiscount']);