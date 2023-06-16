<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DetailUsahaController extends Controller
{
    
    public function showDetailUsaha()
    {
        $userID = Auth::id();
        $details = Usaha::with('usaha')->where('id_mitra', $userID)->get();
        return view('usaha.detailUsaha', compact('details'));
    }

    public function showDetailUsaha2($id)
    {
        $details = Usaha::with('usaha')->where('id', $id)->get();
        return view('usaha.detailUsaha', compact('details'));
    }

    public function edit($id)
    {
        $item = Usaha::find($id);
        return view('usaha.edit',compact('item'));
    }

    public function update(Request $request, $id)
    {

        if ($request->file('gambar')!=null) {
            $path = Storage::putFile('gambar', $request->file('gambar'));
            $usaha = Usaha::findorfail($id);
            $usaha->id_mitra = $request->id_mitra;
            $usaha->nama_usaha = $request->nama_usaha;
            $usaha->deskripsi = $request->input('deskripsi');
            $usaha->dana = $request->dana;
            $usaha->waktu = $request->waktu;
            $usaha->pembayaran = $request->pembayaran;
            $usaha->gambar = $path;
            $usaha->save();

            return redirect('rincianInvestment');

        } else {
            $usaha = Usaha::findorfail($id);
            $usaha->id_mitra = $request->id_mitra;
            $usaha->nama_usaha = $request->nama_usaha;
            $usaha->deskripsi = $request->input('deskripsi');
            $usaha->dana = $request->dana;
            $usaha->waktu = $request->waktu;
            $usaha->pembayaran = $request->pembayaran;
            $usaha->save();

            return redirect('rincianInvestment');
        }
    }

    public function destroy($id)
    {
        $usaha = Usaha::find($id);
        $usaha->delete();
        return redirect('rincianInvestment');
    }


    // public function rincian()
    // {
    //     $userID = Auth::id();
    //     $details = Usaha::with('usaha')->where('id_mitra', $userID)->get();
    //     return view('usaha.rincianInvestment', compact('details'));
    // }
}

