<?php

use App\Http\Controllers\Employer\EmpEmployerController;
use App\Http\Controllers\Employer\EmpDebtorController;
use App\Http\Controllers\Employer\EmpLoanController;
use App\Http\Controllers\Employer\EmpRateController;
use App\Http\Controllers\Employer\EmpRepaymentController;
use App\Http\Controllers\Employer\EmpDocumentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('employer')->group(function () {
        Route::get('myemployes', [EmpEmployerController::class, 'myemployes'])
            ->name('myemployes');

        Route::get('showemploye/{id}', [EmpEmployerController::class, 'show'])
            ->name('showemploye');

        Route::get('myemployeloans/{id}', [EmpLoanController::class, 'loans'])
            ->name('myemployeloans');

        Route::get('myemployerepayments/{id}', [EmpRepaymentController::class, 'repayments'])
            ->name('myemployerepayments');

        Route::get('documents', [EmpDocumentController::class, 'show'])
            ->name('documents');

        Route::get('resetemployersaboutinfo/{resource}', [EmpEmployerController::class, 'create'])
            ->name('resetemployersaboutinfo');

        Route::post('resetservicename', [EmpEmployerController::class, 'resetservicename'])
            ->name('resetservicename');

        Route::post('resetemployeremail', [EmpEmployerController::class, 'resetemployeremail'])
            ->name('resetemployeremail');

        Route::post('resetemployertelephone', [EmpEmployerController::class, 'resetemployertelephone'])
            ->name('resetemployertelephone');

        Route::post('resetemployerpassword', [EmpEmployerController::class, 'resetemployerpassword'])
            ->name('resetemployerpassword');
    });
});
