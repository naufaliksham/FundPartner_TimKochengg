@extends('investor.layout_investor')
@section('content')
<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-auto mx-auto">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Nama Customer</th>
                        <th>Jenis Pembayaran</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Fee</th>
                        <th>Denda</th>
                        <th>Waktu Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $history)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="text-transform: capitalize">{{ $history->mitra->nama_usaha }}</td>
                        <td>{{ $history->user->name }}</td>
                        <td style="text-transform: capitalize">{{ $history->jenis_pembayaran }}</td>
                        <td>Rp. {{ number_format($history->total, 2) }}</td>
                        <td>Rp. {{ number_format($history->fee, 2) }}</td>
                        <td>Rp. {{ number_format($history->denda, 2)}}</td>
                        <td>{{ $history->created_at->format("d-F-Y") }}</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" class="btn btn-warning mr-2">EDIT</a>
                            <a href="#" class="btn btn-danger">DELETE</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination mt-3">
                {{ $histories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection