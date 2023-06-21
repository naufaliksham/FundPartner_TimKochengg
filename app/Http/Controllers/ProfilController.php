<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->id());

        return view('profil.index', compact('user'));
    }
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

        return redirect()->back()->with('success', 'Top-up Rp'. $validatedData['amount'] . ' berhasil!');
    }

    public function showUploadForKtp()
    {
        return view('profil.uploadKtp');
    }
    public function showUploadForFoto()
    {
        return view('profil.uploadFoto');
    }

    public function processUpload(Request $request)
    {
        if ($request->hasFile('ktp')) {
            $validatedKtpData = $request->validate([
                'ktp' => 'required|image|max:2048',
            ]);
    
            $ktpFile = $request->file('ktp');
            // Proses penyimpanan file KTP
            $ktpPath = $ktpFile->store('ktp', 'public');
            // Simpan path KTP ke database atau lakukan operasi lainnya sesuai kebutuhan Anda
    
            $user = User::findOrFail(Auth::user()->id);
            $user->ktp = $ktpPath;
            $user->validasi_ktp = "invalid";
            $user->save();
        } else if ($request->hasFile('foto')) {
            $validatedFotoData = $request->validate([
                'foto' => 'required|image|max:2048',
            ]);
    
            $fotoFile = $request->file('foto');
            // Proses penyimpanan file foto
            $fotoPath = $fotoFile->store('foto', 'public');
            // Simpan path foto ke database atau lakukan operasi lainnya sesuai kebutuhan Anda
    
            $user = User::findOrFail(Auth::user()->id);
            $user->foto = $fotoPath;
            $user->validasi_ktp = "invalid";
            $user->save();
        } else {
            return redirect()->back()->withErrors(['foto' => 'Pilih file terlebih dahulu.'])->withInput();
        }
    
        return redirect()->back()->with('success', 'Upload berhasil!');
    }
    

}
