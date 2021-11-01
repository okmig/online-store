<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderWebController;
use App\Http\Controllers\SaleWebController;

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

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login')->middleware('authCheck');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register')->middleware('authCheck');
Route::post('/auth/save', [AuthController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/user/profile', [ProfileController::class, 'profileShow'])->name('user.profile')->middleware('authCheck');
Route::post('/user/contact/create/', [ProfileController::class, 'contactCreate'])->name('user.contact.create');
Route::put('/user/contact/update/{id}', [ProfileController::class, 'contactUpdate'])->name('user.contact.update');
Route::delete('/user/contact/delete/{id}', [ProfileController::class, 'contactDelete'])->name('user.contact.delete');

Route::get('/', [IndexController::class, 'index']);

Route::post('/create/order', [OrderWebController::class, 'orderCreate'])->name('create.order');
Route::get('/user/orders', [OrderWebController::class, 'index'])->name('user.orders')->middleware('authCheck');

Route::post('/create/sale', [SaleWebController::class, 'saleCreate'])->name('create.sale');