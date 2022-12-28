<?php

namespace App\Http\Controllers\Debtor;

use App\Http\Controllers\Controller;
use App\Models\Loan\Loan;
use App\Models\Loan\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsrLoanController extends Controller
{
    public function loans()
    {
        $id = Auth::user()->id;
        $debtorLoans = Loan::where('id_debtor', $id)
            ->join('rates', 'rates.id', '=', 'loans.id_rate')
            ->select('loans.*', 'rates.value')
            ->orderBy('academicyear', 'asc')->get();
        $countLoans = Loan::where('id_debtor', $id)->count();

        return view('debtor.loans', compact(['debtorLoans', 'countLoans']));
    }
}
