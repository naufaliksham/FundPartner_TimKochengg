<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Usaha;
use Ramsey\Uuid\Uuid;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Eloquent\Builder;

class InvestorController extends Controller
{
    /**
     * Views page for investor
     */
    public function index() {
        // $datas = Usaha::with('payment')->get();
        $datas = Usaha::where('status', 'Belum didanai')->paginate(5);
        $statusToExclude = ['Belum didanai'];

        $data2 = Usaha::where('id_investor', Auth::user()->id)
            ->whereNotIn('status', $statusToExclude)
            ->orderByRaw('RAND()')
            ->take(8)
            ->get();
        return view('investor.index')->with('datas', $datas)->with('usaha2', $data2);
    }

    public function showRincian($id){
        $userID = Auth::id();
        $details = Usaha::with('usaha')->where('id_investor', $userID)->where('id', $id)->get();
        $transaksi = Transaksi::where('id_mitra', $id)->get();

        // if (empty($first)){
        //     return redirect('/indexmitra');
        // }
        // else{
            $biaya = Pembayaran::where('id_mitra', $id)->get();
        // }
        
        
        // dd($waktuDidanai);
        
        return view('investor.rincian_mitra', compact('biaya', 'details', 'transaksi'));
    }
    /**
     * Return data will be to paid
     * 
     * This Fn will return valid data with status code 200
     * 
     * If not valid will return empty data with status code 404
     */
    public function payment($id) {
        $dataToBePaid = Pembayaran::with(['pembayaran' => function(Builder $q) {
            $q->select('id', 'nama_usaha');
        }])->where('id', $id)->firstOrFail();

        return view('investor.pembayaran_investor', [
            'payment_data' => $dataToBePaid
        ]);
    }

    public function danai($id){
        $usaha = Usaha::find($id);
        $saldo = Auth::user()->saldo;
        return view('investor.pembayaran_investor', compact('usaha', 'saldo'));
    }
    function tagihan(Request $request, $id)
    {
        //GENERATE PEMBAYARAN
        //Fungsi ini akan menggenerate pembayaran sesuai dengan waktu fungsi ini digunakan, dan mengubah status usaha menjadi didanai
        //karena fungsi ini hanya digunakan ketika investor menekan tombol bayar
        //kurangnya yaitu menambahkan id investor dan mentransfer saldo investor ke mitra
        DB::transaction(function () use ($request, $id){


            $usaha = Usaha::find($id);
            $investor = User::find(Auth::id());
            $mitra = User::find($usaha->id_mitra);
            //generate pembayaran
            if ($usaha->pembayaran == 'lunas') {
                $pelunasan = $usaha->dana * 1.1; //Menghitung pelunasan ,1.1 = 10% keuntungan
                $tempo = Carbon::now()->addDays(7 * $usaha->waktu);
                $newPayment = new Pembayaran;
                $newPayment->id_mitra = $usaha->id; //Mengisi id_mitra
                $newPayment->jumlah_pembayaran = $pelunasan;
                $newPayment->status = false;
                $newPayment->jenis_pembayaran = $usaha->pembayaran;
                $newPayment->tanggal_jatuh_tempo = $tempo;
                $newPayment->save();
                session()->flash('success', 'Usaha berhasil didanai');
            } else {
                $pelunasan = (($usaha->dana * 1.1) / $usaha->waktu);
                $tempo = Carbon::now()->addDays(7);
                for ($i = 1; $i <= $usaha->waktu; $i++) {
                    $newPayment = new Pembayaran;
                    $newPayment->id_mitra = $usaha->id;
                    $newPayment->jumlah_pembayaran = $pelunasan;
                    $newPayment->status = false;
                    $newPayment->jenis_pembayaran = $usaha->pembayaran;
                    $newPayment->tanggal_jatuh_tempo = $tempo;
                    $newPayment->save();
                    $tempo = $tempo->addDays(7);
                    session()->flash('success', 'Usaha berhasil didanai');
                };
            };
            $usaha->status = 'didanai'; //Mengubah status menjadi didanai
            $usaha->id_investor = Auth::id(); //Mengisi id_investor
            $usaha->save();
            $mitra->saldo = $mitra->saldo + $usaha->dana; //Mentransfer saldo investor ke mitra
            $mitra->save();
            $investor->saldo = $investor->saldo - $request->total; //Mengurangi saldo investor
            $investor->save();
        });
        if(Auth()->user()->role == 'investor'){
            return redirect()->route('indexinvestor');
        }
        else{
            return redirect()->route('indexmitra');
        }
    }

    /**
     * This Fn will handle payment method for investor
     * 
     * Check if the user's balance is sufficient, then the user is allowed to make a payment.
     * 
     * If successful then the status will be updated to TRUE, otherwise no update occurs
     */
    public function handlePayment(Request $req, $id) {
        if (Auth::user()->saldo <= $req->total) {
            return redirect()->back()->with('insufficient-balance', "Mohon Maaf Saldo Anda Tidak Cukup Untuk Melakukan Pembayaran");
        }
        
        $businessName = Usaha::select("id", "nama_usaha", "status")
                                ->where('id', $id)
                                ->firstOrFail();
        DB::beginTransaction();
        try {
            $getSaldoUserToBePaid = User::select("id", "saldo")
                                        ->whereId(Auth::id())
                                        ->firstOrFail();
            $getSaldoUserToBePaid->saldo = (int) $getSaldoUserToBePaid->saldo - (int) $req->total;
            $getSaldoUserToBePaid->save();

            $paymentStatus = Pembayaran::find($id);
            $paymentStatus->status = 1;
            $paymentStatus->save();

            $transaction = Transaksi::create([
                'id' => Uuid::uuid4(),
                'id_user' => Auth::id(),
                'id_mitra' => $businessName->id,
                'id_pembayaran' => $id,
                'jenis_pembayaran' => $req->jenis_pembayaran,
                'jumlah_pembayaran' => $req->total,
                'denda' => $req->denda,
                'fee' => $req->fee,
                'total' => $req->total,
                'waktu_pembayaran' => Carbon::now()
            ]);

            DB::commit();
            return redirect('investor-page')->with('transaction-success', 'Transaksi Pada ' . '<b>' . $businessName->nama_usaha . '</b>' . " Telah Berhasil.");
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage(), Auth::id());
            return redirect('investor-page')->with('transaction-error', 'Transaksi Pada ' . '<b>' . $businessName->nama_usaha . '</b>' . " Gagal. Kesalahan Pada Sisi Server.");
        }
    }

    public function historyTransaction() {
        $historyTransactions = Transaksi::with([
                                                'mitra' => function($q) {
                                                    $q->select("id", "nama_usaha");
                                                },
                                                'user' => function($q) {
                                                    $q->select("id", "name");
                                                }
                                                ])->paginate(1);
        return view('investor.histori_transaksi', [
            'histories' => $historyTransactions
        ]);
    }
}