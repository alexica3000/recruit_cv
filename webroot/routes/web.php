<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('dashboard'));

Route::prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/', [DashboardController::class, 'home'])->name('dashboard');
    Route::resource('users', UserController::class);
});
