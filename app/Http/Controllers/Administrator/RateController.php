<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Loan\Rate;
use App\Models\Loan\Loan;
use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;

class RateController extends Controller
{
    public function index()
    {
        $allRate = Rate::orderBy('validity', 'desc')->paginate(10);

        return view('administrator.allRate', compact('allRate'));
    }

    public function create()
    {
        return view('administrator.createRate');
    }

    public function store(StoreRateRequest $request)
    {
        $validatedData = $request->validated();

        Rate::create([
            'value' => floatval($request->value),
            'validity' => $request->validity,
            'description' => $request->description,
        ]);

        return redirect()->route('allrate')->with('success', 'Taux enregistré avec succès ! :-)');
    }

    public function edit($id)
    {
        $editRate = Rate::find($id);

        return view('administrator.editRate', compact('editRate'));
    }

    public function update(UpdateRateRequest $request, $id)
    {
        $validatedData = $request->validated();

        Rate::whereId($id)->update([
            'value' => floatval($request->value),
            'validity' => $request->validity,
            'description' => $request->description,
        ]);

        return redirect()->route('allrate')->with('success', 'Taux modifié avec succès ! :-)');
    }

    public function destroy($id)
    {
        $singleRate = Rate::find($id);

        if (Loan::whete('id_rate', $singleRate->id)->exists()) {
            return back()->with('success', 'Ce taux est déjà appliqué à un prêt.');
        }

        $singleRate->delete();

        return redirect()->route('allrate')->with('success', 'Taux supprimé avec succès ! :-)');
    }
}
