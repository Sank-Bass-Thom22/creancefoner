<?php

namespace App\Http\Controllers\Debtor;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Models\Loan\Loan;
use App\Models\Loan\Rate;
use App\Http\Requests\UpdateDebtorRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsrDebtorController extends Controller
{
    public function reset($id)
    {
        $resetDebtor = Debtor::find($id);
        $service = Debtor::where('serviceindex', $resetDebtor->debtorindex)->first();

        return view('debtor.resetDebtor', compact(['resetDebtor', 'service']));
    }

    public function resetpassword()
    {
        return view('debtor.resetPassword');
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
        ]);

        return redirect()->route('myprofile')->with('success', 'Informations modifiées avec succès! :-)');
    }

    public function updatepassword(UpdatePasswordRequest $request)
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

    public function repporting()
    {
        $id = Auth::user()->id;
        $totalDue = 0;
        $totalPaid = 0;
        $totalInterest = 0;
        $totalLoan = 0;

        $allLoan = Loan::where('id_debtor', $id)
        ->join('rates', 'rates.id', '=', 'loans.id_rate')
        ->select('loans.amount', 'rates.value');

        foreach ($allLoan as $loans) {
            $totalDue += floatval((($loans->amount * $loans->value) / 100) + $loans->amount);
        }

        $totalPaid = floatval(Repayment::where('id_debtor', $id)->sum('amount'));
        $totalLoan = floatval(Loan::where('id_debtor', $id)->sum(amount));
        $totalInterest = ($totalDue - $totalLoan);

        return view('debtor.dashboard', compact(['totalLoan', 'totalInterest', 'totalPaid']));
    }
}
