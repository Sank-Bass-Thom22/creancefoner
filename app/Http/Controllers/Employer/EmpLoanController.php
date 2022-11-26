<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Loan\Loan;
use App\Models\Loan\Rate;

class EmpLoanController extends Controller
{
    public function loans($id)
    {
        $employeLoans = Loan::where('id_debtor', $id)
            ->join('rates', 'rates.id', '=', 'loans.id_rate')
            ->select('loans.*', 'rates.value')
            ->orderBy('startline', 'asc')->get();
        $countLoans = Loan::where('id_debtor', $id)->count();

        return view('employer.loans', compact(['employeLoans', 'countLoans', 'id']));
    }
}
