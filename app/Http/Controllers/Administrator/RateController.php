<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Loan\Rate;
use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;

class RateController extends Controller
{
    public function index()
    {
        $allRate = Rate::select('id', 'value', 'validity')->orderBy('validity', 'desc')->get();

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

        return back()->with('success', 'Taux enregistré avec succès ! :-)');
    }

    public function show($id)
    {
        $showRate = Rate::select('id', 'value', 'validity', 'description')->findOrFail($id);

        return view('administrator.showRate', compact('showRate'));
    }

    public function edit($id)
    {
        $editRate = Rate::select('id', 'value', 'validity', 'description')->findOrFail($id);

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

        return redirect()->route('showrate', $id)->with('success', 'Taux modifié avec succès ! :-)');
    }

    public function destroy($id)
    {
        $singleRate = Rate::findOrFail($id);
        $singleRate->delete();

        return redirect()->route('allrate')->with('success', 'Taux supprimé avec succès ! :-)');
    }
}
