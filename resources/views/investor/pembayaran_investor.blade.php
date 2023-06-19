@extends('investor.layout_investor')
@section('content')

@if ($mess = Session::get('insufficient-balance'))
<div class="alert alert-danger mx-5 mt-5 text-center" role="alert">
    <p>{!! $mess !!}</p>
</div>
@endif
<div class="centered">
    <div class="card" style="width: 400px;">
        <div class="card-body">
            <h5 class="card-title" style="text-align:center; text-transform: uppercase">Pembayaran</h5>
            <p class="card-text" style="text-align: right">Saldo: Rp. {{ number_format(Auth::user()->saldo, 2) }}</p>
            <p>Nama Usaha <span
                    style="text-transform: uppercase; font-weight: 800">{{ $payment_data->pembayaran->nama_usaha }}</span>
            </p>
            <form method="POST" action="{{ URL('bayar-sekarang', $payment_data->id) }}">
                @csrf

                @php
                $tempo = $payment_data->tanggal_jatuh_tempo;
                $today = now()->format('Y-m-d');
                $fee = round(($payment_data->jumlah_pembayaran * 0.05), 2);
                $fee_apk = "5000";
                if ($today > $tempo) {
                $denda = now()->diffInDays($tempo) * 100;
                }else {
                $denda = 0;
                }

                $total = $payment_data->jumlah_pembayaran + $denda + $fee_apk;
                @endphp

                <div class="form-group">
                    <p>Jumlah Pembayaran: <span>Rp. {{ number_format($payment_data->jumlah_pembayaran, 2) }}</span></p>
                    <input type="hidden" class="form-control" id="jumlah" name="jumlah"
                        value={{$payment_data->jumlah_pembayaran}}>
                </div>

                <div class="form-group">
                    <p> <span>Denda: {{$denda}}</span></p>
                    <input type="hidden" class="form-control" name="denda" value={{$denda}}>
                </div>
                <div class="form-group">
                    <p> <span>Biaya aplikasi: </span> Rp. {{ number_format($fee_apk, 2) }}</p>
                    <input type="hidden" class="form-control" name="fee" value={{$fee}}>
                </div>
                <div class="form-group">
                    <p> <span>Jenis Pembayaran: {{$payment_data->jenis_pembayaran}}</span></p>
                    <input type="hidden" class="form-control" name="jenis_pembayaran"
                        value={{$payment_data->jenis_pembayaran}}>
                </div>
                <div class="form-group">
                    <p> <span>Total: Rp. {{ number_format($total, 2) }}</span></p>
                    <input type="hidden" class="form-control" name="total" value={{$total}}>
                </div>
                <p class="card-text mt-1" style="text-align: left">Tanggal Jatuh Tempo:
                    {{$payment_data->tanggal_jatuh_tempo}}</p>
                <button type="submit" class="btn btn-primary">BAYAR</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
