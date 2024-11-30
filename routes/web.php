<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterAdmin\AuthController;

Route::prefix('master-admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('master-admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('master-admin.login');
});

require __DIR__.'/auth.php';
