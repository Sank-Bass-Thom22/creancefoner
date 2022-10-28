<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginOtherRequest;
use Illuminate\Support\Facades\Auth;

class LoginOtherController extends Controller
{
    public function show()
    {
        return view('auth.loginOther');
    }

    public function authenticate(LoginOtherRequest $request)
    {
        $request->validated();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors('Les informations d\'identification fournies ne correspondent pas a nos enregistrements.');
    }
}
