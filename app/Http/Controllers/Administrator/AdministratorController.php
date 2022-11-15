<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    public function index()
    {
        $allAdministrator = Debtor::whereIn('role', ['SuperAdmin', 'SimpleAdmin'])
            ->select('id', 'firstname', 'lastname')
            ->orderBy('id', 'DESC')->get();

        return view('administrator.allAdministrator', compact('allAdministrator'));
    }

    public function create()
    {
        return view('administrator.registerAdmin');
    }

    public function store(StoreAdministratorRequest $request)
    {
        $credentialsValidated = $request->validated();

        Debtor::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('registeradminsup')->with('success', 'Administrateur nommé avec succès! :-)');
    }

    public function show($id)
    {
        $showAdministrator = Debtor::find($id);

        return view('administrator.showAdministrator', compact('showAdministrator'));
    }

    public function edit($id)
    {
        $editAdministrator = Debtor::find($id);

        return view('administrator.editAdministrator', compact('editAdministrator'));
    }

    public function update(UpdateAdministratorRequest $request, $id)
    {
        $credentialsValidated = $request->validated();

        Debtor::whereId($id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('showadminsup', $id)->with('success', 'Administrateur modifié avec succès! :-)');
    }
}
