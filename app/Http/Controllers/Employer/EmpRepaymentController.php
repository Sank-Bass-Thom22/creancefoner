<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Loan\Repayment;
use App\Models\Loan\Loan;
use App\Models\Loan\Rate;
use App\Models\Loan\Schedule;

class EmpRepaymentController extends Controller
{
    public function repayments($id)
    {
        $totalDebt = 0;

        $employeRepayments = Repayment::where('id_debtor', $id)->orderBy('repaymentdate', 'DESC')->get();
        $totalPaid = floatval(Repayment::where('id_debtor', $id)->sum('amount'));
        $employeLoans = Loan::where('id_debtor', $id)
            ->join('rates', 'loans.id_rate', '=', 'rates.id')
            ->select('loans.amount', 'rates.value')->get();

        foreach ($employeLoans as $loans) {
            $totalDebt += floatval((($loans->amount * $loans->value) / 100) + $loans->amount);
        }

        if (Schedule::where('id_debtor', $id)->exists()) {
            $schedule = floatval(Schedule::where('id_debtor', $id)->value('amount'));
        } else {
            $schedule = 0;
        }

        return view('employer.repayments', compact(['employeRepayments', 'totalDebt', 'totalPaid', 'schedule', 'id']));
    }
}
