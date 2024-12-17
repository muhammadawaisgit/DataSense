<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterAdmin\AuthController;
use App\Http\Controllers\MasterAdmin\DashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\User\UserDashboardController;
Route::get('/', function () {
    return redirect()->route('user.login');
});

// Master Admin Routes
Route::prefix('master-admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('master-admin.login');
    });

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('master-admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('master-admin.login');

    Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('master-admin.signup');
    Route::post('/signup', [AuthController::class, 'signup'])->name('master-admin.signup');

    Route::middleware(['master-admin'])->group(function () {
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

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');

    Route::middleware(['user-admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/add-user', [AdminDashboardController::class, 'addUser'])->name('admin.add-user');
        Route::post('/add-user', [AdminDashboardController::class, 'insertUser'])->name('admin.insert-add-user');
        Route::get('/edit-user/{id}', [AdminDashboardController::class, 'editUser'])->name('admin.edit-user');
        Route::post('/edit-user/{id}', [AdminDashboardController::class, 'updateUser'])->name('admin.edit-user');
        Route::delete('/delete-user/{id}', [AdminDashboardController::class, 'deleteUser'])->name('admin.delete-user');

        Route::get('/appearance-settings', [AdminDashboardController::class, 'appearanceSettings'])->name('admin.appearance-settings');
        Route::post('/appearance-settings', [AdminDashboardController::class, 'updateAppearanceSettings'])->name('admin.appearance.settings.update');

        Route::get('/fields-settings', [AdminDashboardController::class, 'fieldsSettings'])->name('admin.fields-settings');
        Route::post('/fields-settings', [AdminDashboardController::class, 'updateFieldsSettings'])->name('admin.fields-settings.update');

        Route::get('/custom-ads-settings', [AdminDashboardController::class, 'customAdsSettings'])->name('admin.custom-ads-settings');
        Route::post('/custom-ads-settings', [AdminDashboardController::class, 'updateCustomAdsSettings'])->name('admin.custom-ads-settings.update');
    });

    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// User Routes
Route::prefix('user')->group(function () {
    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [UserAuthController::class, 'login'])->name('user.login');

    Route::middleware(['user-auth'])->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
        Route::post('/search-result', [UserDashboardController::class, 'searchResult'])->name('user.search-result');
        Route::get('/customer-details/{id}', [UserDashboardController::class, 'customerDetails'])->name('user.customer-details');
        Route::get('/edit-customer/{id}', [UserDashboardController::class, 'editCustomer'])->name('user.edit-customer');
        Route::post('/update-customer/{id}', [UserDashboardController::class, 'updateCustomer'])->name('user.update-customer');
    });

    Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
});

require __DIR__.'/auth.php';
