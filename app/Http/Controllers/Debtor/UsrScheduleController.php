<?php

namespace App\Http\Controllers\Debtor;

use App\Http\Controllers\Controller;
use App\Models\Loan\Schedule;
use App\Models\Loan\Repayment;
use App\Models\Loan\Repaymentamount;
use App\Models\Loan\Loan;
use App\Models\Loan\Rate;
use App\Http\Requests\SimulateWithAmountRequest;
use App\Http\Requests\SimulateWithDateRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use Illuminate\Support\Facades\Auth;

class UsrScheduleController extends Controller
{
    public function createsimulation()
    {
        return view('debtor.simulate');
    }

    public function defineschedule()
    {
        return view('debtor.defineSchedule');
    }

    public function simulatewithamount(SimulateWithAmountRequest $request)
    {
        $id = Auth::user()->id;
        $message = '';
        $years = 0;
        $mounths = 0;
        $rest = 0;
        $totalDebt = 0;

        $validatedData = $request->validated();
        $minAmount = floatval(Repaymentamount::value('minamount'));

        if (floatval($request->amount) < $minAmount) {
            $message = 'Le montant minimal requis est de : ' . $minAmount;
        } else {
            if (Loan::where('id_debtor', $id)->exists()) {
                $totalPaid = floatval(Repayment::where('id_debtor', $id)->sum('amount'));
                $debtorLoans = Loan::where('id_debtor', $id)
                    ->join('rates', 'loans.id_rate', '=', 'rates.id')
                    ->select('loans.amount', 'rates.value')->get();

                foreach ($debtorLoans as $loans) {
                    $totalDebt += floatval((($loans->amount * $loans->value) / 100) + $loans->amount);
                }

                $rest = $totalDebt - $totalPaid;

                if ($rest === 0) {
                    $message = 'Vous êtes à jour de votre remboursement.';
                } elseif ($rest <= floatval($request->amount)) {
                    $message = 'Il vous faudra 1 mois pour être à jour.';
                } else {
                    while ($rest > 0) {
                        $rest -= floatval($request->amount);
                        $mounths++;
                    }

                    while ($mounths >= 12) {
                        $mounths -= 12;
                        $years++;
                    }
                    
                    $dateFin         = date('d-m-Y', strtotime('+'.$years.' year' ));
                    $dateDepartTimestamp = strtotime($dateFin);
                   
                    $dateFin1         = date('M-Y', strtotime('+'.$mounths.' month', $dateDepartTimestamp ));
                  
                    $message = 'Avec ' . floatval($request->amount) . ' Francs par mois, cela vous prendra : ' . $years . ' ans ' . $mounths . ' mois pour être à jour. (Date probable de fin : '.$dateFin1.' )';
                }
            } else {
                $message = 'Vous n\'avez aucun prêt enregistré pour le moment.';
            }
        }

        return view('debtor.simulate', compact('message'));
    }

    public function simulatewithdate(SimulateWithDateRequest $request)
    {
        $id = Auth::user()->id;
        $message = '';
        $totalDebt = 0;
        $rest = 0;
        $amount = 0;

        $validatedData = $request->validated();
        $mounths = intval($request->mounths);
        $years = intval($request->years);
        $minAmount = floatval(Repaymentamount::value('minamount'));

        if ($mounths === 0 && $years === 0) {
            $message = 'Veuillez choisir une durée.';
        } else {
            if (Loan::where('id_debtor', $id)->exists()) {
                $totalPaid = floatval(Repayment::where('id_debtor', $id)->sum('amount'));
                $debtorLoans = Loan::where('id_debtor', $id)
                    ->join('rates', 'loans.id_rate', '=', 'rates.id')
                    ->select('loans.amount', 'rates.value')->get();

                foreach ($debtorLoans as $loans) {
                    $totalDebt += floatval((($loans->amount * $loans->value) / 100) + $loans->amount);
                }

                $rest = $totalDebt - $totalPaid;

                if ($rest === 0) {
                    $message = 'Vous êtes à jour de votre remboursement.';
                } else {
                    while ($years > 0) {
                        $mounths += 12;
                        $years--;
                    }

                    $amount = round($rest / $mounths);

                    if ($amount < $minAmount) {
                        $message = '= ' . $amount . ' Francs. Le montant minimal requis est de ' . $minAmount . ' Francs.';
                    } else {
                        $message = 'Il vous faudra payer ' . $amount . ' Francs par mois pour solder votre créance.';
                    }
                }
            } else {
                $message = 'Vous n\'avez aucun prêt enregistré pour le moment.';
            }
        }

        return view('debtor.simulate', compact('message'));
    }

    public function saveschedule(StoreScheduleRequest $request)
    {
        $id = Auth::user()->id;
        $message = '';

        $validatedData = $request->validated();
        $minAmount = floatval(Repaymentamount::value('minamount'));

        if (floatval($request->amount) < $minAmount) {
            $message = 'Le montant entré est inférieur au montant minimal de ' . $minAmount . ' Francs.';
        } else {
            Schedule::create([
                'amount' => floatval($request->amount),
                'id_debtor' => intval($id),
            ]);

            $message = 'Échéancier enregistré avec succès! :-)';
        }

        return view('debtor.defineschedule', compact('message'));
    }

    public function resetschedule()
    {
        $id = Auth::user()->id;

        $resetSchedule = floatval(Schedule::where('id_debtor', $id)->value('amount'));

        return view('debtor.resetSchedule', compact('resetSchedule'));
    }

    public function resaveschedule(UpdateScheduleRequest $request)
    {
        $id = Auth::user()->id;
        $message = '';

        $validatedData = $request->validated();
        $minAmount = floatval(Repaymentamount::value('minamount'));

        if (floatval($request->amount) < $minAmount) {
            $message = 'Le montant entré est inférieur au montant minimal de ' . $minAmount . ' Francs.';
        } else {
            Schedule::where([['id_debtor', $id], ['visibility', true]])->update([
                'amount' => floatval($request->amount),
            ]);

            $message = 'Échéancier modifié avec succès! :-)';
        }

        return redirect()->route('myrepayments')->with('success', $message);
    }
}
