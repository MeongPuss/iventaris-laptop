<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('dashboard.login');
    }

    public function authuser(Request $request)
    {
        $auth = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (Auth::attempt($auth)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors(["msg" => "Email atau Password Salah!"])
            ->onlyInput('email');
    }
    public function loginitsupport()
    {
        return view('dashboard.loginIT');
    }

    public function authitsupport(Request $request)
    {
        $auth = $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        if (Auth::guard("itsupport")->attempt($auth)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors(["msg" => "username atau Password Salah!"])
            ->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard.login');
    }
}
