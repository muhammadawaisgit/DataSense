<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterAdmin\AuthController;
use App\Http\Controllers\MasterAdmin\DashboardController;

Route::prefix('master-admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('master-admin.login');
    });

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('master-admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('master-admin.login');

    Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('master-admin.signup');
    Route::post('/signup', [AuthController::class, 'signup'])->name('master-admin.signup');

    Route::middleware(['auth:master-admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('master-admin.dashboard');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('master-admin.logout');
});

require __DIR__.'/auth.php';
