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
            <p class="card-text" style="text-align: right">Saldo anda : Rp{{ number_format(Auth::user()->saldo, 0, ',', '.') ?? '-' }}</p>
            <p>Nama Usaha <span
                    style="text-transform: uppercase; font-weight: 800">{{ $usaha->nama_usaha }}</span>
            </p>
            <form method="POST" action="{{ route('tagihan', ['id' =>$usaha->id ]) }}">
                @csrf

                @php

                $today = now()->format('Y-m-d');
                if ($saldo < '5000') {
                    $fee_apk = "0";
                }
                else {
                    # code...
                    $fee_apk = "5000";
                }
                            $total = $usaha->dana +  + $fee_apk;
                @endphp
                    {{-- <div style="display: flex; justify-content: space-between; align-items: baseline;">
                        <h5 style="text-align: left; margin-bottom: 0;">Saldo:
                            Rp{{ $saldo }}</h5>
                    </div> --}}
                    <hr>
                    <table style="width: 100%;">
                        <tr>
                            <th style="text-align: left;">Jumlah</th>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">
                                Rp{{ number_format($usaha->dana, 0, ',', '.') ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Biaya aplikasi(5k)</th>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">Rp{{ number_format($fee_apk, 0, ',', '.') ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Total</th>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">Rp{{ number_format($total, 0, ',', '.') ?? '-' }}</td>
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
                        @if ($saldo >= $usaha->dana)
                            <button type="submit" class="btn btn-primary" onclick="return confirmSubmit()">Bayar Sekarang</button>
                        @else
                            <button type="submit" class="btn btn-primary" disabled>Bayar Sekarang</button>
                            <div class="alert alert-danger mt-3" role="alert">
                                <p class="mb-0">Saldo tidak cukup</p>
                            </div>
                        @endif
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
