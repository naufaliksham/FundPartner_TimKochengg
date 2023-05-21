<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;

class DetailUsahaController extends Controller
{
    
    public function showDetailUsaha()
    {
        $details = Usaha::all();
        return view('usaha.detailUsaha', compact('details'));
    }
}
