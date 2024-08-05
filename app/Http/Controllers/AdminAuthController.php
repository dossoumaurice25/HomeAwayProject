<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login()
    {
       return view('admin.login');
    }

    public function handleLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Vous êtes déconnecté');
    }
}
