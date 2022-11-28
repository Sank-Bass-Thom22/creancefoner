<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateFullnameRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Http\Requests\UpdateTelephoneRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    public function index()
    {
        $allEmployer = Debtor::where('role', 'Employer')->select('id', 'servicename')
            ->orderBy('servicename', 'ASC')->get();

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

    public function show($id)
    {
        $showEmployer = Debtor::find($id);
        $countDebtor = Debtor::where('debtorindex', $showEmployer->serviceindex)->count();

        return view('administrator.showEmployer', compact(['showEmployer', 'countDebtor']));
    }

    public function edit($id, $resource)
    {
        $employerProfile = Debtor::select('id', 'servicename', 'email', 'telephone')->find($id);

        return view('administrator.' . $resource, compact('employerProfile'));
    }

    public function updateservicename(UpdateFullnameRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'servicename' => ucfirst(strtolower($request->servicename)),
        ]);

        return redirect()->route('showemployer', $id)->with('success', 'Informations modifiées avec succès! :-)');
    }

    public function updateemail(UpdateEmailRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'email' => strtolower($request->email),
        ]);

        return redirect()->route('showemployer', $id)->with('success', 'Email modifiées avec succès! :-)');
    }

    public function updatetelephone(UpdateTelephoneRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('showemployer', $id)->with('success', 'Numéro de téléphone modifiées avec succès! :-)');
    }

    public function regenerate($id)
    {
        $newPassword = Str::random(8);

        Debtor::whereId($id)->update([
            'password' => Hash::make($newPassword),
        ]);

        return redirect()->route('showemployer', $id)->with('success', 'Succès! Le nouveau mot de passe est : ' . $newPassword);
    }
}
