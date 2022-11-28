<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Loan\Schedule;
use App\Models\Loan\Repaymentamount;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        if (Repaymentamount::doesntExist()) {
            return back()->withErrors(['minamount' => 'Veuiller d\'abord définir une grille minimale.']);
        } else {
            $minAmount = floatval(Repaymentamount::value('minamount'));
            session()->put('minamount', $minAmount);
            session()->put('id_debtor', $id);
        }

        return view('administrator.createSchedule');
    }

    public function store(StoreScheduleRequest $request)
    {
        $validatedData = $request->validated();

        if (floatval($request->amount) < session()->get('minamount')) {
            return back()->withErrors(['amount' => 'Le montant entré est inférieur au montant minimal de ' . session()->get('minamount') . ' Francs.']);
        }

        Schedule::create([
            'amount' => floatval($request->amount),
            'id_debtor' => intval(session()->get('id_debtor')),
        ]);

        session()->put('schedule', floatval($request->amount));

        return redirect()->route('showrepayment', session()->get('id_debtor'))->with('success', 'Échéancier définit avec succès! :-)');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $debtorSchedule = Schedule::select('id', 'amount', 'id_debtor')->find($id);

        return view('administrator.editSchedule', compact('debtorSchedule'));
    }

    public function update(UpdateScheduleRequest $request, $id)
    {
        $validatedData = $request->validated();

        if (floatval($request->amount) < session()->get('minamount')) {
            return back()->withErrors(['amount' => 'Le montant entré est inférieur au montant minimal de ' . session()->get('minamount') . ' Francs.']);
        }

        Schedule::whereId($id)->update([
            'amount' => floatval($request->amount),
        ]);

        session()->put('schedule', floatval($request->amount));

        return redirect()->route('showrepayment', session()->get('id_debtor'))->with('success', 'Échéancier modifié avec succès! :-)');
    }
}
