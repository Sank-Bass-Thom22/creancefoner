<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'show'])
        ->name('login');

    Route::get('forgot-password', [LoginController::class, 'reset'])
        ->name('forgot-password');

    Route::post('login', [LoginController::class, 'authenticate'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [LogoutController::class, 'logout'])
        ->name('logout');
});
