<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\UpdateFullnameRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Http\Requests\UpdateTelephoneRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmpEmployerController extends Controller
{
    public function create($resource)
    {
        $id = Auth::user()->id;

        $employerProfile = Debtor::where('id', $id)
            ->select('servicename', 'email', 'telephone')
            ->first();

        return view('employer.' . $resource, compact('employerProfile'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $employerProfile = Debtor::select('servicename', 'email', 'telephone')->find($id);

        return view('employer.profile', compact('employerProfile'));
    }

    public function resetservicename(UpdateFullnameRequest $request)
    {
        $id = Auth::user()->id;

        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'servicename' => $request->servicename,
        ]);

        return redirect()->route('myemployerprofile')->with('success', 'Nom de la structure modifiées avec succès! :-)');
    }

    public function resetemployeremail(UpdateEmailRequest $request)
    {
        $id = Auth::user()->id;

        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'email' => strtolower($request->email),
        ]);

        return redirect()->route('myemployerprofile')->with('success', 'Email modifiées avec succès! :-)');
    }

    public function resetemployertelephone(UpdateTelephoneRequest $request)
    {
        $id = Auth::user()->id;

        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('myemployerprofile')->with('success', 'Numéro de téléphone modifiées avec succès! :-)');
    }

    public function resetemployerpassword(UpdatePasswordRequest $request)
    {
        $id = Auth::user()->id;
        $message = '';

        $validatedData = $request->validated();
        $hashedPassword = Debtor::whereId($id)->value('password');

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            Debtor::whereId($id)->update([
                'password' => Hash::make($request->password),
            ]);

            $message = 'Mot de passe modifiées avec succès! :-)';
        } else {
            $message = 'Le mot de passe entré est incorrect.';
        }

        return redirect()->route('myemployerprofile')->with('success', $message);
    }

    public function myemployes()
    {
        $serviceindex = Auth::user()->serviceindex;

        $myEmployes = Debtor::where('debtorindex', $serviceindex)
            ->select('id', 'firstname', 'lastname')
            ->orderBy('firstname', 'ASC')->get();

        return view('employer.myEmployes', compact('myEmployes'));
    }

    public function show($id)
    {
        $showEmploye = Debtor::select('id', 'firstname', 'lastname', 'email', 'telephone', 'matricule')
            ->find($id);

        return view('employer.showEmploye', compact('showEmploye'));
    }
}
