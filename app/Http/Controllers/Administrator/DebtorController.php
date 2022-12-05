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
        $allDebtor = Debtor::where('role', 'Debtor')
            ->orderBy('firstname', 'ASC')->get();
        $message = 'Il n\'y a aucun redevable enregistré.';

        return view('administrator.allDebtor', compact(['allDebtor', 'message']));
    }

    public function create()
    {
        $allService = Debtor::where('role', 'Employer')->orderBy('servicename', 'asc')->select('servicename', 'serviceindex')->get();

        return view('administrator.registerDebtor', compact('allService'));
    }

    public function store(StoreDebtorRequest $request)
    {
        $credentialsValidated = $request->validated();
        //$password = STR::random(8);
        $password = "12345678";

        $id_debtor = Debtor::insertGetId([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'matricule' => $request->matricule,
            'debtorindex' => $request->serviceindex,
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
        $debtorProfile = Debtor::find($id);
        $allServices = Debtor::where('role', 'Employer')->select('servicename', 'serviceindex')->orderBy('servicename', 'ASC')->get();

        return view('administrator.editDebtor', compact(['debtorProfile', 'allServices']));
    }

    public function update(UpdateDebtorRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'firstname' => ucwords(strlower($request->firstname)),
            'lastname' => ucwords(strlower($request->lastname)),
            'email' => strtolower($request->email),
            'telephone' => $request->telephone,
            'matricule' => $request->matricule,
            'debtorindex' => $request->serviceindex,
        ]);
        return redirect()->route('showdebtor', $id)->with('success', 'Informations modifiées avec succès! :-)');
    }

    public function regenerate($id)
    {
        $newPassword = Str::random(8);

        Debtor::whereId($id)->update([
            'password' => Hash::make($newPassword),
        ]);

        return redirect()->route('showdebtor', $id)->with('success', 'Succès! Le nouveau mot de passe est : ' . $newPassword);
    }

    public function destroy($id)
    {
        $debtorProfile = Debtor::find($id);
        $debtorProfile->delete();

        return redirect()->route('alldebtor')->with('success', 'Redevable supprimé avec succès!');
    }
}
