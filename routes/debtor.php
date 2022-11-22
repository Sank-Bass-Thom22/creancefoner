<?php

use App\Http\Controllers\Debtor\DebtorController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('debtor')->group(function () {
        Route::get('myprofile', [DebtorController::class, 'profile'])
            ->name('myprofile');
    });
});
