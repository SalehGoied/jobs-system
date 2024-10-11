<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login form (only for guests)
    public function showLoginForm()
    {
        if (Auth::check()) {
            // If the user is already authenticated, redirect them based on their role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'employee') {
                return redirect('/positions');
            } else {
                return redirect('/home');
            }
        }

        // If not authenticated, show the login form
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate the login form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login with provided credentials
        if (Auth::attempt($request->only('email', 'password'))) {
            // Successful login, redirect based on role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'employee') {
                return redirect()->intended('/positions');
            } else {
                return redirect()->intended('/home');
            }
        }

        // Login failed, redirect back to login form with error
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    // Handle logout request
    public function logout()
    {
        Auth::logout();

        // After logout, redirect to the login page
        return redirect()->route('show.login');
    }
}
