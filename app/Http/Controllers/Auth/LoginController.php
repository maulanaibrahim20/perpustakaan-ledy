<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email atau Password Salah');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau Password Salah');
        }

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();

            if ($user->role == 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Login Berhasil Sebagai Admin');
            }
            if ($user->role == 'user') {
                return redirect('/')->with('success', 'Login Berhasil Sebagai User');
            }
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout Berhasil');
    }
}
