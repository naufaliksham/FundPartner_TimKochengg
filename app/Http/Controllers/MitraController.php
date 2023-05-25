<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    public function index()
    {

    return view("mitra.index");
    }

    public function create()
    {

    return view("usaha.formUsaha");
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_usaha' => ['required','string', 'max:100', 'unique:'.Usaha::class],
            'id_mitra' => ['required','integer'],
            'deskripsi' => ['required','string'],
            'dana' => ['required', 'integer'],
            'gambar' => ['required', File::types(['jpg', 'jpeg', 'png', 'gif','jfif'])->max(12 * 1024)],
        ]);
        
        $path = Storage::putFile('gambar', $request->file('gambar'));
        $usaha = new Usaha;
        $usaha->id_mitra = $request->id_mitra;
        $usaha->nama_usaha = $request->nama_usaha;
        $usaha->deskripsi = $request->deskripsi;
        $usaha->dana = $request->dana;
        $usaha->gambar = $path;
        $usaha->save();
        
        $details = Usaha::with('usaha')->where('id_mitra', $request->id_mitra)->get();
        return view('usaha.detailUsaha', compact('details'));
    }
}
