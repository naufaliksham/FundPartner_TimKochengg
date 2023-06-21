<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usaha;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;


class MitraController extends Controller
{
    public function index()
    {
        $data = Usaha::all();
        $data2 = Usaha::where('status', 'Belum didanai')->orderBy('created_at', 'desc')->take(8)->get();
        $data3 = User::where('role', '0')->count();
        $data4 = Usaha::where('status', 'Didanai')->count();
        $data5 = Usaha::count();
        $data6 = Usaha::where('status', 'Didanai')->get();
        $data7 = User::where('role', '1')->count();

        

        // return view("mitra.index",$data,$data2);
        return view('mitra.index')->with('usaha', $data)->with('usaha2', $data2)->with('usaha3', $data3)
            ->with('usaha4', $data4)->with('usaha5', $data5)->with('usaha6', $data6)->with('usaha7', $data7);
    }

    public function create()
    {
        $userID = Auth::id();
        $umkm = Usaha::with('usaha')->where('id_mitra', $userID)->where('status', 'Belum didanai')->count();
        $umkm2 = Usaha::with('usaha')->where('id_mitra', $userID)->where('status', 'didanai')->count();

    return view("usaha.formUsaha")->with('usaha',$umkm)->with('usaha2',$umkm2);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_usaha' => ['required', 'string', 'max:100', 'unique:' . Usaha::class],
            'id_mitra' => ['required', 'integer'],
            'deskripsi' => ['required', 'string'],
            'dana' => ['required', 'integer'],
            'waktu' => ['required', 'integer'],
            'pembayaran' => ['required', 'string'],
            'gambar' => ['required', File::types(['jpg', 'jpeg', 'png', 'gif', 'jfif'])->max(12 * 1024)],
        ]);

        $path = Storage::putFile('gambar', $request->file('gambar'));
        $usaha = new Usaha;
        $usaha->id_mitra = $request->id_mitra;
        $usaha->nama_usaha = $request->nama_usaha;
        $usaha->deskripsi = $request->input('deskripsi');
        $usaha->dana = $request->dana;
        $usaha->waktu = $request->waktu;
        $usaha->pembayaran = $request->pembayaran;
        $usaha->gambar = $path;
        $usaha->save();
        $request->session()->flash('success', 'Usaha berhasil ditambahkan');

        // $details = Usaha::with('usaha')->where('id_mitra', $request->id_mitra)->get();
        // return view('usaha.detailUsaha', compact('details'));
        return redirect()->route('rincianInvestment');
    }
}
