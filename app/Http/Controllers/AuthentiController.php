<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthentiController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Email/Password Salah');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
