<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Models\Loan\Loan;
use App\Models\Loan\Repayment;
use App\Models\Loan\Bank;
use App\Http\Requests\StoreDebtorRequest;
use App\Http\Requests\UpdateDebtorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DebtorController extends Controller
{
    public function index()
    {
        $allDebtor = Debtor::where('role', 'Debtor')
            ->orderBy('firstname', 'ASC')->get();
        $allService = Debtor::where('role', 'Employer')
            ->orderBy('servicename', 'ASC')->get();
        $message = 'Il n\'y a aucun redevable enregistré.';

        return view('administrator.allDebtor', compact(['allDebtor', 'message', 'allService']));
    }

    public function quick()
    {
                $debtors = Debtor::where('role', 'Debtor')->orderBy('firstname', 'ASC')->get();
                $allBank = Bank::orderBy('name', 'ASC')->get();

        return view('administrator.quick', compact(['debtors', 'allBank']));
    }

    public function about_repayments($status)
    {
        $debtors = Debtor::where('role', 'Debtor')->orderBy('firstname', 'ASC')->get();

        return view('administrator.aboutRepayments', compact(['debtors', 'status']));
    }

    public function create()
    {
        $allService = Debtor::where('role', 'Employer')->orderBy('servicename', 'asc')->select('servicename', 'serviceindex')->get();

        return view('administrator.registerDebtor', compact('allService'));
    }

    public function store(StoreDebtorRequest $request)
    {
        $credentialsValidated = $request->validated();
        $password = Str::random(8);

        $id_debtor = Debtor::insertGetId([
            'firstname' => ucwords(strtolower($request->firstname)),
            'lastname' => ucwords(strtolower($request->lastname)),
            'email' => $request->email,
            'telephone' => $request->telephone,
            'matricule' => $request->matricule,
            'debtorindex' => $request->serviceindex,
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

    public function edit($id)
    {
        $debtorProfile = Debtor::find($id);
        $allServices = Debtor::where('role', 'Employer')->select('servicename', 'serviceindex')->orderBy('servicename', 'ASC')->get();

        return view('administrator.editDebtor', compact(['debtorProfile', 'allServices']));
    }

    public function update(UpdateDebtorRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'firstname' => ucwords(strtolower($request->firstname)),
            'lastname' => ucwords(strtolower($request->lastname)),
            'email' => strtolower($request->email),
            'telephone' => $request->telephone,
            'matricule' => $request->matricule,
            'debtorindex' => $request->serviceindex,
        ]);
        return redirect()->route('alldebtor')->with('success', 'Informations modifiées avec succès! :-)');
    }

    public function regenerate($id)
    {
        $newPassword = Str::random(8);

        Debtor::whereId($id)->update([
            'password' => Hash::make($newPassword),
        ]);

        return redirect()->route('alldebtor', $id)->with('success', 'Succès! Le nouveau mot de passe est : ' . $newPassword);
    }

    public function destroy($id)
    {
        if (Repayment::where('id_debtor', $id)->exists()) {
            return back()->with('success', 'Veuillez d\'abord supprimer les remboursements effectués par ce redevable.');
        }
        if (Loan::where('id_debtor', $id)->exists()) {
            return back()->withErrors('Veuillez d\'abord supprimer les prêts de ce redevable.');
        }
        $debtorProfile = Debtor::find($id);
        $debtorProfile->delete();

        return redirect()->route('alldebtor')->with('success', 'Redevable supprimé avec succès!');
    }
}
