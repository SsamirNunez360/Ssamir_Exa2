<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return redirect()->route('inicio');
        }

        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credenciales = $request->validate([
            'usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            return redirect()->intended(route('inicio'));
        }

        return back()
            ->withErrors(['usuario' => 'Usuario o contraseña incorrectos.'])
            ->onlyInput('usuario');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}