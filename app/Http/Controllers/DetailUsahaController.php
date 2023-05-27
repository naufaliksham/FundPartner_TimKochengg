<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DetailUsahaController extends Controller
{
    
    public function showDetailUsaha()
    {
        $userID = Auth::id();
        $details = Usaha::with('usaha')->where('id_mitra', $userID)->get();
        return view('usaha.detailUsaha', compact('details'));
    }

    public function rincian()
    {
        $userID = Auth::id();
        $details = Usaha::with('usaha')->where('id_mitra', $userID)->get();
        return view('usaha.rincianInvestment', compact('details'));
    }
}

