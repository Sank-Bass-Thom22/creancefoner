<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware(['guest']);

Route::get('dashboard', function () {
    $role = Auth::user()->role;

    switch ($role) {
        case 'SuperAdmin':
            return view('administrator.dashboardSup');
            break;
        case 'SimpleAdmin':
            return view('administrator.dashboardSim');
            break;
        case 'Employer':
            return view('employer.dashboard');
            break;
        case 'Debtor':
            return view('debtor.dashboard');
        default:
            return view('auth.login');
    }
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/employer.php';
require __DIR__ . '/debtor.php';
