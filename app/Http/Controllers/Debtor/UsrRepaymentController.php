<?php

namespace App\Http\Controllers\Debtor;

use App\Http\Controllers\Controller;
use App\Models\Loan\Repayment;
use App\Models\Loan\Loan;
use App\Models\Loan\Rate;
use App\Models\Loan\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsrRepaymentController extends Controller
{
    public function repayments()
    {
        $id = Auth::user()->id;
        $totalDebt = 0;

        $debtorRepayments = Repayment::where('id_debtor', $id)->orderBy('repaymentdate', 'desc')->get();
        $totalPaid = floatval(Repayment::where('id_debtor', $id)->sum('amount'));
        $debtorLoans = Loan::where('id_debtor', $id)
            ->join('rates', 'loans.id_rate', '=', 'rates.id')
            ->select('loans.amount', 'rates.value')->get();

        foreach ($debtorLoans as $loans) {
            $totalDebt += floatval((($loans->amount * $loans->value) / 100) + $loans->amount);
        }

        if (Schedule::where('id_debtor', $id)->exists()) {
            $schedule = floatval(Schedule::where('id_debtor', $id)->value('amount'));
        } else {
            $schedule = 0;
        }

        return view('debtor.repayments', compact(['debtorRepayments', 'totalDebt', 'totalPaid', 'schedule']));
    }
}
