<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\User;
use Illuminate\Http\Request;

class DetailUsahaController extends Controller
{
    
    public function showDetailUsaha($request)
    {
        $details = Usaha::with('usaha')->where('id_mitra', $request)->get();
        return view('usaha.detailUsaha', compact('details'));
    }
}
