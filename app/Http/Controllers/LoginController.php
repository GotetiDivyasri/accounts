<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(auth()->check()) {
            return redirect()->intended('admin/dashboard');
        }
        return view('admin.login'); 
    }   

    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        // First, check if the username exists
        $user = \App\Models\Admins::where('username', $credentials['username'])->first();

        if (!$user) {
            // Username not found
            return back()->withErrors([
                'username' => 'The username is incorrect.',
            ])->withInput();
        }

        // If username exists, now check the password
        if (!\Illuminate\Support\Facades\Hash::check($credentials['password'], $user->password)) {
            // Password is incorrect
            return back()->withErrors([
                'password' => 'The password is incorrect.',
            ])->withInput();
        }

        // If both are correct, log the user in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        // Fallback in case something else goes wrong
        return back()->withErrors([
            'error' => 'Login failed. Please try again.',
        ])->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
