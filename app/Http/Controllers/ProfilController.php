<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function showTopupForm()
    {
        return view('profil.topup');
    }

    public function processTopup(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->saldo += $validatedData['amount'];
        $user->save();

        return redirect()->back()->with('success', 'Top-up '. $validatedData['amount'] . ' berhasil!');
    }

    public function showUploadForm()
    {
        return view('profil.upload');
    }

    public function processUpload(Request $request)
    {
        $validatedData = $request->validate([
            'ktp' => 'required|image|max:2048',
            'foto' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('ktp')) {
            $ktpFile = $request->file('ktp');
            // Proses penyimpanan file KTP
            $ktpPath = $ktpFile->store('ktp', 'public');
            // Simpan path KTP ke database atau lakukan operasi lainnya sesuai kebutuhan Anda
        }

        if ($request->hasFile('foto')) {
            $fotoFile = $request->file('foto');
            // Proses penyimpanan file foto
            $fotoPath = $fotoFile->store('foto', 'public');
            // Simpan path foto ke database atau lakukan operasi lainnya sesuai kebutuhan Anda
        }

        return redirect()->back()->with('success', 'Upload berhasil!');
    }
}
