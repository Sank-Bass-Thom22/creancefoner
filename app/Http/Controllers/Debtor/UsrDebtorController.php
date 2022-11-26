<?php

namespace App\Http\Controllers\Debtor;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\UpdateFullnameRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Http\Requests\UpdateTelephoneRequest;
use App\Http\Requests\UpdateMatriculeRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsrDebtorController extends Controller
{
    public function create($resource)
    {
        $id = Auth::user()->id;

        $debtorProfile = Debtor::where('id', $id)
            ->select('firstname', 'lastname', 'email', 'telephone', 'matricule')
            ->first();

        return view('debtor.' . $resource, compact('debtorProfile'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $debtorProfile = Debtor::find($id);
        $debtorService = Debtor::where('serviceindex', $debtorProfile->debtorindex)->first();

        return view('debtor.profile', compact(['debtorProfile', 'debtorService']));
    }

    public function resetfullname(UpdateFullnameRequest $request)
    {
        $id = Auth::user()->id;

        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'firstname' => ucfirst(strtolower($request->firstname)),
            'lastname' => ucfirst(strtolower($request->lastname)),
        ]);

        return redirect()->route('myprofile')->with('success', 'Informations modifiées avec succès! :-)');
    }

    public function resetemail(UpdateEmailRequest $request)
    {
        $id = Auth::user()->id;

        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'email' => strtolower($request->email),
        ]);

        return redirect()->route('myprofile')->with('success', 'Email modifiées avec succès! :-)');
    }

    public function resettelephone(UpdateTelephoneRequest $request)
    {
        $id = Auth::user()->id;

        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('myprofile')->with('success', 'Numéro de téléphone modifiées avec succès! :-)');
    }

    public function resetmatricule(UpdateMatriculeRequest $request)
    {
        $id = Auth::user()->id;

        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'matricule' => $request->matricule,
        ]);

        return redirect()->route('myprofile')->with('success', 'Matricule modifiées avec succès! :-)');
    }

    public function resetpassword(UpdatePasswordRequest $request)
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

        return redirect()->route('myprofile')->with('success', $message);
    }
}
