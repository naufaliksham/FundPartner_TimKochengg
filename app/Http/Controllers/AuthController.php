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

    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Anda berhasil keluar.');
    }


    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('status', 'Password berhasil diatur ulang. Silahkan login dengan password baru Anda.');
    }

    public function showForgotPasswordForm()
    {
        return view('forgot_password');
    }

    public function showResetPasswordForm($token)
    {
        return view('reset_password', ['token' => $token]);
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $response = Password::reset($request->only(
            'email',
            'password',
            'password_confirmation',
            'token'
        ), function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($response == Password::PASSWORD_RESET) {
            return redirect('/login')->with('status', 'Password berhasil diatur ulang. Silahkan login dengan password baru Anda.');
        } else {
            return back()->withErrors(['email' => 'Terjadi kesalahan saat mengatur ulang password. Silahkan coba kembali.']);
        }
    }
}
