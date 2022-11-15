<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Loan\Loan;
use App\Models\Loan\Rate;
use App\Models\Debtor\Debtor;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;

class LoanController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Debtor $debtor)
    {
        $singleDebtor = Debtor::select('id', 'firstname', 'lastname')->findOrFail($debtor);
        $today = date('Y/m/d');
        $allRate = Rate::where('validity', '<=', $today)->select('id', 'value')->orderBy('id', 'desc')->get();

        return view('administrator.createLoan', compact(['singleDebtor', 'allRate']));
    }

    public function store(StoreLoanRequest $request)
    {
        $validatedData = $request->validated();

        Loan::create([
            'amount' => intval($request->amount),
            'startline' => $request->startline,
            'deadline' => $request->deadline,
            'id_rate' => intval($request->rate),
            'id_debtor' => intval($request->debtor),
        ]);

        return redirect()->route('createloan', $debtor)->with('success', 'Prêt enregistré avec succès ! :-)');
    }

    public function show(Loan $loan)
    {
        //
    }

    public function edit(Loan $loan)
    {
        //
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        //
    }

    public function destroy(Loan $loan)
    {
        //
    }
}
