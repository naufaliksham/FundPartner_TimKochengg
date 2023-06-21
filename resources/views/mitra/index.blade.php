@extends('mitra.layout_mitra')
@section('content')
   
{{-- @if (Auth::user()->role == 'mitra_umkm') --}}
        <!--Project Details Top-->
            <section class="about_one">
                <div class="about_one_shape_one" style="background-image: url(assets/images/shapes/about_onee_shape-1.png)">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12">
                            <div class="about_one_left">
                                <div class="thm_section_title_two">
                                    <div class="sec__title_icon">
                                        <img src="assets/images/icon/sec__title_two_icon.png" alt="">
                                    </div>
                                    <h2>Kembangkan usaha anda pada platform kami!</h2>
                                </div>
                                <div class="about_one_text">
                                    <p>Platform kami memberikan manfaat kepada anda yang ingin mengembangkan usaha yang anda miliki dengan pelayanan dan kualitas tebaik</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div class="about_one_right">
                                <div class="about_one_image_one">
                                    {{-- style="width:375px;height:325px; --}}
                                    {{-- 430 310 --}}
                                    <img src="assets/images/about/toko.webp" style="width:500px;height:596px;" alt="">
                                    <div class="image_one_shape"></div>
                                </div>
                                <div class="about_one_image_two">
                                    <img src="assets/images/about/usaha.jpg" style="width:430px;height:310px;" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="funfact_one">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="funfact_one_single wow fadeInUp">
                                <div class="funfact_one_icon">
                                    <i class="icon-list"></i>
                                </div>
                                <h3><span class="counter">{{ $usaha5 }}</span></h3>
                                <p>UMKM Terdaftar</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="funfact_one_single wow fadeInUp" data-wow-delay="100ms">
                                <div class="funfact_one_icon">
                                    <i class="icon-save-money"></i>
                                </div>
                                <h3><span class="counter">{{ $usaha4 }}</span></h3>
                                <p>UMKM Didanai</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="funfact_one_single wow fadeInUp" data-wow-delay="200ms">
                                <div class="funfact_one_icon">
                                    <i class="icon-volunteer"></i>
                                </div>
                                <h3><span class="counter">{{ $usaha3 }}</span></h3>
                                <p>Investor Terdaftar</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="funfact_one_single wow fadeInUp" data-wow-delay="300ms">
                                <div class="funfact_one_icon">
                                    <i class="icon-rating"></i>
                                </div>
                                <h3><span class="counter">{{ $usaha7 }}</span></h3>
                                <p>Pemilik Usaha</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="explorep_projects_one">
                <div class="container">
                    <div class="block-title text-center">
                        <div class="block_title_icon">
                            <img src="assets/images/icon/sec__title_two_icon.png" alt="">
                        </div>
                        <p>Ayo lihat</p>
                        <h3>UMKM YANG BARU SAJA BERGABUNG</h3>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="projects_four_carousel owl-theme owl-carousel">
                                @foreach ($usaha2 as $no => $item)
                                <div class="projects_one_single">
                                    <div class="projects_one_img">
                                        <a href="/usaha/{{ $item->id }}"><img src="{{asset('storage/'.$item->gambar)}}" style="width:375px;height:325px;" alt=""></a>
                                        <div class="project_one_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="projects_one_content">
                                        <div class="porjects_one_text">
                                            <p><span>by</span> {{ $item->usaha->name }}</p>
                                            <h3><a href="/usaha/{{ $item->id }}">UMKM<br>{{ $item->nama_usaha }}</a></h3>
                                        </div>
                                        
                                        {{-- <div class="projects_categories">
                                            <div class="projects_categories_left">
                                                <div class="left_icon">
                                                    <img src="assets/images/project/folder-icon.png" alt="">
                                                </div>
                                                <div class="left_text">
                                                    <p>Health & Fitness</p>
                                                </div>
                                            </div>
                                            <div class="projects_categories_right">
                                                <div class="right_icon">
                                                    <img src="assets/images/project/flag.png" alt="">
                                                </div>
                                                <div class="right_text">
                                                    <p>United Kingdom</p>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="projects_one_bottom">
                                        <ul class="list-unstyled">

                                            <li>
                                                <h5>Rp {{ $item->dana }}</h5>
                                                <p>Dibutuhkan</p>
                                            </li>
                                            {{-- <li>
                                                <h5>{{ $item->waktu*7 }}</h5>
                                                <p>Days Left</p>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--How We Works Two Start-->
            <section class="how_we_works how_we_works_two">
                <div class="container">
                    <div class="block-title text-center">
                        <div class="block_title_icon">
                            <img src="assets/images/icon/sec__title_two_icon.png" alt="">
                        </div>
                        <p>Bagaimana Cara untuk Mendapatkan Pendanaan?</p>
                        <h3>Berikut langkah-langkahnya</h3>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <ul class="steps_list steps_list-shadow list-unstyled">
                                <li>
                                    <div class="steps_circle">01</div>
                                    <div class="step_counter">
                                        <h6>Langkah 01</h6>
                                        <p>Verifikasi diri kamu dan buatlah halaman UMKM-mu</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="steps_circle">02</div>
                                    <div class="step_counter">
                                        <h6>Langkah 02</h6>
                                        <p>Memulai pengumpulan dana untuk mendapatkan dana dari investor</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="steps_circle">03</div>
                                    <div class="step_counter">
                                        <h6>Langkah 03</h6>
                                        <p>Setujui surat perjanjian bersama investor yang tertarik</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br> <br>
                    <div class="row">
                        <div class="col-xl-12">
                            <ul class="steps_list steps_list-shadow list-unstyled">
                                
                                <li>
                                    <div class="steps_circle">04</div>
                                    <div class="step_counter">
                                        <h6>Langkah 04</h6>
                                        <p>Berhasil! Kamu mendapatkan dana dari Investor</p>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="cta_one">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="cta_one_inner wow fadeInUp" data-wow-delay="100ms">
                                <div class="cta_one_left">
                                    <h2>Siap mendapatkan dana untuk UMKM-mu?</h2>
                                </div>
                                <div class="cta_one_right">
                                    <a href="/form_umkm" class="thm-btn">Bergabung Bersama Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="explorep_projects_one">
                <div class="container">
                    <div class="block-title text-center">
                        <div class="block_title_icon">
                            <img src="assets/images/icon/sec__title_two_icon.png" alt="">
                        </div>
                        <p>Ayo lihat juga</p>
                        <h3>UMKM YANG SUKSES MENDAPAT PENDANAAN</h3>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="projects_four_carousel owl-theme owl-carousel">
                                @foreach ($usaha6 as $no => $item)
                                <div class="projects_one_single">
                                    <div class="projects_one_img">
                                        <a href="/usaha/{{ $item->id }}"><img src="{{asset('storage/'.$item->gambar)}}" style="width:375px;height:325px;" alt=""></a>
                                        
                                    </div>
                                    <div class="projects_one_content">
                                        <div class="porjects_one_text">
                                            <p><span>by</span> {{ $item->usaha->name }}</p>
                                            <h3><a href="/usaha/{{ $item->id }}">UMKM<br>{{ $item->nama_usaha }}</a></h3>
                                        </div>
                                        
                                        {{-- <div class="projects_categories">
                                            <div class="projects_categories_left">
                                                <div class="left_icon">
                                                    <img src="assets/images/project/folder-icon.png" alt="">
                                                </div>
                                                <div class="left_text">
                                                    <p>Health & Fitness</p>
                                                </div>
                                            </div>
                                            <div class="projects_categories_right">
                                                <div class="right_icon">
                                                    <img src="assets/images/project/flag.png" alt="">
                                                </div>
                                                <div class="right_text">
                                                    <p>United Kingdom</p>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="projects_one_bottom">
                                        <ul class="list-unstyled">
                                            <li>
                                                <h5>Rp {{ $item->dana }}</h5>
                                                <p>Dana didapatkan</p>
                                            </li>
                                            <li>
                                                <h5>Rp {{ $item->dana*10/100 }}</h5>
                                                <p>Bagi Hasil</p>
                                            </li>
                                            {{-- <li>
                                                <h5>{{ $item->waktu*7 }}</h5>
                                                <p>Days Left</p>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="project_details_tab_box">
                 
            </section>
        

        {{-- <!--Categories Two Start-->
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
            </div> --}}
        </div>
    </div>
    {{-- @else --}}
    {{-- @endif --}}
@endsection
