@extends('layout')
@section('content')
    <div class="page-wrapper">

        <!--Project Details Top-->
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
                                        <h3>Investor</h3>
                                        <img src="assets/images/project/person-img-1.png" alt="">
                                    </div>
                                    <div class="creator_info">
                                        <h4>{{ $item->usaha->name }}</h4>
                                    </div>
                                    <div class="project_detail_creator_text">
                                        <p>Crochet designer and Creator of the Woolly Chic brand.
                                            Loves British wool and is passionate about the
                                            environment.</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <h5>Tenggat: </h5>
                            <div class="progress-levels project_details_progress-levels">
                                <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner count-box">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="skill-percent">
                                                    {{-- Menghitung persen --}}
                                                    @php
                                                        $day = $item->waktu * 7;
                                                        $date = $item->created_at;
                                                        $today = date('Y-m-d');
                                                        $addedDay = date('Y-m-d', strtotime($date . '+' . $day . ' days'));
                                                        $diff = strtotime($addedDay) - strtotime($today);
                                                        $remain = floor($diff / (60 * 60 * 24));
                                                        if ($remain != $day) {
                                                            $data = number_format(($remain / $day) * 100);
                                                        } else {
                                                            $data = 0;
                                                        }
                                                    @endphp
                                                    <span>- </span>
                                                    <span class="count-text" data-speed="3000"
                                                        data-stop={{ $remain }}></span>
                                                    <span class="percent"> Hari</span>
                                                </div>
                                                <div class="bar-fill" data-percent={{ $data }}></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6>{{ $addedDay }}</h6>

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
                            <li data-tab="#finance" class="tab-btn"><span>Investment</span></li>
                            <li data-tab="#transaksi" class="tab-btn"><span>Riwayat Transaksi</span></li>
                        </ul>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="idea">
                                <div class="project_idea_details">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-8">
                                            <div class="project_idea_details_content">
                                                {!! $item->deskripsi !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab" id="finance">
                                <div class="project_idea_details">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-8">
                                            <div class="project_idea_details_content">
                                                <h4>Metode Pembayaran: {{ $item->pembayaran }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Tanggal Tempo</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($biaya as $bayar)
                                                    @if ($bayar->id_mitra == $item->id)
                                                        <tr>
                                                            <th scope="row">{{ $bayar->tanggal_jatuh_tempo }}</th>
                                                            <td>Rp.{{ number_format($bayar->jumlah_pembayaran,0,',','.') ?? '-' }}</td>
                                                            @if ($bayar->status == 0)
                                                                <td>Belum dibayar</td>
                                                            @else
                                                                <td>Lunas</td>
                                                            @endif
                                                            <td>
                                                                @if ($bayar->status == 0)
                                                                    <a href="{{ route('bayar', ['id' => $bayar->id]) }}"
                                                                        class="btn btn-sm btn-primary">Bayar</a>
                                                                @else
                                                                    <i class="fas fa-check-circle"></i>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab" id="transaksi">
                                <div class="project_idea_details">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-8">
                                            <div class="project_idea_details_content">
                                                <h4>Riwayat Transaksi</h4>
                                            </div>
                                        </div>
                                    </div>
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
                                                @foreach ($transaksi as $riwayat)
                                                {{-- {{dd($riwayat->id)}} --}}
                                                    @if ($riwayat->id_mitra == $item->id)
                                                        <tr>
                                                            <th scope="row">{{ $riwayat->id_pembayaran }}</th>
                                                            <td>{{ $riwayat->jenis_pembayaran }}
                                                            </td>
                                                            <td>
                                                                Rp.{{ number_format($riwayat->jumlah_pembayaran,0,',','.') ?? '-' }}
                                                            </td>
                                                            <td>
                                                                Rp.{{ number_format($riwayat->denda,0,',','.') ?? '-' }}
                                                            </td>
                                                            <td>
                                                                Rp.{{ number_format($riwayat->fee,0,',','.') ?? '-' }}
                                                            </td>
                                                            <td>Rp.{{ number_format($riwayat->total,0,',','.') ?? '-' }}
                                                            </td>
                                                            <td>{{ $riwayat->waktu_pembayaran }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    @endforeach

    <!--Categories Two Start-->
    <div class="categories_two">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <ul class="categories_two_menu list-unstyled">
                        <li><a href="#">Fashion</a></li>
                        <li class="active"><a href="#">Design</a></li>
                        <li><a href="#">Film & Video</a></li>
                        <li><a href="#">Games</a></li>
                        <li><a href="#">Health & Fitness</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Education</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
