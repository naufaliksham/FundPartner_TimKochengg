<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            // return redirect()->intended('/dashboard');

            $user = Auth::user();
            $userRole = ($user->role == 0) ? 'Investor' : 'Mitra UMKM';

            return "User " . $user->name . ", Role: " . $userRole;
        }

        // Autentikasi gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer', 'in:0,1'],
        ], [
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.confirmed' => 'Password tidak sesuai.',
            'role.in' => 'Pilih peran yang sesuai.',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        Auth::login($user);

        return redirect('/login')->with('success', 'Berhasil mendaftarkan akun, silahkan login.');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }
}
