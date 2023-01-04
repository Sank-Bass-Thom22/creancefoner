<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Models\Loan\Loan;
use App\Models\Loan\Repayment;
use App\Models\Loan\Rate;
use App\Http\Requests\UpdateEmployerRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmpEmployerController extends Controller
{
    public function index()
    {
        $serviceindex = Auth::user()->serviceindex;

        $myEmployes = Debtor::where('debtorindex', $serviceindex)
            ->orderBy('firstname', 'ASC')->get();

        return view('employer.myEmployes', compact('myEmployes'));
    }

    public function reset($id)
    {
        $resetEmployer = Debtor::find($id);

        return view('employer.resetEmployer', compact('resetEmployer'));
    }

    public function resetpassword()
    {
        return view('employer.resetPassword');
    }

    public function update(UpdateEmployerRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'servicename' => ucwords(strtolower($request->servicename)),
            'email' => strtolower($request->email),
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('myprofile')->with('success', 'Informations modifiés avec succès!');
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
        $serviceindex = Auth::user()->serviceindex;
        $totalDue = 0;
        $totalPaid = 0;
        $totalInterest = 0;
        $totalLoan = 0;

        $allDebtor = Debtor::where('debtorindex', $serviceindex)->get();

        foreach ($allDebtor as $debtors) {
            foreach ($debtors->loans as $loans) {
                $value = Rate::whereId($loans->id_rate)->value('value');
                $totalDue += floatval((($loans->amount * $value) / 100) + $loans->amount);
                $totalLoan += floatval($loans->amount);
            }

            foreach ($debtors->repayments as $repayments) {
                $totalPaid += floatval($repayments->amount);
            }
        }

        $totalInterest = ($totalDue - $totalLoan);

        return view('employer.dashboard', compact(['totalLoan', 'totalInterest', 'totalPaid']));
    }
}
