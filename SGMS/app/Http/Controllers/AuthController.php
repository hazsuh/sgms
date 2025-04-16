<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Import model User
use Illuminate\Support\Facades\Hash;  // Import Hash facade
use Illuminate\Support\Facades\Auth; // Import Auth facade

class AuthController extends Controller
{
    // Fungsi untuk memaparkan borang login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Fungsi untuk login
    public function login(Request $request)
    {
        // Validasi data input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Loginkan pengguna
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/dashboard'); // Redirect ke halaman dashboard selepas login
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Fungsi untuk memaparkan borang pendaftaran
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Fungsi untuk pendaftaran
    public function register(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Simpan data pengguna ke dalam database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Loginkan pengguna secara automatik selepas pendaftaran
        auth()->login($user);

        // Redirect ke halaman login atau halaman utama
        return redirect()->route('login')->with('success', 'Registration successful, please login!');
    }

    // Fungsi untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have successfully logged out!');
    }
}
