<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    
    public function show(){
        $userID = Auth::id();
        $biaya = Transaksi::with('user')->where('id_user', $userID)->get();
        $details = Usaha::with('usaha')->where('id_mitra', $userID)->get();
        
        return view('usaha.rincianInvestment', compact('biaya', 'details'));
    }

}
