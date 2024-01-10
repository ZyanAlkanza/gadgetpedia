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

Route::resource('/', HomeController::class);
Route::resource('/dashboard', DashboardController::class);
Route::resource('/user', UserController::class);
Route::resource('/phone', PhoneController::class);
Route::resource('/order', OrderController::class);
