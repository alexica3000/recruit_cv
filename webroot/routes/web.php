<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RecruitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('dashboard'));

Route::prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/', [DashboardController::class, 'home'])->name('dashboard');

    Route::middleware(['role:admin'])->group(function() {
        Route::resource('users', UserController::class);
        Route::resource('companies', CompanyController::class);
        Route::resource('recruits', RecruitController::class);
    });

    Route::name('client.')->prefix('client')->middleware(['role:client'])->group(function() {
        Route::get('recruits', [ClientController::class, 'recruits'])->name('recruits');
    });
});
