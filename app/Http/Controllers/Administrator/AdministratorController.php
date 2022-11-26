<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdministratorController extends Controller
{
    public function index()
    {
        $allAdministrator = Debtor::whereIn('role', ['SuperAdmin', 'SimpleAdmin'])
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
        if ($id === 0) {
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
}
