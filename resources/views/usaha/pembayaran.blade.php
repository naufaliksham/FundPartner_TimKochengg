@extends('layout')
@section('content')
<div class="centered">
    <div class="card" style="width: 400px;">
        <div class="card-body">
            <h5 class="card-title" style="text-align:center">Pembayaran</h5>
            {{-- {{dd($biaya->id)}} --}}
            <p class="card-text" style="text-align: right">Saldo: Rp.{{ number_format($saldo,0,',','.') ?? '-' }}</p>
            <p class="card-text" style="text-align: right">{{$biaya->tanggal_jatuh_tempo}}</p>
            <form method="POST" action="{{route('pembayaran', ['id' => $biaya->id])}}">
                @csrf

                    @php 
                        $tempo = $biaya->tanggal_jatuh_tempo;
                        $today = now()->format('Y-m-d');
                        $fee = round(($biaya->jumlah_pembayaran * 0.05), 2);
                        // dd($today, $tempo);
                        if ($today > $tempo) {
                            $test = true;
                            $denda = now()->diffInDays($tempo) * 100;
                            
                        }else {
                            $test = false;
                            $denda = 0;
                        }
                        $total = $biaya->jumlah_pembayaran + $denda + $fee;
                        // dd($denda);
                    @endphp

                <div class="form-group">
                    <label for="amount">Jumlah: Rp.{{ number_format($biaya->jumlah_pembayaran,0,',','.') ?? '-' }}</label>
                    <input type="hidden" class="form-control" id="jumlah" name="jumlah" value={{$biaya->jumlah_pembayaran}}>
                </div>

                <div class="form-group">
                    <label for="card_number">Denda: Rp.{{ number_format($denda,0,',','.') ?? '-' }}</label>
                    <input type="hidden" class="form-control" id="card_number" name="denda" value={{$denda}}>
                </div>
                <div class="form-group">
                    <label for="card_number">Biaya aplikasi: Rp.{{ number_format($fee,0,',','.') ?? '-' }} (5%)</label>
                    <input type="hidden" class="form-control" id="card_number" name="fee" value={{$fee}}>
                </div>
                <div class="form-group">
                    <label for="card_number">Jenis:{{$biaya->jenis_pembayaran}}</label>
                    <input type="hidden" class="form-control" id="card_number" name="jenis" value={{$biaya->jenis_pembayaran}}>
                </div>
                <div class="form-group">
                    <label for="card_number">Total: Rp.{{ number_format($total,0,',','.') ?? '-' }}</label>
                    <input type="hidden" class="form-control" id="card_number" name="total" value={{$total}}>
                </div>
                @if ($saldo >= $biaya->jumlah_pembayaran)
                    
                <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                @else
                <button type="submit" class="btn btn-primary" disabled>Bayar Sekarang</button>
                <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading"></h4>
                  <p>Saldo tidak cukup</p>
                  <p class="mb-0"></p>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
</div>
@endsection