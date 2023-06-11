<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index() {
        $datas = Usaha::with('usaha')->get();
        return view('investor.index', compact('datas'));
    }
}
