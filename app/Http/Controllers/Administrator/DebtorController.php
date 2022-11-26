<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\StoreDebtorRequest;
use App\Http\Requests\UpdateDebtorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DebtorController extends Controller
{
    public function index()
    {
        $allDebtor = Debtor::where('role', 'Debtor')->select('id', 'firstname', 'lastname')
            ->orderBy('firstname', 'ASC')->get();

        return view('administrator.allDebtor', compact('allDebtor'));
    }

    public function create()
    {
        $allService = Debtor::where('role', 'Employer')->orderBy('servicename', 'asc')->select('servicename', 'serviceindex')->get();

        return view('administrator.registerDebtor', compact('allService'));
    }

    public function store(StoreDebtorRequest $request)
    {
        $credentialsValidated = $request->validated();
        $password = STR::random(8);

        $id_debtor = Debtor::insertGetId([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'matricule' => $request->matricule,
            'debtorindex' => $request->debtorindex,
            'password' => Hash::make($password),
            'role' => 'Debtor',
        ]);

        if (isset($errors)) {
            return back();
        }

        session()->put('id_debtor', $id_debtor);
        session()->put('fullname', $request->firstname . ' ' . $request->lastname);

        return redirect()->route('createloan')->with('success', $password);
    }

    public function show($id)
    {
        $showDebtor = Debtor::findOrFail($id);
        $debtorService = Debtor::where('serviceindex', $showDebtor->debtorindex)->first();

        if (session()->has('fullname')) {
            session()->forget('fullname');
        }

        return view('administrator.showDebtor', compact(['showDebtor', 'debtorService']));
    }

    public function edit($id)
    {
        $editDebtor = Debtor::findOrFail($id);
        $allService = Debtor::select('servicename', 'serviceindex')->orderBy('servicename', 'ASC')->get();

        return view('administrator.editDebtor', compact(['editDebtor', 'allService']));
    }

    public function update(UpdateDebtorRequest $request, $id)
    {
        $credentialsValidated = $request->validated();

        Debtor::whereId($debtor)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'matricule' => $request->matricule,
            'debtorindex' => $request->debtorindex,
        ]);

        return redirect()->route('showdebtor', $id)->with('success', 'Redevable modifié avec succès!');
    }

    public function destroy($id)
    {
        //
    }
}
