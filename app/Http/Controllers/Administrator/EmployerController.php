<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    public function index()
    {
        $allEmployer = Debtor::where('role', 'Employer')->orderBy('servicename', 'ASC')->get();

        return view('administrator.allEmployer', compact('allEmployer'));
    }

    public function create()
    {
        return view('administrator.registeremployer');
    }

    public function store(StoreEmployerRequest $request)
    {
        $credentialsValidated = $request->validated();
        $password = Str::random(8);

        Debtor::create([
            'servicename' => $request->servicename,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($password),
            'serviceindex' => (string) Str::uuid(),
            'role' => 'Employer',
        ]);

        return redirect()->route('registeremployer')->with('success', 'Succès! :-) /Password : ' . $password);
    }

    public function show($serviceindex)
    {
        $allEmployes = Debtor::where('debtorindex', $serviceindex)
        ->orderBy('firstname', 'ASC')->get();
        $employer = Debtor::where('serviceindex', $serviceindex)->first();

        return view('administrator.allEmployes', compact(['allEmployes', 'employer']));
    }

    public function edit($id)
    {
        $employerProfile = Debtor::find($id);

        return view('administrator.editEmployer', compact('employerProfile'));
    }

    public function update(UpdateEmployerRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'servicename' => ucwords(strtolower($request->servicename)),
            'email' => strtolower($request->email),
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('allemployer')->with('success', 'Informations modifiées avec succès! :-)');
    }

    public function regenerate($id)
    {
        $newPassword = Str::random(8);

        Debtor::whereId($id)->update([
            'password' => Hash::make($newPassword),
        ]);

        return redirect()->route('allemployer')->with('success', 'Succès! Le nouveau mot de passe est : ' . $newPassword);
    }

    public function destroy($id)
    {
        $employerProfile = Debtor::find($id);

        if (Debtor::where('debtorindex', $employerProfile->serviceindex)->exists()) {
            return back()->withErrors('Veuillez d\abord supprimé les redevables de ces structure.');
        }

        $employerProfile->delete();

        return redirect()->route('allemployer')->with('success', 'Structure supprimée avec succès!');
    }
}
