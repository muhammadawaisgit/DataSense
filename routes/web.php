<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterAdmin\AuthController;
use App\Http\Controllers\MasterAdmin\DashboardController;
use App\Http\Controllers\Admin\AuthController as UserAuthController;


// Master Admin Routes
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
        Route::get('/add-user', [DashboardController::class, 'addUser'])->name('master-admin.add-user');
        Route::post('/add-user', [DashboardController::class, 'insertUserAdmin'])->name('master-admin.insert-add-user');
        Route::get('/edit-user/{id}', [DashboardController::class, 'editUserAdmin'])->name('master-admin.edit-user');
        Route::post('/edit-user/{id}', [DashboardController::class, 'updateUserAdmin'])->name('master-admin.edit-user');
        Route::delete('/delete-user/{id}', [DashboardController::class, 'deleteUserAdmin'])->name('master-admin.delete-user');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('master-admin.logout');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [UserAuthController::class, 'login'])->name('admin.login');

    Route::middleware(['auth:user-admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    });

    Route::get('/logout', [UserAuthController::class, 'logout'])->name('admin.logout');
});

require __DIR__.'/auth.php';
