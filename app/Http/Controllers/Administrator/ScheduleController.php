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
        $repaymentAmount = Repaymentamount::select('minamount')->count();

        if ($repaymentAmount === 0) {
            return back()->withErrors(['minamount' => 'Veuiller d\'abord définir une grille minimale.']);
        } else {
            $minAmount = Repaymentamount::value('minamount');
            session()->put('minamount', $minAmount);
            session()->put('id_debtor', $id);
        }

        return view('administrator.createSchedule');
    }

    public function store(StoreScheduleRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->amount < session()->get('minamount')) {
            return back()->withErrors(['amount' => 'Le montant entré est inférieur au montant minimal.']);
        }

        Schedule::create([
            'amount' => floatval($request->amount),
            'id_debtor' => intval(session()->get('id_debtor')),
        ]);

        session()->put('schedule', $request->amount);

        return redirect()->route('showrepayment', session()->get('id_debtor'))->with('success', 'Échéancier définit avec succès! :-)');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateScheduleRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
