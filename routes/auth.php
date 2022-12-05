<?php

use App\Http\Controllers\Auth\LoginOtherController;
// use App\Http\Controllers\Auth\LoginDebtorController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('loginother', [LoginOtherController::class, 'show'])
        ->name('loginother');

    // Route::get('logindebtor', [LoginDebtorController::class, 'show'])
    // ->name('logindebtor');

    Route::post('loginother', [LoginOtherController::class, 'authenticate']);

    // Route::post('logindebtor', [LoginDebtorController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [LogoutController::class, 'logout'])
        ->name('logout');
});
