<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function mitraUmkmList()
    {
        $mitraUmkmUsers = User::where('role', '1')->paginate(10);

        return view('admin.mitra', compact('mitraUmkmUsers'));
    }

    public function investorList()
    {
        $investorUsers = User::where('role', '0')->paginate(10);

        return view('admin.investor', compact('investorUsers'));
    }

    // edit saldo
//     public function editInvestorSaldo($id)
// {
//     $investorUser = User::findOrFail($id);

//     return view('admin.edit_saldo', compact('investorUser'));
// }

// public function updateInvestorSaldo(Request $request, $id)
// {
//     $investorUser = User::findOrFail($id);
//     $investorUser->saldo = $request->input('saldo');
//     $investorUser->save();

//     return redirect()->route('investorAdmin')->with('success', 'Saldo investor berhasil diperbarui.');
// }

public function validasi($id) {
    $investor = User::findOrFail($id);
    $investor->validasi_ktp = "valid";
    $investor->save();

    $nama = $investor->name;
    return back()->with('success', 'Validasi foto ' . $nama . ' berhasil');

}
}