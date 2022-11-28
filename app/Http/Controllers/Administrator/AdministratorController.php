<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateFullnameRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Http\Requests\UpdateTelephoneRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdministratorController extends Controller
{
    public function index()
    {
        $currentAdminId = Auth::user()->id;

        $allAdministrator = Debtor::whereIn('role', ['SuperAdmin', 'SimpleAdmin'])
            ->where('id', '<>', $currentAdminId)
            ->select('id', 'firstname', 'lastname')
            ->orderBy('firstname', 'ASC')->get();

        return view('administrator.allAdministrator', compact('allAdministrator'));
    }

    public function create()
    {
        return view('administrator.registerAdmin');
    }

    public function store(StoreAdministratorRequest $request)
    {
        $credentialsValidated = $request->validated();
        $password = Str::random(8);

        Debtor::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($password),
            'role' => $request->role,
        ]);

        return redirect()->route('registeradminsup')->with('success', 'Succès! :-) /Password : ' . $password);
    }

    public function show($id)
    {
        $showAdministrator = Debtor::find($id);

        return view('administrator.showAdministrator', compact('showAdministrator'));
    }

    public function edit($id, $resource)
    {
        if ($id == 0) {
            $id = Auth::user()->id;
        }

        $administratorProfile = Debtor::select('id', 'firstname', 'lastname', 'email', 'telephone', 'role')
            ->find($id);

        return view('administrator.' . $resource, compact('administratorProfile'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $administratorProfile = Debtor::select('id', 'firstname', 'lastname', 'email', 'telephone', 'role')
            ->find($id);

        return view('administrator.profile', compact('administratorProfile'));
    }

    public function updatefullname(UpdateFullnameRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'firstname' => ucfirst(strtolower($request->firstname)),
            'lastname' => ucfirst(strtolower($request->lastname)),
        ]);

        if ($id == Auth::user()->id) {
            return redirect()->route('myadminprofile')->with('success', 'Informations modifiées avec succès! :-)');
        } else {
            return redirect()->route('showadminsup', $id)->with('success', 'Informations modifiées avec succès! :-)');
        }
    }

    public function updateemail(UpdateEmailRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'email' => strtolower($request->email),
        ]);

        if ($id == Auth::user()->id) {
            return redirect()->route('myadminprofile')->with('success', 'Email modifiées avec succès! :-)');
        } else {
            return redirect()->route('showadminsup', $id)->with('success', 'Email modifiées avec succès! :-)');
        }
    }

    public function updatetelephone(UpdateTelephoneRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'telephone' => $request->telephone,
        ]);

        if ($id == Auth::user()->id) {
            return redirect()->route('myadminprofile')->with('success', 'Numéro de téléphone modifiées avec succès! :-)');
        } else {
            return redirect()->route('showadminsup', $id)->with('success', 'Numéro de téléphone modifiées avec succès! :-)');
        }
    }

    public function updaterole(UpdateRoleRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'role' => $request->role,
        ]);

        if ($id == Auth::user()->id) {
            return redirect()->route('myadminprofile')->with('success', 'Niveau d\'administration modifiées avec succès! :-)');
        } else {
            return redirect()->route('showadminsup', $id)->with('success', 'Niveau d\'administration modifiées avec succès! :-)');
        }
    }

    public function updatepassword(UpdatePasswordRequest $request, $id)
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

        return redirect()->route('myadminprofile')->with('success', $message);
    }

    public function regenerate($id)
    {
        $newPassword = Str::random(8);

        Debtor::whereId($id)->update([
            'password' => Hash::make($newPassword),
        ]);

        return redirect()->route('showadminsup', $id)->with('success', 'Succès! Le nouveau mot de passe est : ' . $newPassword);
    }
}
