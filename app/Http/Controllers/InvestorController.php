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
        $datas = Usaha::with('payment')->where('status', 'Belum didanai')->paginate(2);
        $data2 = Usaha::where('status', 'Didanai')->where('id_investor', Auth::user()->id)->where('status', 'didanai')->orderBy('created_at', 'desc')->take(8)->get();
        // foreach ($datas as $data) {
        //     dd($data->payment->status);
        // }
        return view('investor.index')->with('datas', $datas)->with('usaha2', $data2);
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