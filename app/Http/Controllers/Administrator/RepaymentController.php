<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Loan\Repayment;
use App\Models\Loan\Loan;
use App\Models\Loan\Repaymentamount;
use App\Models\Debtor\Debtor;
use App\Models\Loan\Rate;
use App\Models\Loan\Schedule;
use App\Http\Requests\StoreRepaymentRequest;
use App\Http\Requests\UpdateRepaymentRequest;

class RepaymentController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        if (session()->missing('id_debtor')) {
            $debtorName = Debtor::where('id', $id)->select('firstname', 'lastname')->first();
            session()->put('id_debtor', $id);
            session()->put('fullname', $debtorName->firstname . ' ' . $debtorName->lastname);
        }

        return view('administrator.createRepayment');
    }

    public function store(StoreRepaymentRequest $request)
    {
        $validatedData = $request->validated();
        $minAmount = floatval(Repaymentamount::value('minamount'));

        if (floatval($request->amount) < $minAmount) {
            return back()->withErrors(['amount' => 'Le montant minimal requis est de : ' . $minAmount]);
        }

        Repayment::create([
            'amount' => floatval($request->amount),
            'repaymentdate' => $request->repaymentdate,
            'repaymentway' => $request->repaymentway,
            'id_debtor' => intval(session()->get('id_debtor')),
        ]);

        return redirect()->route('showrepayment', session()->get('id_debtor'))->with('success', 'Remboursement enregistré avec succès! :-)');
    }

    public function show($id)
    {
        $totalDue = 0;
        $totalPaid = 0;
        $showRepayment = Repayment::where('id_debtor', $id)->orderBy('repaymentdate', 'desc')->get();
        $totalPaid = floatval(Repayment::where('id_debtor', $id)->sum('amount'));

        if (Schedule::where([['visibility', true], ['id_debtor', $id]])->exists()) {
            $schedule = Schedule::where([['visibility', true], ['id_debtor', $id]])
                ->select('id', 'amount')->first();

            session()->put('schedule', floatval($schedule->amount));
            session()->put('id_schedule', intval($schedule->id));
        } else {
            session()->put('schedule', 0);
            session()->put('id_schedule', 0);
        }

        $showLoan = Loan::where('id_debtor', $id)
            ->join('rates', 'loans.id_rate', '=', 'rates.id')
            ->select('loans.amount', 'rates.value')->get();

        foreach ($showLoan as $loans) {
            $totalDue += floatval((($loans->amount * $loans->value) / 100) + $loans->amount);
        }

        return view('administrator.showRepayment', compact(['showRepayment', 'totalDue', 'totalPaid', 'id']));
    }

    public function edit($id)
    {
        $debtorRepayment = Repayment::select('id', 'amount', 'repaymentdate', 'repaymentway', 'id_debtor')->find($id);

        return view('administrator.editRepayment', compact('debtorRepayment'));
    }

    public function update(UpdateRepaymentRequest $request, $id)
    {
        $validatedData = $request->validated();

        Repayment::whereId($id)->update([
            'amount' => floatval($request->amount),
            'repaymentdate' => $request->repaymentdate,
            'repaymentway' => $request->repaymentway,
        ]);

        $id_debtor = Repayment::whereId($id)->value('id_debtor');

        return redirect()->route('showrepayment', $id_debtor)->with('success', 'Remboursement modifié avec succès! :-)');
    }
}
