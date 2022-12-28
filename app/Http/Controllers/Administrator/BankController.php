<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Loan\Bank;
use App\Models\Loan\Repayment;
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
        $validatedData = $request->validated();

        Bank::create([
            'name' => ucwords(strtolower($request->name)),
            'email' => strtolower($request->email),
            'telephone' => $request->telephone,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Banque enregistrée avec succès!');
    }

    public function edit($id)
    {
        $editBank = Bank::find($id);

        return view('administrator.editBank', compact('editBank'));
    }

    public function update(UpdateBankRequest $request, $id)
    {
        $validatedData = $request->validated();

        Bank::whereId($id)->update([
            'name' => ucwords(strtolower($request->name)),
            'email' => strtolower($request->email),
            'telephone' => $request->telephone,
            'description' => $request->description,
        ]);

        return redirect()->route('allbank')->with('success', 'Informations modifiées avec succès!');
    }

    public function destroy($id)
    {
        if (Repayment::where('id_bank', $id)->exists()) {
            return back()->withErrors('Impossible de supprimer cette banque car elle est déjà utilisée pour un remboursement');
        }

        $bank = Bank::find($id);
        $bank->delete();

        return back()->with('success', 'Banque supprimé avec succès!');
    }
}
