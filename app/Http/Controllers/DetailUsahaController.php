<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\User;
use Illuminate\Http\Request;

class DetailUsahaController extends Controller
{
    
    public function showDetailUsaha()
    {
        $details = Usaha::with('usaha')->get();
        return view('usaha.detailUsaha', compact('details'));
    }
}
