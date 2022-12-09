<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Loan\RepaymentAmount;
use App\Http\Requests\StoreRepaymentAmountRequest;
use App\Http\Requests\UpdateRepaymentAmountRequest;

class RepaymentAmountController extends Controller
{
    public function index()
    {
        $allRepaymentamount = Repaymentamount::get();

        return view('administrator.allRepaymentamount', compact('allRepaymentamount'));
    }

    public function create()
    {
        return view('administrator.createRepaymentamount');
    }

    public function store(StoreRepaymentAmountRequest $request)
    {
        $validatedData = $request->validated();

        Repaymentamount::create([
            'minamount' => floatval($request->minamount),
            'maxamount' => floatval($request->maxamount),
            'description' => $request->description,
        ]);

        return back()->with('success', 'Grille enregistrée avec succès ! :-)');
    }

    public function edit($id)
    {
        $editRepaymentamount = Repaymentamount::select('id', 'minamount', 'maxamount', 'description')->findOrFail($id);

        return view('administrator.editRepaymentamount', compact('editRepaymentamount'));
    }

    public function update(UpdateRepaymentAmountRequest $request, $id)
    {
        $validatedData = $request->validated();

        Repaymentamount::whereId($id)->update([
            'minamount' => floatval($request->minamount),
            'maxamount' => floatval($request->maxamount),
            'description' => $request->description,
        ]);

        return redirect()->route('allrepaymentamount')->with('success', 'Grille modifié avec succès ! :-)');
    }

    public function destroy($id)
    {
        $singleRepaymentamount = Repaymentamount::findOrFail($id);
        $singleRepaymentamount->delete();

        return redirect()->route('allrepaymentamount')->with('success', 'Grille supprimé avec succès ! :-)');
    }
}
