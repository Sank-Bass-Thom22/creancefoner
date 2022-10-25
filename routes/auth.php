<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::get('logindebtor', [LoginController::class, 'showLoginDebForm'])
        ->name('logindebtor');

    Route::post('login', [LoginController::class, 'authenticate']);

    Route::post('logindebtor', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LogoutController::class, 'logout'])
        ->name('logout');
});
