<?php

use App\Http\Controllers\Administrator\AdministratorController;
use App\Http\Controllers\Administrator\EmployerController;
use App\Http\Controllers\Administrator\DebtorController;
use App\Http\Controllers\Administrator\RateController;
use App\Http\Controllers\Administrator\LoanController;
use App\Http\Controllers\Administrator\RepaymentController;
use App\Http\Controllers\Administrator\RepaymentamountController;
use App\Http\Controllers\Administrator\BankController;
use App\Http\Controllers\Administrator\DocumentController;
use App\Http\Controllers\Administrator\ScheduleController;
use App\Http\Controllers\Administrator\ResearchController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('superadmin')->group(function () {
        Route::get('alladminsup', [AdministratorController::class, 'index'])
            ->name('alladminsup');

        Route::get('registeradminsup', [AdministratorController::class, 'create'])
            ->name('registeradminsup');

        Route::post('registeradminsup', [AdministratorController::class, 'store']);

        Route::get('showadminsup/{id}', [AdministratorController::class, 'show'])
            ->name('showadminsup');

        Route::post('updaterole/{id}', [AdministratorController::class, 'updaterole'])
            ->name('updaterole');

        Route::get('regenerate/{id}', [AdministratorController::class, 'regenerate'])
            ->name('regenerate');

        Route::get('createratesup', [RateController::class, 'create'])
            ->name('createratesup');

        Route::post('storeratesup', [RateController::class, 'store'])
            ->name('storeratesup');

        Route::get('editratesup/{id}', [RateController::class, 'edit'])
            ->name('editratesup');

        Route::post('updateratesup/{id}', [RateController::class, 'update'])
            ->name('updateratesup');

        Route::post('dest.royratesup/{id}', [RateController::class, 'destroy'])
            ->name('destroyratesup');

        Route::get('createrepaymentamountsup', [RepaymentamountController::class, 'create'])
            ->name('createrepaymentamountsup');

        Route::post('storerepaymentamountsup', [RepaymentamountController::class, 'store'])
            ->name('storerepaymentamountsup');

        Route::get('editrepaymentamountsup/{id}', [RepaymentamountController::class, 'edit'])
            ->name('editrepaymentamountsup');

        Route::post('updaterepaymentamountsup/{id}', [RepaymentamountController::class, 'update'])
            ->name('updaterepaymentamountsup');

        Route::get('destroyrepaymentamountsup/{id}', [RepaymentamountController::class, 'destroy'])
            ->name('destroyrepaymentamountsup');
    });
});

