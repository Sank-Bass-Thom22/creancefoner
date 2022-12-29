<?php

use App\Http\Controllers\Debtor\UsrDebtorController;
use App\Http\Controllers\Debtor\UsrLoanController;
use App\Http\Controllers\Debtor\UsrRateController;
use App\Http\Controllers\Debtor\UsrRepaymentController;
use App\Http\Controllers\Debtor\UsrScheduleController;
use App\Http\Controllers\Debtor\UsrDocumentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('debtor')->group(function () {
        Route::get('myloans', [UsrLoanController::class, 'loans'])
            ->name('myloans');

        Route::get('myrepayments', [UsrRepaymentController::class, 'repayments'])
            ->name('myrepayments');

        Route::get('createsimulation', [UsrScheduleController::class, 'createsimulation'])
            ->name('createsimulation');

        Route::get('defineschedule', [UsrScheduleController::class, 'defineschedule'])
            ->name('defineschedule');

        Route::post('makesimulationwithamount', [UsrScheduleController::class, 'simulatewithamount'])
            ->name('makesimulationwithamount');

        Route::post('makesimulationwithdate', [UsrScheduleController::class, 'simulatewithdate'])
            ->name('makesimulationwithdate');

        Route::post('saveschedule', [UsrScheduleController::class, 'saveschedule'])
            ->name('saveschedule');

        Route::get('resetschedule', [UsrScheduleController::class, 'resetschedule'])
            ->name('resetschedule');

        Route::post('resaveschedule', [UsrScheduleController::class, 'resaveschedule'])
            ->name('resaveschedule');

        Route::get('usefuldocuments', [UsrDocumentController::class, 'show'])
            ->name('usefuldocuments');

        Route::get('resetdebtor/{id}', [UsrDebtorController::class, 'reset'])
            ->name('resetdebtor');

        Route::post('resetdebtor/{id}', [UsrDebtorController::class, 'update']);

        Route::get('resetdebtorpassword', [UsrDebtorController::class, 'resetpassword'])
            ->name('resetdebtorpassword');

        Route::post('resetdebtorpassword', [UsrDebtorController::class, 'updatepassword']);

        Route::get('deb-repporting', [UsrDebtorController::class, 'repporting'])
            ->name('deb-repporting');
    });
});
