<?php

use App\Http\Controllers\clinicController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\priceController;
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

Route::get('/', [mainController::class, 'show'])->name('main');
Route::get('/feedback', [feedbackController::class, 'show'])->name('feedback');
Route::get('/contact', [contactController::class, 'show'])->name('contact');
Route::get('/clinic', [clinicController::class, 'show'])->name('clinic');
Route::get('/price', [priceController::class, 'show'])->name('price');
