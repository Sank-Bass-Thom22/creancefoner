<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('forgot-password', function () {
        return view('auth.forgot-password');
    })->name('forgot-password');

    Route::post('forgot-password', [LoginController::class, 'store']);

    Route::post('login', [LoginController::class, 'authenticate'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('myprofile', [LoginController::class, 'profile'])
        ->name('myprofile');

    Route::get('logout', [LogoutController::class, 'logout'])
        ->name('logout');
});
