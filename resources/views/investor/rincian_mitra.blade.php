{{-- @extends('layout') --}}
@extends('investor.layout_investor')
@section('content')
    
    <div class="page-wrapper">

        <!--Project Details Top-->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @foreach ($details as $item)
            {{-- {{dd($item->id)}} --}}
            <section class="project_details_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="project_details_head">
                                <h3>{{ $item->nama_usaha }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <div class="project_details_image">
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="">
                                @else
                                    <img src="{{ asset('assets/images/project/project_idea-img-1.jpg') }}" alt="">
                                @endif
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="project_details_right_content">
                                <div class="project_detail_creator">
                                    <div class="project_detail_creator_image">
                                        <h3>Pemilik</h3>
                                        @if ($item->usaha->name == null)
                                            <img src="assets/images/project/person-img-1.png" alt="">
                                        @else
                                            <img src="{{ asset('storage/' . Auth::User()->foto) }}" alt="Gambar_Pemilik">
                                        @endif

                                    </div>
                                    <div class="creator_info">
                                        <h4>{{ $item->usaha->name }}</h4>
                                    </div>
                                    <div class="project_detail_creator_text">
                                        {{-- <p>Crochet designer and Creator of the Woolly Chic brand.
                                            Loves British wool and is passionate about the
                                            environment.</p> --}}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>
                
    </div>
    </section>

    <section class="project_details_tab_box">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-tab-box tabs-box">
                        <ul class="tab-btns tab-buttons clearfix list-unstyled">
                            <li data-tab="#idea" class="tab-btn active-btn"><span>Detail Usaha</span></li>
                            @if ($item->status != 'Belum didanai')
                                <li data-tab="#finance" class="tab-btn"><span>Investment</span></li>
                                <li data-tab="#transaksi" class="tab-btn"><span>Riwayat Transaksi</span></li>
                            @endif
                        </ul>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="idea">
                                <div class="project_idea_details">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-8">
                                            <div class="project_idea_details_content">
                                                <div class="project_details_right_top">
                                                    <ul class="project_details_rate_list list-unstyled">
                                                        <li>Membutuhkan <span>Rp.{{ $item->dana }}</span></li>
                                                        <li>Pembayaran: <span>{{$item->pembayaran}}</span></li>
                                                        <li>Waktu pengembalian: <span>{{$item->waktu}} Minggu</span></li>
                                                        {{-- <li><span>60</span>Backers</li> --}}
                                                    </ul>
                                                </div>
                                                <h4>Keterangan</h4>
                                                {!! $item->deskripsi !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($item->status != 'Belum didanai')
                                <div class="tab" id="finance">
                                    <div class="project_idea_details">
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-8">
                                                <div class="project_idea_details_content">
                                                    {{-- {{dd($item->status)}} --}}
                                                    @if ($item->status == "lunas")
                                                    <div class="alert alert-success" role="alert">
                                                      <h4 class="alert-heading"></h4>
                                                      <h5>Mitra Ini Sudah lunas</h5>
                                                      <p class="mb-0"></p>
                                                    </div>
                                                        
                                                    @endif
                                                    <h4>Metode Pembayaran oleh Mitra: {{ $item->pembayaran }}</h4>
                                                    <h5> Total Pengembalian:
                                                        Rp.{{ number_format($item->dana, 0, ',', '.') ?? '-' }} +
                                                        Rp.{{ number_format($item->dana * 0.1, 0, ',', '.') ?? '-' }}
                                                        (Investor)
                                                    </h5>
                                                    <h4 style="font-weight: bold">Saldo: Rp.{{ number_format(Auth::user()->saldo, 0, ',', '.') ?? '-' }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="height: 400px; overflow-y: scroll;">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Tanggal Tempo</th>
                                                            <th scope="col">Jumlah</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($biaya as $bayar)
                                                            @if ($bayar->id_mitra == $item->id)
                                                                <tr>
                                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                                    <td>{{$bayar->id}}</td>
                                                                    <td>{{ $bayar->tanggal_jatuh_tempo }}</td>
                                                                    <td>Rp.{{ number_format($bayar->jumlah_pembayaran, 0, ',', '.') ?? '-' }}
                                                                    </td>
                                                                    @php
                                                                        $tempo = $bayar->tanggal_jatuh_tempo;
                                                                        $today = now()->format('Y-m-d');
                                                                        $diffInDays = now()->diffInDays($tempo);
                                                                        
                                                                    @endphp
                                                                    @if ($bayar->status == 0)
                                                                        @if ($today > $tempo)
                                                                            <td style="background-color: red">Sudah Lewat
                                                                                {{ $diffInDays }} Hari</td>
                                                                        @else
                                                                            <td>Belum dibayarkan</td>
                                                                        @endif
                                                                    @else
                                                                        <td>Lunas</td>
                                                                    @endif
                                                                </tr>
                                                            @endif
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab" id="transaksi">
                                    <div class="project_idea_details">
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-8">
                                                <div class="project_idea_details_content">
                                                    <h4>Riwayat Pengembalian Mitra</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="height: 400px; overflow-y: scroll;">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"> Id</th>
                                                            <th scope="col">Jenis Pembayaran</th>
                                                            <th scope="col">Jumlah Pembayaran</th>
                                                            <th scope="col">Denda</th>
                                                            <th scope="col">Fee</th>
                                                            <th scope="col">Total Pembayaran</th>
                                                            <th scope="col">Tanggal Pembayaran</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- {{dd($transaksi)}} --}}
                                                        @forelse ($transaksi as $riwayat)
                                                            {{-- {{dd($riwayat)}} --}}
                                                            @if ($riwayat->id_mitra == $item->id)
                                                                <tr>
                                                                    <th scope="row">{{ $riwayat->id_pembayaran }}</th>
                                                                    <td>{{ $riwayat->jenis_pembayaran }}
                                                                    </td>
                                                                    <td>
                                                                        Rp.{{ number_format($riwayat->jumlah_pembayaran, 0, ',', '.') ?? '-' }}
                                                                    </td>
                                                                    <td>
                                                                        Rp.{{ number_format($riwayat->denda, 0, ',', '.') ?? '-' }}
                                                                    </td>
                                                                    <td>
                                                                        Rp.{{ number_format($riwayat->fee, 0, ',', '.') ?? '-' }}
                                                                    </td>
                                                                    <td>Rp.{{ number_format($riwayat->total, 0, ',', '.') ?? '-' }}
                                                                    </td>
                                                                    <td>{{ $riwayat->waktu_pembayaran }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @empty
                                                            <tr>
                                                                <td colspan="7" class="text-center">Belum ada Transaksi</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach

@endsection
