<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Loan\Loan;
use App\Models\Loan\Rate;
use Illuminate\Http\Request;
use App\Models\Debtor\Debtor;
use App\Models\Loan\Repayment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        $defaultRate = 0;
        $rate = 0;

        $allRate = Rate::select('id', 'validity')->get();

        foreach ($allRate as $rates) {
            // dd(intval(substr($rates->validity, 0, 4)));
            if (intval(substr($rates->validity, 0, 4)) == 0) {
                $defaultRate = $rates->id;
            } else {
                if (intval(substr($request->academicyear, 0, 4)) <= intval(substr($rates->validity, 0, 4))) {
                    $rate = $rates->id;
                }
            }
        }

        if ($rate == 0) {
            $rate = $defaultRate;
        }

        /* *****
        $rate = Rate::where(DB::raw('substr(validity, 0, 4)'), '<=', substr($request->academicyear, 0, 4))
        ->orWhere('validity', '=', '')
        ->select('id')
        ->orderBy(DB::raw('substr(validity, 0, 4)'), 'DESC')
        ->first();
        */

        Loan::create([
            'amount' => floatval($request->amount),
            'academicyear' => $request->academicyear,
            'id_rate' => $rate,
            'id_debtor' => session()->get('id_debtor'),
        ]);

        return redirect()->route('createloan')->with('success', 'Pr??t enregistr?? avec succ??s ! :-)');
    }

    public function show($id)
    {
        $showLoan = Loan::where('id_debtor', $id)
            ->join('rates', 'rates.id', '=', 'loans.id_rate')
            ->select('loans.*', 'rates.value')
            ->orderBy('academicyear', 'asc')->get();

        $debtorName = Debtor::where('id', $id)->select('firstname', 'lastname')->first();
        session()->put('fullname', $debtorName->firstname . ' ' . $debtorName->lastname);

        return view('administrator.showLoan', compact(['showLoan', 'id']));
    }

    public function edit($id)
    {
        $debtorLoan = Loan::select('id', 'amount', 'academicyear', 'id_debtor')->find($id);
        $allRates = Rate::select('id', 'value')->orderBy('value', 'asc')->get();

        return view('administrator.editLoan', compact(['debtorLoan', 'allRates']));
    }

    public function update(UpdateLoanRequest $request, $id)
    {
        $validatedData = $request->validated();
        $defaultRate = 0;
        $rate = 0;

        $allRate = Rate::select('id', 'validity')->get();

        foreach ($allRate as $rates) {
            if (intval(substr($rates->validity, 0, 4)) == 0) {
                $defaultRate = $rates->id;
            } else {
                if (intval(substr($request->academicyear, 0, 4)) <= intval(substr($rates->validity, 0, 4))) {
                    $rate = $rates->id;
                }
            }
        }

        if ($rate == 0) {
            $rate = $defaultRate;
        }


        /* -----
        $rate = Rate::where(DB::raw('substr(validity, 0, 4)'), '<=', intval(substr($request->academicyear, 0, 4)))
            ->orWhere('validity', '=', '')
            ->select('id')
            ->orderBy(DB::raw('substr(validity, 0, 4)'), 'ASC')
            ->first();
            */

        Loan::whereId($id)->update([
            'amount' => floatval($request->amount),
            'academicyear' => $request->academicyear,
            'id_rate' => $rate,
        ]);

        $id_debtor = Loan::whereId($id)->value('id_debtor');

        return redirect()->route('showloan', $id_debtor)->with('success', 'Pr??t modifi?? avec succ??s! :-)');
    }

    public function destroy($id)
    {
        $loan = Loan::find($id);
        $id_debtor = Loan::whereId($id)->value('id_debtor');

        if (Repayment::where('id_debtor', $id_debtor)->exists()) {
            return back()->withErrors('Veuillez d\abord supprimer les remboursements de ce redevable.');
        }
        $loan->delete();

        return redirect()->route('showloan', $id_debtor)->with('success', 'Pr??t supprim?? avec succ??s!');
    }
}
