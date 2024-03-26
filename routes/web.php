<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/user/trash', [UserController::class, 'trash']);
Route::get('user/restore/{id?}',[UserController::class, 'restore']);
Route::get('user/deletepermanently/{id?}', [UserController::class, 'deletepermanently']);

Route::get('/phone/trash', [PhoneController::class, 'trash']);
Route::get('phone/restore/{id?}', [PhoneController::class, 'restore']);
Route::get('phone/deletepermanently/{id?}', [PhoneController::class, 'deletepermanently']);

Route::get('/order/trash', [OrderController::class, 'trash']);
Route::get('order/restore/{id?}', [OrderController::class, 'restore']);
Route::get('order/deletepermanently/{id?}', [OrderController::class, 'deletepermanently']);

Route::get('/', [HomeController::class, 'index'])->name('home.home');
Route::get('/detail/{id}', [HomeController::class, 'show']);

Route::resource('/dashboard', DashboardController::class);
Route::resource('/user', UserController::class);
Route::resource('/phone', PhoneController::class);
Route::resource('/order', OrderController::class);
