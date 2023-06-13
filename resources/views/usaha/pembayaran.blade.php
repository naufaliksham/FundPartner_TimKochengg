@extends('layout')
@section('content')
    <div class="centered">
        <div class="card" style="width: 400px;">
            <div class="card-body">
                <h5 class="card-title" style="text-align:center">Pembayaran</h5>
                <hr>
                {{-- {{dd($biaya->id)}} --}}
                <form method="POST" action="{{ route('pembayaran', ['id' => $biaya->id]) }}">
                    @csrf

                    @php
                        $tempo = $biaya->tanggal_jatuh_tempo;
                        $today = now()->format('Y-m-d');
                        $fee = round($biaya->jumlah_pembayaran * 0.05, 2);
                        // dd($today, $tempo);
                        if ($today > $tempo) {
                            $test = true;
                            $denda = now()->diffInDays($tempo) * 100;
                        } else {
                            $test = false;
                            $denda = 0;
                        }
                        $total = $biaya->jumlah_pembayaran + $denda + $fee;
                        // dd($denda);
                    @endphp
                    <div style="display: flex; justify-content: space-between; align-items: baseline;">
                        <h5 style="text-align: left; margin-bottom: 0;">Saldo:
                            Rp.{{ number_format($saldo, 0, ',', '.') ?? '-' }}</h5>
                        <h5 style="text-align: left; margin-bottom: 0;">{{ $biaya->tanggal_jatuh_tempo }}</h5>
                    </div>
                    <hr>
                    <table style="width: 100%;">
                        <tr>
                            <th style="text-align: left;">Jumlah</th>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">
                                Rp.{{ number_format($biaya->jumlah_pembayaran, 0, ',', '.') ?? '-' }}</td>
                            <input type="hidden" name="jumlah" value="{{ $biaya->jumlah_pembayaran }}">
                        </tr>
                        <tr>
                            <th style="text-align: left;">Denda</th>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">Rp.{{ number_format($denda, 0, ',', '.') ?? '-' }}</td>
                            <input type="hidden" name="denda" value="{{ $denda }}">
                        </tr>
                        <tr>
                            <th style="text-align: left;">Biaya aplikasi</th>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">Rp.{{ number_format($fee, 0, ',', '.') ?? '-' }} (5%)</td>
                            <input type="hidden" name="fee" value="{{ $fee }}">
                        </tr>
                        <tr>
                            <th style="text-align: left;">Jenis</th>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">{{ $biaya->jenis_pembayaran }}</td>
                            <input type="hidden" name="jenis" value="{{ $biaya->jenis_pembayaran }}">
                        </tr>
                        <tr>
                            <th style="text-align: left;">Total</th>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">Rp.{{ number_format($total, 0, ',', '.') ?? '-' }}</td>
                            <input type="hidden" name="total" value="{{ $total }}">
                        </tr>
                    </table>
                    <hr>
                    <div class="text-center">

                        <script>
                            function confirmSubmit() {
                                var agree = confirm("Apakah anda yakin ingin membayar?");
                                if (agree) {
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        </script>
                        @if ($saldo >= $biaya->jumlah_pembayaran)
                            <button type="submit" class="btn btn-primary" onclick="return confirmSubmit()">Bayar Sekarang</button>
                        @else
                            <button type="submit" class="btn btn-primary" disabled>Bayar Sekarang</button>
                            <div class="alert alert-success mt-3" role="alert">
                                <p class="mb-0">Saldo tidak cukup</p>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
