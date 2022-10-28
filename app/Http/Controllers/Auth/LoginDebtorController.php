<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginDebtorRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Debtor\Debtor;;

class LoginDebtorController extends Controller
{
    public function show()
    {
        return view('auth.loginDebtor');
    }

    public function authenticate(LoginDebtorRequest $request)
    {
        $request->validated();
        $password = '12345678';

        $showDebtor = Debtor::where([['email', $request->email], ['matricule', $request->matricule]])->get();
        foreach ($showDebtor as $debtor) {
            if (Auth::attempt(['email' => $request->email, 'password' => $password], $request->has('remember')) && $debtor->matricule) {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors('Les informations d\'identification fournies ne correspondent pas à nos enregistrements! 😞');
    }
}
