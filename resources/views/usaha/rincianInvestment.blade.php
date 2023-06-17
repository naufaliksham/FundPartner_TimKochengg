{{-- @extends('layout') --}}
@extends('mitra.layout_mitra')
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
        @foreach ($biaya as $bayar)
            @php
                $tempo = $bayar->tanggal_jatuh_tempo;
                $today = now()->format('Y-m-d');
                $diffInDays = now()->diffInDays($tempo);
                
            @endphp
            @if ($bayar->status == 0)
                @if ($today > $tempo)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Anda Memiliki Pembayaran Jatuh Tempo</strong>
                    </div>

                    <script>
                        $(".alert").alert();
                    </script>
                @endif
            @endif
        @endforeach
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
                                        {{-- <p>Crochet designer and Creator of the Woolly Chic brand.
                                            Loves British wool and is passionate about the
                                            environment.</p> --}}
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

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                            </div>

                            <div class="col-sm">
                                <br>
                                @if ($item->status == 'Belum didanai')
                                    <div class="project_details_btn_box">
                                        <div class="container text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="/editUsaha/{{ $item->id }}"
                                                        class="thm-btn follow_btn">Edit</a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{ route('destroyUsaha', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="thm-btn back_this_project_btn">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                @endif
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
                            @if ($item->status == 'didanai')
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
                                                {!! $item->deskripsi !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($item->status == 'didanai')
                                <div class="tab" id="finance">
                                    <div class="project_idea_details">
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-8">
                                                <div class="project_idea_details_content">
                                                    <h4>Metode Pembayaran: {{ $item->pembayaran }}</h4>
                                                    <h5> Total yang harus dibayarkan:
                                                        Rp.{{ number_format($item->dana, 0, ',', '.') ?? '-' }} +
                                                        Rp.{{ number_format($item->dana * 0.1, 0, ',', '.') ?? '-' }}
                                                        (Investor)
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
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
                                                                <th scope="row">{{ $loop->iteration }}</th>
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
                                                                        <td>Belum dibayar</td>
                                                                    @endif
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
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif

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
