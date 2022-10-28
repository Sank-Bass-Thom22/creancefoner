<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\StoreDebtorRequest;
use App\Http\Requests\UpdateDebtorRequest;
use Illuminate\Support\Facades\Hash;

class DebtorController extends Controller
{
    public function index()
    {
        $allDebtor = Debtor::where('role', 'Debtor')->select('id', 'firstname', 'lastname')
            ->orderBy('id', 'DESC')->get();

        return view('administrator.allDebtor', compact('allDebtor'));
    }

    public function create()
    {
        $allService = Debtor::select('servicename', 'serviceindex')->orderBy('servicename', 'ASC')->get();

        return view('administrator.registerDebtor', compact('allService'));
    }

    public function store(StoreDebtorRequest $request)
    {
        $credentialsValidated = $request->validated();

        Debtor::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'matricule' => $request->matricule,
            'debtorindex' => $request->debtorindex,
            'password' => Hash::make('12345678'),
            'role' => 'Debtor',
        ]);

        return redirect()->route('registerdebtor')->with('success', 'Redevable enregistré avec succès! :-)');
    }

    public function show(Debtor $debtor)
    {
        $showDebtor = Debtor::findOrFail($debtor);

        return view('', compact('showDebtor'));
    }

    public function edit(Debtor $debtor)
    {
        $editDebtor = Debtor::findOrFail($debtor);
        $allService = Debtor::select('servicename', 'serviceindex')->orderBy('servicename', 'ASC')->get();

        return view('', compact(['editDebtor', 'allService']));
    }

    public function update(UpdateDebtorRequest $request, Debtor $debtor)
    {
        $credentialsValidated = $request->validated();

        Debtor::whereId($debtor)->update($credentialsValidated);

        return redirect()->route('editdebtor', $debtor)->with('success', 'Redevable modifié avec succès!');
    }

    public function destroy(Debtor $debtor)
    {
        //
    }
}
