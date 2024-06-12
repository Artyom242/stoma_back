<?php

use App\Http\Controllers\Api\ApplicationsController;
use App\Http\Controllers\Api\StickyHeaderController;
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

Route::get('/stickyHeader', [StickyHeaderController::class, 'index'])->name('StickyHeader');
Route::get('/applications', [ApplicationsController::class, 'index']);
