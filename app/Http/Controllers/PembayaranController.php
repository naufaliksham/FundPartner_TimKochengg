<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Transaksi;
use App\Models\Usaha;
use App\Models\User;
use Dotenv\Util\Str;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    
    public function show(){
        $userID = Auth::id();
        $biaya = Pembayaran::all();
        $details = Usaha::with('usaha')->where('id_mitra', $userID)->get();
        $transaksi = Transaksi::where('id_user', $userID)->get();
        
        return view('usaha.rincianInvestment', compact('biaya', 'details', 'transaksi'));
    }
    public function bayar($id){
        $biaya = Pembayaran::find($id);
        $saldo = Auth::user()->saldo;
        return view('usaha.pembayaran', compact('biaya', 'saldo'));
    }

    public function pembayaran(Request $request, $id)
    {
        
        DB::transaction(function () use ($request, $id) {
            //Update saldo
            $userID = Auth::id();
            $user = User::find($userID);
            $saldo = $user->saldo;
            $user->saldo = $saldo - $request->total;
            $user->save();

            //update saldo investor
            $mitra= Usaha::where('id_mitra', $userID)->first();
            $investorID = $mitra->id_investor;
            $user = User::find($investorID);
            $saldo = $user->saldo;
            $user->saldo = $saldo + $request->jumlah;
            $user->save();



            //Update status pembayaran
            $bayar = Pembayaran::find($id);
            $bayar->status = 1;
            $bayar->save();

            //buat transaksi
            $mitra = Usaha::where('id_mitra', $userID)->first();
            $mitraID = $mitra->id;
            $transaksi = new Transaksi();
            $transaksi->id = \Ramsey\Uuid\Uuid::uuid4()->toString();
            $transaksi->id_user = $userID;
            $transaksi->id_mitra = $mitraID;
            $transaksi->id_pembayaran = $id;
            $transaksi->jumlah_pembayaran = $request->jumlah;
            $transaksi->jenis_pembayaran = $request->jenis;
            $transaksi->denda = $request->denda;
            $transaksi->fee = $request->fee;
            $transaksi->total = $request->total;
            $transaksi->save();
            $request->session()->flash('success', 'Transaksi berhasil.');
        });
        return redirect()->route('rincianInvestment');
    }
    
}
