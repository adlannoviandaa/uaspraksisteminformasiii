<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function username()
    {
        return 'nim';
    }

    public function showLoginForm()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $credentials = $request->only('nim', 'password');

        // Cek user dulu
        if (Auth::attempt($credentials)) {

            // Cek role apakah cocok dengan yang dipilih
            if (Auth::user()->role !== $request->role) {

                Auth::logout();
                return back()->withErrors([
                    'login' => 'Role tidak sesuai dengan akun!'
                ]);
            }

            $request->session()->regenerate();

            // Redirect otomatis sesuai role
            return redirect()->route('redirect');
        }

        return back()->withErrors([
            'login' => 'NIM atau password salah!'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
