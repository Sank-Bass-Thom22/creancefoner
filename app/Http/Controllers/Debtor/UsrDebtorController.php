<?php

namespace App\Http\Controllers\Debtor;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsrDebtorController extends Controller
{
    public function profile()
    {
        $id = Auth::user()->id;
        $debtorProfile = Debtor::find($id);
        $debtorService = Debtor::where('serviceindex', $debtorProfile->debtorindex)->first();

        return view('debtor.profile', compact(['debtorProfile', 'debtorService']));
    }
}
