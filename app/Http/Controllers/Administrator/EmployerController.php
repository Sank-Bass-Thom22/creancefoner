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
        $allEmployer = Debtor::where('role', 'Employer')->select('id', 'servicename')
        ->orderBy('id', 'DESC')->get();

        return view('administrator.allEmployer', compact('allEmployer'));
    }

    public function create()
    {
        return view('administrator.registeremployer');
    }

    public function store(StoreEmployerRequest $request)
    {
        $credentialsValidated = $request->validated();

        Debtor::create([
            'servicename' => $request->servicename,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'serviceindex' => (string) Str::uuid(),
            'role' => 'Employer',
        ]);

        return redirect()->route('registeremployer')->with('success', 'Structure enregistrée avec succès! :-)');
    }
}
