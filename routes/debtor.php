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

        Route::get('resetdebtorsaboutinfo/{resource}', [UsrDebtorController::class, 'create'])
            ->name('resetdebtorsaboutinfo');

        Route::post('resetfullname', [UsrDebtorController::class, 'resetfullname'])
            ->name('resetfullname');

        Route::post('resetemail', [UsrDebtorController::class, 'resetemail'])
            ->name('resetemail');

        Route::post('resettelephone', [UsrDebtorController::class, 'resettelephone'])
            ->name('resettelephone');

        Route::post('resetmatricule', [UsrDebtorController::class, 'resetmatricule'])
            ->name('resetmatricule');

        Route::post('resetpassword', [UsrDebtorController::class, 'resetpassword'])
            ->name('resetpassword');
    });
});
