<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Loan\Loan;
use App\Models\Loan\Rate;
use App\Models\Debtor\Debtor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;

class LoanController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $allRate = Rate::select('id', 'value')->orderBy('value', 'asc')->get();

        return view('administrator.createLoan', compact('allRate'));
    }

    public function now($id)
    {
        if (session()->missing('now')) {
            $debtorName = Debtor::where('id', $id)->select('firstname', 'lastname')->first();
            session()->put('id_debtor', $id);
            session()->put('fullname', $debtorName->firstname . ' ' . $debtorName->lastname);
            session()->put('now', true);
        } else {
            session()->forget('id_debtor');
            session()->forget('fullname');
            session()->forget('now');

            return redirect()->route('showloan', $id);
        }

        return redirect()->route('createloan');
    }

    public function store(StoreLoanRequest $request)
    {
        $validatedData = $request->validated();

        Loan::create([
            'amount' => floatval($request->amount),
            'startline' => $request->startline,
            'deadline' => $request->deadline,
            'id_rate' => intval($request->rate),
            'id_debtor' => intval(session()->get('id_debtor')),
        ]);

        return redirect()->route('createloan')->with('success', 'Prêt enregistré avec succès ! :-)');
    }

    public function show($id)
    {
        $showLoan = Loan::where('id_debtor', $id)
            ->join('rates', 'rates.id', '=', 'loans.id_rate')
            ->select('loans.*', 'rates.value')
            ->orderBy('startline', 'asc')->get();
        $countLoan = Loan::where('id_debtor', $id)->count();
        if (session()->missing('fullname')) {
            $debtorName = Debtor::where('id', $id)->select('firstname', 'lastname')->first();
            session()->put('fullname', $debtorName->firstname . ' ' . $debtorName->lastname);
        }

        return view('administrator.showLoan', compact(['showLoan', 'countLoan', 'id']));
    }

    public function edit($id)
    {
        $debtorLoan = Loan::select('id', 'amount', 'startline', 'deadline', 'id_debtor')->find($id);
        $allRates = Rate::select('id', 'value')->orderBy('value', 'asc')->get();

        return view('administrator.editLoan', compact(['debtorLoan', 'allRates']));
    }

    public function update(UpdateLoanRequest $request, $id)
    {
        $validatedData = $request->validated();

        Loan::whereId($id)->update([
            'amount' => floatval($request->amount),
            'startline' => $request->startline,
            'deadline' => $request->deadline,
            'id_rate' => intval($request->rate),
        ]);

        $id_debtor = Loan::whereId($id)->value('id_debtor');

        return redirect()->route('showloan', $id_debtor)->with('success', 'Prêt modifié avec succès! :-)');
    }
}
