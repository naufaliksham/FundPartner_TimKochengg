<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usaha;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

            //Pembayaran
            $pembayaran = Pembayaran::where('id_mitra', $id);
            $pembayaran->delete();

            $usaha = Usaha::where('nama_usaha', $request->nama_usaha)->first();
            if ($request->pembayaran == 'lunas') {
                $pelunasan = $request->dana * 1.1;
                $tempo = Carbon::now()->addDays(7*$request->waktu);
            
                $newPayment = new Pembayaran;
                $newPayment->id_mitra = $usaha->id;
                $newPayment->jumlah_pembayaran = $pelunasan;
                $newPayment->status = false;
                $newPayment->jenis_pembayaran = $request->pembayaran;
                $newPayment->tanggal_jatuh_tempo = $tempo;
                $newPayment->save();
                $request->session()->flash('success', 'Usaha berhasil ditambahkan');
            } else {
                $pelunasan = (($request->dana * 1.1) / $request->waktu);
                $tempo = Carbon::now()->addDays(7);
                // dd($usaha->id);
                for ($i = 1; $i <= $request->waktu; $i++) {
                    $newPayment = new Pembayaran;
                    $newPayment->id_mitra = $usaha->id;
                    $newPayment->jumlah_pembayaran = $pelunasan;
                    $newPayment->status = false;
                    $newPayment->jenis_pembayaran = $request->pembayaran;
                    $newPayment->tanggal_jatuh_tempo = $tempo;
                    $newPayment->save();
                    $tempo = $tempo->addDays(7);
                    $request->session()->flash('success', 'Usaha berhasil ditambahkan');
                };
            }

            return redirect('rincian');

        } else {
            $usaha = Usaha::findorfail($id);
            $usaha->id_mitra = $request->id_mitra;
            $usaha->nama_usaha = $request->nama_usaha;
            $usaha->deskripsi = $request->input('deskripsi');
            $usaha->dana = $request->dana;
            $usaha->waktu = $request->waktu;
            $usaha->pembayaran = $request->pembayaran;
            $usaha->save();

            //Pembayaran
            $pembayaran = Pembayaran::where('id_mitra', $id);
            $pembayaran->delete();

            $usaha = Usaha::where('nama_usaha', $request->nama_usaha)->first();
            if ($request->pembayaran == 'lunas') {
                $pelunasan = $request->dana * 1.1;
                $tempo = Carbon::now()->addDays(7*$request->waktu);
            
                $newPayment = new Pembayaran;
                $newPayment->id_mitra = $usaha->id;
                $newPayment->jumlah_pembayaran = $pelunasan;
                $newPayment->status = false;
                $newPayment->jenis_pembayaran = $request->pembayaran;
                $newPayment->tanggal_jatuh_tempo = $tempo;
                $newPayment->save();
                $request->session()->flash('success', 'Usaha berhasil ditambahkan');
            } else {
                $pelunasan = (($request->dana * 1.1) / $request->waktu);
                $tempo = Carbon::now()->addDays(7);
                // dd($usaha->id);
                for ($i = 1; $i <= $request->waktu; $i++) {
                    $newPayment = new Pembayaran;
                    $newPayment->id_mitra = $usaha->id;
                    $newPayment->jumlah_pembayaran = $pelunasan;
                    $newPayment->status = false;
                    $newPayment->jenis_pembayaran = $request->pembayaran;
                    $newPayment->tanggal_jatuh_tempo = $tempo;
                    $newPayment->save();
                    $tempo = $tempo->addDays(7);
                    $request->session()->flash('success', 'Usaha berhasil ditambahkan');
                };
            }

            return redirect('rincian');
        }
    }

    public function destroy($id)
    {
        $usaha = Usaha::find($id);
        $usaha->usaha2()->delete();
        $usaha->delete();
        $pembayaran = Pembayaran::where('id_mitra', $id);
        $pembayaran->delete();
        return redirect('indexmitra');
    }


    // public function rincian()
    // {
    //     $userID = Auth::id();
    //     $details = Usaha::with('usaha')->where('id_mitra', $userID)->get();
    //     return view('usaha.rincianInvestment', compact('details'));
    // }
}

