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
        Route::get('myemployes', [EmpEmployerController::class, 'index'])
            ->name('myemployes');

        Route::get('myemployeloans/{id}', [EmpLoanController::class, 'loans'])
            ->name('myemployeloans');

        Route::get('myemployerepayments/{id}', [EmpRepaymentController::class, 'repayments'])
            ->name('myemployerepayments');

        Route::get('documents', [EmpDocumentController::class, 'show'])
            ->name('documents');

        Route::get('resetemployer/{id}', [EmpEmployerController::class, 'reset'])
            ->name('resetemployer');

        Route::get('resetemployerpassword', [EmpEmployerController::class, 'resetpassword'])
            ->name('resetemployerpassword');

        Route::post('resetemployer/{id}', [EmpEmployerController::class, 'update']);

        Route::post('resetemployerpassword', [EmpEmployerController::class, 'updatepassword']);

        Route::get('emp-repporting', [EmpEmployerController::class, 'repporting'])
            ->name('emp-repporting');
    });
});
