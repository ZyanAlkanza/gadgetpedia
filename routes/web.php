<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OutOfStockController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\TransactionController;
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
Route::get('/user/trash', [UserController::class, 'trash'])->middleware('auth');
Route::get('user/restore/{id?}',[UserController::class, 'restore'])->middleware('auth');
Route::get('user/deletepermanently/{id?}', [UserController::class, 'deletepermanently'])->middleware('auth');

Route::get('/phone/trash', [PhoneController::class, 'trash'])->middleware('auth');
Route::get('phone/restore/{id?}', [PhoneController::class, 'restore'])->middleware('auth');
Route::get('phone/deletepermanently/{id?}', [PhoneController::class, 'deletepermanently'])->middleware('auth');

Route::get('/order/trash', [OrderController::class, 'trash'])->middleware('auth');
Route::get('order/restore/{id?}', [OrderController::class, 'restore'])->middleware('auth');
Route::get('order/deletepermanently/{id?}', [OrderController::class, 'deletepermanently'])->middleware('auth');

Route::get('/outofstock', [OutOfStockController::class, 'index'])->name('outofstock')->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home.home');
Route::get('/detail/{id}', [HomeController::class, 'show']);

Route::get('login', [AutentikasiController::class, 'login'])->name('login')->middleware('guest');
Route::post('autentikasi', [AutentikasiController::class, 'autentikasi'])->middleware('guest');
Route::get('logout', [AutentikasiController::class, 'logout']);
Route::get('register', [AutentikasiController::class, 'register'])->middleware('guest');
Route::post('registrasi', [AutentikasiController::class, 'registrasi'])->middleware('guest');

Route::get('buynow/{id?}', [TransactionController::class, 'buynow'])->middleware('auth');
Route::post('checkout', [TransactionController::class, 'checkout'])->middleware('auth');
Route::post('cartcheckout', [TransactionController::class, 'cartcheckout'])->middleware('auth');
Route::get('payment', [TransactionController::class, 'payment'])->middleware('auth');

Route::get('cart',[CartController::class, 'cart'])->middleware('auth');
Route::post('addtocart',[CartController::class, 'addtocart'])->middleware('auth');
Route::get('deletecart/{id}',[CartController::class, 'deletecart'])->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('profile/edit', [UserController::class, 'editprofile'])->middleware('auth');
Route::put('profile/update', [UserController::class, 'updateprofile'])->middleware('auth');

Route::get('transaction', [TransactionController::class, 'status'])->middleware('auth');

Route::resource('/dashboard', DashboardController::class)->middleware('userRole');
Route::resource('/user', UserController::class)->middleware('userRole');
Route::resource('/phone', PhoneController::class)->middleware('userRole');
Route::resource('/order', OrderController::class)->middleware('userRole');
