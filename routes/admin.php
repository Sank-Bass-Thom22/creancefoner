<?php

use App\Http\Controllers\Administrator\AdministratorController;
use App\Http\Controllers\Administrator\EmployerController;
use App\Http\Controllers\Administrator\DebtorController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('superadmin')->group(function () {
        Route::get('alladminsup', [AdministratorController::class, 'index'])
            ->name('alladminsup');

        Route::get('registeradminsup', [AdministratorController::class, 'create'])
            ->name('registeradminsup');

            Route::post('registeradminsup', [AdministratorController::class, 'store']);
    });
});

Route::middleware('auth')->group(function () {
    Route::middleware('superandsimple')->group(function () {
        Route::get('allemployer', [EmployerController::class, 'index'])
            ->name('allemployer');

        Route::get('registeremployer', [EmployerController::class, 'create'])
            ->name('registeremployer');

            Route::post('registeremployer', [EmployerController::class, 'store']);

        Route::get('alldebtor', [DebtorController::class, 'index'])
            ->name('alldebtor');

        Route::get('registerdebtor', [DebtorController::class, 'create'])
            ->name('registerdebtor');

            Route::post('registerdebtor', [DebtorController::class, 'store']);
    });
});
