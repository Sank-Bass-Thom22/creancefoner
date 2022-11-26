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

    public function edit($id)
    {
        $editEmployer = Debtor::find($id);

        return view('administrator.editEmployer', compact('editEmployer'));
    }

    public function update(UpdateEmployerRequest $request, $id)
    {
        $credentialsValidated = $request->validated();

        Debtor::whereId($id)->update([
            'servicename' => $request->servicename,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('showemployer', $id)->with('success', 'Structure modifiée avec succès! :-)');
    }
}
