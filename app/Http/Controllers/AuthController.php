<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // $userRole = ($user->role == 0) ? 'Investor' : 'Mitra UMKM';
            // return "User " . $user->name . ", Role: " . $userRole;
            
            // return redirect('/login')->with('success', 'Berhasil mendaftarkan akun, silahkan login.'. $userRole);
            
            $userRole = $user->role;
            if ($userRole == "mitra_umkm") {
                return redirect('/indexmitra');
            }

            if ($userRole == "investor") {
                return redirect('/investor-page');
            }

            if ($userRole == "admin") {
                return redirect('/admin');
            }
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
            'name.required' => 'Nama lengkap harus diisi.',
            'name.string' => 'Nama lengkap harus berupa teks.',
            'name.max' => 'Nama lengkap tidak boleh melebihi 255 karakter.',
            'email.required' => 'Alamat email harus diisi.',
            'email.string' => 'Alamat email harus berupa teks.',
            'email.email' => 'Alamat email tidak valid.',
            'email.max' => 'Alamat email tidak boleh melebihi 255 karakter.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus memiliki panjang minimal 8 karakter.',
            'password.confirmed' => 'Password tidak sesuai.',
            'role.integer' => 'Pilih peran yang sesuai.',
            'role.in' => 'Pilih peran yang sesuai.',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        // Auth::login($user);

        return redirect('/login')->with('success', 'Berhasil mendaftarkan akun, silahkan login.');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Anda berhasil keluar.');
    }

}
