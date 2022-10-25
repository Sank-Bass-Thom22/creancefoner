<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showLoginDebForm()
    {
        return view('auth.logindebtor');
    }

    public function authenticate(Request $request)
    {
        if (isset($request->password)) {
            $credentials = $request->validate([
                'email' => ['required', 'string', 'email', 'max:50'],
                'password' => ['required', 'string', 'max:16'],
            ]);

            $request->session()->regenerate();
            if (Auth::attempt($credentials, $request->has('remember'))) {
                // return redirect()->intended(RouteServiceProvider::HOME);
                return redirect()->route('dashboard');
            }

            return back()->withErrors([
                'email' => 'Les informations d\'identification fournies ne correspondent pas a nos enregistrements.',
            ])->onlyInput('email');
        } else {
            $credentials = $request->validate([
                'email' => ['required', 'string', 'email', 'max:50'],
                'matricule' => ['required', 'string', 'max:10'],
            ]);

            $request->session()->regenerate();
            if (Auth::attempt($credentials, $request->has('remember'))) {

                return redirect()->intended(RouteServiceProvider::HOME);
            }

            return back()->withErrors([
                'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
            ])->onlyInput('email');
        }
    }
}
