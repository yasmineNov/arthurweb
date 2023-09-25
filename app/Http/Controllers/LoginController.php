<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login', [
            "title" => "login",
            // "active" => "login"
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials  = $request->validate([
            'email' => 'required|email:DNS',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email yang anda masukkan salah!',
            'password' => 'password yang anda masukkan salah!',
        ]);

        // return back()->withErrors([
        //     'email' => 'Email atau Password salah!',
        // ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
