<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function reset()
    {
        return view('auth.forgot-password');
    }

    public function authenticate(LoginRequest $request)
    {
        $request->validated();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors('Les informations d\'identification fournies ne correspondent pas a nos enregistrements.');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role;

        $userProfile = Debtor::find($id);

        if ($role == 'SuperAdmin' or $role == 'SimpleAdmin') {
            return view('administrator.profile', compact('userProfile'));
        } elseif ($role == 'Employer') {
            return view('employer.profile', compact('userProfile'));
        } else {
            $service = Debtor::where('serviceindex', $userProfile->debtorindex)->first();
            return view('debtor.profile', compact(['userProfile', 'service']));
        }
    }
}
