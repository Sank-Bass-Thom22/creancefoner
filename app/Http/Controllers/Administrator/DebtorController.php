<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\StoreDebtorRequest;
use App\Http\Requests\UpdateFullnameRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Http\Requests\UpdateTelephoneRequest;
use App\Http\Requests\UpdateMatriculeRequest;
use App\Http\Requests\UpdateServiceRequest;
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

    public function edit($id, $resource)
    {
        $debtorProfile = Debtor::select('id', 'firstname', 'lastname', 'email', 'telephone', 'matricule')->find($id);
        $allServices = Debtor::where('role', 'Employer')->select('servicename', 'serviceindex')->orderBy('servicename', 'ASC')->get();

        return view('administrator.' . $resource, compact(['debtorProfile', 'allServices']));
    }

    public function updatefullname(UpdateFullnameRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'firstname' => ucfirst($request->firstname),
            'lastname' => ucfirst($request->lastname),
        ]);

        return redirect()->route('showdebtor', $id)->with('success', 'Informations modifiées avec succès! :-)');
    }

    public function updateemail(UpdateEmailRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'email' => strtolower($request->email),
        ]);

        return redirect()->route('showdebtor', $id)->with('success', 'Email modifiées avec succès! :-)');
    }

    public function updatetelephone(UpdateTelephoneRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('showdebtor', $id)->with('success', 'Numéro de téléphone modifiées avec succès! :-)');
    }

    public function updatematricule(UpdateMatriculeRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'matricule' => $request->matricule,
        ]);

        return redirect()->route('showdebtor', $id)->with('success', 'Numéro matricule modifiées avec succès! :-)');
    }

    public function updateservice(UpdateServiceRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'debtorindex' => $request->serviceindex,
        ]);

        return redirect()->route('showdebtor', $id)->with('success', 'Service modifiées avec succès! :-)');
    }

    public function regenerate($id)
    {
        $newPassword = Str::random(8);

        Debtor::whereId($id)->update([
            'password' => Hash::make($newPassword),
        ]);

        return redirect()->route('showdebtor', $id)->with('success', 'Succès! Le nouveau mot de passe est : ' . $newPassword);
    }
}
