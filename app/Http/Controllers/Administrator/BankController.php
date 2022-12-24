<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Loan\Bank;
use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Http\Controllers\Controller;

class BankController extends Controller
{
    public function index()
    {
        $allBank = Bank::orderBy('name', 'ASC')->get();

        return view('administrator.allBank', compact('allBank'));
    }

    public function create()
    {
        return view('administrator.createBank');
    }

    public function store(StoreBankRequest $request)
    {
        //
    }

    public function show(Bank $bank)
    {
        //
    }

    public function edit(Bank $bank)
    {
        //
    }

    public function update(UpdateBankRequest $request, Bank $bank)
    {
        //
    }

    public function destroy(Bank $bank)
    {
        //
    }
}
