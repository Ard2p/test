<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Admin\CategoryController;

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

Route::middleware(['auth:sanctum'])
    ->name('category.')
    ->prefix('category')
    ->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('index');

        Route::post('', [CategoryController::class, 'store'])->name('store');

        Route::get('{category}', [CategoryController::class, 'show'])->name('show');

        Route::put('{category}', [CategoryController::class, 'update'])->name('update');

        Route::delete('{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });
