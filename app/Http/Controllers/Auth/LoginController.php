<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request  )
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withInput($request->only('email'))
        ->withErrors(['email' => __($status)]);
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

        if ($role == 'Employer') {
            return view('employer.profile', compact('userProfile'));
        } elseif ($role == 'Debtor') {
            $service = Debtor::where([['role', 'Employer'], ['serviceindex', $userProfile->debtorindex]])->first();
            return view('debtor.profile', compact(['userProfile', 'service']));
        } else {
            return view('administrator.profile', compact('userProfile'));
        }
    }
}