Route::middleware('auth')->group(function () {
    Route::middleware('superandsimple')->group(function () {
        Route::get('editadministrator/{id}', [AdministratorController::class, 'edit'])
            ->name('editadministrator');

        Route::get('editadminpassword', [AdministratorController::class, 'editpassword'])
            ->name('editadminpassword');

        Route::post('updateadministrator/{id}', [AdministratorController::class, 'update'])
            ->name('updateadministrator');

        Route::get('deleteadministrator/{id}', [AdministratorController::class, 'destroy'])
            ->name('deleteadministrator');

        Route::post('updateadminpassword', [AdministratorController::class, 'updatepassword'])
            ->name('updateadminpassword');

        Route::get('allemployer', [EmployerController::class, 'index'])
            ->name('allemployer');

        Route::get('registeremployer', [EmployerController::class, 'create'])
            ->name('registeremployer');

        Route::post('registeremployer', [EmployerController::class, 'store']);

        Route::get('allemployes/{serviceindex}', [EmployerController::class, 'show'])
            ->name('allemployes');

        Route::get('editemployer/{id}', [EmployerController::class, 'edit'])
            ->name('editemployer');

        Route::post('updateemployer/{id}', [EmployerController::class, 'update'])
            ->name('updateemployer');

        Route::get('deleteemployer/{id}', [EmployerController::class, 'destroy'])
            ->name('deleteemployer');

        Route::get('empregenerate/{id}', [EmployerController::class, 'regenerate'])
            ->name('empregenerate');

        Route::get('alldebtor', [DebtorController::class, 'index'])
            ->name('alldebtor');

        Route::get('registerdebtor', [DebtorController::class, 'create'])
            ->name('registerdebtor');

        Route::post('registerdebtor', [DebtorController::class, 'store']);

        Route::get('about-repayments/{status}', [DebtorController::class, 'about_repayments'])
            ->name('about-repayments');

        Route::get('editdebtor/{id}', [DebtorController::class, 'edit'])
            ->name('editdebtor');

        Route::post('updatedebtor/{id}', [DebtorController::class, 'update'])
            ->name('updatedebtor');

        Route::get('deletedebtor/{id}', [DebtorController::class, 'destroy'])
            ->name('deletedebtor');

        Route::get('debregenerate/{id}', [DebtorController::class, 'regenerate'])
            ->name('debregenerate');

        Route::get('allrate', [RateController::class, 'index'])
            ->name('allrate');

        Route::get('showrate/{id}', [RateController::class, 'show'])
            ->name('showrate');

        Route::get('allrepaymentamount', [RepaymentamountController::class, 'index'])
            ->name('allrepaymentamount');

        Route::get('showrepaymentamount/{id}', [RepaymentamountController::class, 'show'])
            ->name('showrepaymentamount');

        Route::get('alldocument', [DocumentController::class, 'index'])
            ->name('alldocument');

        Route::get('createdocument', [DocumentController::class, 'create'])
            ->name('createdocument');

        Route::post('storedocument', [DocumentController::class, 'store'])
            ->name('storedocument');

        Route::get('showdocument/{id}', [DocumentController::class, 'show'])
            ->name('showdocument');

        Route::get('editdocument/{id}', [DocumentController::class, 'edit'])
            ->name('editdocument');

        Route::post('updatedocument/{id}', [DocumentController::class, 'update'])
            ->name('updatedocument');

        Route::post('destroydocument/{id}', [DocumentController::class, 'destroy'])
            ->name('destroydocument');

        Route::get('createloan', [LoanController::class, 'create'])
            ->name('createloan');

        Route::get('createloannow/{id}', [LoanController::class, 'now'])
            ->name('createloannow');

        Route::post('storeloan', [LoanController::class, 'store'])
            ->name('storeloan');

        Route::get('showloan/{id}', [LoanController::class, 'show'])
            ->name('showloan');

        Route::get('editloan/{id}', [LoanController::class, 'edit'])
            ->name('editloan');

        Route::post('updateloan/{id}', [LoanController::class, 'update'])
            ->name('updateloan');

        Route::get('deleteloan/{id}', [LoanController::class, 'destroy'])
            ->name('deleteloan');

        Route::get('createrepayment/{id}', [RepaymentController::class, 'create'])
            ->name('createrepayment');

        Route::post('storerepayment', [RepaymentController::class, 'store'])
            ->name('storerepayment');

        Route::get('showrepayment/{id}', [RepaymentController::class, 'show'])
            ->name('showrepayment');

        Route::get('editrepayment/{id}', [RepaymentController::class, 'edit'])
            ->name('editrepayment');

        Route::post('updaterepayment/{id}', [RepaymentController::class, 'update'])
            ->name('updaterepayment');

        Route::get('deleterepayment/{id}', [RepaymentController::class, 'destroy'])
            ->name('deleterepayment');

        Route::get('createschedule/{id}', [ScheduleController::class, 'create'])
            ->name('createschedule');

        Route::post('storeschedule', [ScheduleController::class, 'store'])
            ->name('storeschedule');

        Route::get('showschedule/{id}', [ScheduleController::class, 'show'])
            ->name('showschedule');

        Route::get('editschedule/{id}', [ScheduleController::class, 'edit'])
            ->name('editschedule');

        Route::post('updateschedule/{id}', [ScheduleController::class, 'update'])
            ->name('updateschedule');

        Route::post('researchdebtor', [ResearchController::class, 'researchdebtor'])
            ->name('researchdebtor');

        Route::get('quick-task', [DebtorController::class, 'quick'])
            ->name('quick-task');

        Route::post('quickstorerepayment', [RepaymentController::class, 'quick_store'])
            ->name('quickstorerepayment');

        Route::get('allbank', [BankController::class, 'index'])
            ->name('allbank');

        Route::get('createbank', [BankController::class, 'create'])
            ->name('createbank');

        Route::post('storebank', [BankController::class, 'store'])
            ->name('storebank');

        Route::get('editbank/{id}', [BankController::class, 'edit'])
            ->name('editbank');

        Route::post('updatebank/{id}', [BankController::class, 'update'])
            ->name('updatebank');

        Route::get('destroybank/{id}', [BankController::class, 'destroy'])
            ->name('destroybank');
    });
});
