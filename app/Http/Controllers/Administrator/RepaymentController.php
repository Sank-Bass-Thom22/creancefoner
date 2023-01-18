<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Loan\Repayment;
use App\Models\Loan\Loan;
use App\Models\Loan\Repaymentamount;
use App\Models\Debtor\Debtor;
use App\Models\Loan\Rate;
use App\Models\Loan\Schedule;
use App\Models\Loan\Bank;
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
        $allBank = Bank::orderBy('name', 'ASC')->get();
        $debtorName = Debtor::where('id', $id)->select('firstname', 'lastname')->first();
        session()->put('id_debtor', $id);
        session()->put('fullname', $debtorName->firstname . ' ' . $debtorName->lastname);

        return view('administrator.createRepayment', compact('allBank'));
    }

    public function store(StoreRepaymentRequest $request)
    {
        $validatedData = $request->validated();
        $totalDue = 0;
        $minAmount = floatval(Repaymentamount::value('minamount'));
        $totalPaid = floatval(Repayment::where('id_debtor', session()->get('id_debtor'))->sum('amount'));
        $showLoan = Loan::where('id_debtor', session()->get('id_debtor'))
            ->join('rates', 'loans.id_rate', '=', 'rates.id')
            ->select('loans.amount', 'rates.value')->get();

        foreach ($showLoan as $loans) {
            $totalDue += floatval((($loans->amount * $loans->value) / 100) + $loans->amount);
        }

        if (floatval($request->amount) < $minAmount && floatval($request->amount) != ($totalDue - $totalPaid)) {
            return back()->withErrors(['amount' => 'Le montant minimal requis est de : ' . $minAmount]);
        }

        if ($request->amount > ($totalDue - $totalPaid)) {
            return back()->withErrors('Le montant entré est suppérieur au reste à payer.');
        }

        if (Schedule::where('id_debtor', session()->get('id_debtor'))->doesntExist()) {
            return back()->withErrors('Veuillez d\'abord définir un échéancier de remboursement');
        }

        Repayment::create([
            'amount' => floatval($request->amount),
            'repaymentdate' => $request->repaymentdate,
            'repaymentway' => $request->repaymentway,
            'description' => $request->description,
            'id_bank' => $request->bank,
            'id_debtor' => intval(session()->get('id_debtor')),
        ]);

        return redirect()->route('showrepayment', session()->get('id_debtor'))->with('success', 'Remboursement enregistré avec succès! :-)');
    }

    public function quick_store(StoreRepaymentRequest $request)
    {
        $validatedData = $request->validated();
        $minAmount = floatval(Repaymentamount::value('minamount'));
        $totalDue = 0;
        $totalPaid = floatval(Repayment::where('id_debtor', $request->debtor)->sum('amount'));
        $showLoan = Loan::where('id_debtor', $request->debtor)
            ->join('rates', 'loans.id_rate', '=', 'rates.id')
            ->select('loans.amount', 'rates.value')->get();

        foreach ($showLoan as $loans) {
            $totalDue += floatval((($loans->amount * $loans->value) / 100) + $loans->amount);
        }

        if (floatval($request->amount) < $minAmount && floatval($request->amount) != ($totalDue - $totalPaid)) {
            return back()->withErrors(['amount' => 'Le montant minimal requis est de : ' . $minAmount]);
        }

        if ($request->amount > ($totalDue - $totalPaid)) {
            return back()->withErrors(['amount' => 'Le montant entré est suppérieur au reste à payer.']);
        }

        if (Schedule::where('id_debtor', session()->get('id_debtor'))->doesntExist()) {
            return back()->withErrors(['Schedule' => 'Veuillez d\abord définir un échéancier de remboursement']);
        }

        Repayment::create([
            'amount' => floatval($request->amount),
            'repaymentdate' => $request->repaymentdate,
            'repaymentway' => $request->repaymentway,
            'description' => $request->description,
            'id_bank' => $request->bank,
            'id_debtor' => $request->debtor,
        ]);

        return redirect()->route('quick-task')->with('success', 'Remboursement enregistré avec succès!');
    }

    public function show($id)
    {
        $totalDue = 0;
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
        $minAmount = floatval(Repaymentamount::value('minamount'));
        $totalDue = 0;
        $totalPaid = floatval(Repayment::where([['id', '<>', $id], ['id_debtor', '=', session()->get('id_debtor')]])
            ->sum('amount'));
        $showLoan = Loan::where('id_debtor', session()->get('id_debtor'))
            ->join('rates', 'loans.id_rate', '=', 'rates.id')
            ->select('loans.amount', 'rates.value')->get();

        foreach ($showLoan as $loans) {
            $totalDue += floatval((($loans->amount * $loans->value) / 100) + $loans->amount);
        }

        if (floatval($request->amount) < $minAmount && floatval($request->amount) != ($totalDue - $totalPaid)) {
            return back()->withErrors(['amount' => 'Le montant minimal requis est de : ' . $minAmount]);
        }

        if ($request->amount > ($totalDue - $totalPaid)) {
            return back()->withErrors('Le montant entré est suppérieur au reste à payer.');
        }

        Repayment::whereId($id)->update([
            'amount' => floatval($request->amount),
            'repaymentdate' => $request->repaymentdate,
            'repaymentway' => $request->repaymentway,
            'description' => $request->description,
            'id_bank' => $request->bank,
        ]);

        $id_debtor = Repayment::whereId($id)->value('id_debtor');

        return redirect()->route('showrepayment', $id_debtor)->with('success', 'Remboursement modifié avec succès! :-)');
    }

    public function destroy($id)
    {
        $repayment = Repayment::find($id);
        $id_debtor = Repayment::whereId($id)->value('id_debtor');
        $repayment->delete();

        return redirect()->route('showrepayment', $id_debtor)->with('success', 'Remboursement supprimé avec succès!');
    }
}
