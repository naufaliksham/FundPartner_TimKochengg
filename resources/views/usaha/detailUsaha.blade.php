@extends('layout')
@section('content')
    <div class="page-wrapper">

        <!--Project Details Top-->
        @foreach ($details as $item)
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
                                <img src="{{asset('storage/'.$item->gambar)}}" alt="">
                                @else
                                <img src="{{asset("assets/images/project/project_idea-img-1.jpg")}}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="project_details_right">
                                <div class="project_details_right_top">
                                    <ul class="project_details_rate_list list-unstyled">
                                        <li><span>{{ $item->dana_terkumpul }}</span>Terkumpul</li>
                                        {{-- <li><span>60</span>Backers</li> --}}
                                    </ul>
                                </div>
                                <div class="progress-levels project_details_progress-levels">
                                    <!--Skill Box-->
                                    <div class="progress-box">
                                        <div class="inner count-box">
                                            <div class="bar">
                                                <div class="bar-innner">
                                                    <div class="skill-percent">
                                                        {{-- Menghitung persen --}}
                                                        @php
                                                            $day = ($item->waktu)*7;
                                                            $date = $item->created_at;
                                                            $today = date('Y-m-d');
                                                            $addedDay = date('Y-m-d', strtotime($date . '+'. $day.' days'));
                                                            $diff = strtotime($addedDay)-strtotime($today);
                                                            $remain = floor($diff / (60 * 60 * 24));
                                                            if ($remain != $day) {
                                                                $data = 100 - (number_format(($remain / $day) * 100));
                                                            }else {
                                                                $data= 0;
                                                            }
                                                        @endphp

                                                        <span class="count-text" data-speed="3000"
                                                            data-stop={{ $data }}></span>
                                                        <span class="percent">%</span>
                                                    </div>
                                                    <div class="bar-fill" data-percent={{ $data }}></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <ul class="projects_details_categories list-unstyled">
                                    <li>
                                        <div class="icon_box">
                                            <img src="assets/images/project/folder-icon.png" alt="">
                                        </div>
                                        <div class="content">
                                            <p>Health & Fitness</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon_box">
                                            <img src="assets/images/project/flag.png" alt="">
                                        </div>
                                        <div class="content">
                                            <p>United Kingdom</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="projects_details_bottom">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5>Rp.{{ $item->dana_terkumpul }}</h5>
                                            <p>Terkumpul</p>
                                        </li>
                                        <li>
                                            <h5>Rp.{{ $item->dana }}</h5>
                                            <p>Dibutuhkan</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project_details_btn_box">
                                    <a href="#" class="thm-btn follow_btn">Edit</a>
                                    <a href="#" class="thm-btn back_this_project_btn">Delete</a>
                                </div>
                                {{-- <div class="project_detail_share_box">
                                    <div class="share_box_title">
                                        <h2>Share with friends</h2>
                                    </div>
                                    <div class="project_detail__social">
                                        <a href="#" class="tw-clr"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="fb-clr"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#" class="dr-clr"><i class="fab fa-dribbble"></i></a>
                                        <a href="#" class="ins-clr"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div> --}}
                                <div class="project_details_text_box">
                                    <p><span>All or nothing</span>. This project will only be funded if it reaches its goal
                                        by Tue, January 28 2020 4:59 AM UTC +00:00.</p>
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
                                                <div class="col-xl-4 col-lg-4">
                                                    <div class="project_details_right_content">
                                                        <div class="project_detail_creator">
                                                            <div class="project_detail_creator_image">
                                                                <img src="assets/images/project/person-img-1.png"
                                                                    alt="">
                                                            </div>
                                                            <div class="creator_info">
                                                                <h4>{{$item->usaha->name}}</h4>
                                                            </div>
                                                            <div class="project_detail_creator_text">
                                                                <p>Crochet designer and Creator of the Woolly Chic brand.
                                                                    Loves British wool and is passionate about the
                                                                    environment.</p>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="project_detail_pledge">
                                                            <div class="title">
                                                                <h3>Pledge Without<br>A Reward</h3>
                                                            </div>
                                                            <div class="field">
                                                                <input type="text" placeholder="$ 10">
                                                            </div>
                                                            <div class="text">
                                                                <h4>Back it because you<br>believe in it.</h4>
                                                                <p>Support the project for no reward, just because it speaks
                                                                    to you.</p>
                                                            </div>
                                                            <div class="project_detail_btn">
                                                                <a href="#" class="thm-btn">Continue</a>
                                                            </div>
                                                        </div> --}}
                                                        {{-- <div class="project_detail_rewards"> --}}
                                                            {{-- <h3>Pledge $50 or more</h3>
                                                            <p>Reward description goes here. Lorem ipsum dolor sit amet,
                                                                piscing elit. Vivamus dictum congue nunc, sed interdum massa
                                                                in.</p>
                                                            <div class="estimated_delivery_date">
                                                                <p>Estimated Delivery</p>
                                                                <h4>December, 2022</h4>
                                                            </div>
                                                            <ul class="project_detail_rewards_list list-unstyled">
                                                                <li><i class="far fa-user-circle"></i>4 Backers</li>
                                                                <li><i class="far fa-user-circle"></i>20 rewards left</li>
                                                            </ul>
                                                            <div class="project_detail_rewards_btn">
                                                                <a href="#" class="thm-btn">Select this Reward</a>
                                                            </div>
                                                        </div> --}}
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

        <!--Site Footer Start-->
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="footer-widget__column footer-widget__about wow fadeInUp animated"
                            data-wow-delay="100ms"
                            style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                            <div class="footer-widget__title">
                                <h3>About</h3>
                            </div>
                            <div class="footer-widget_about_text">
                                <p>Id quas utamur delicata qui, vix ei prima mentitum omnesque. Duo corrumpit cotidieque ne.
                                </p>
                            </div>
                            <form>
                                <div class="footer_input-box">
                                    <input type="Email" placeholder="Email Address">
                                    <button type="submit" class="button"><i class="fa fa-envelope"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3">
                        <div class="footer-widget__column footer-widget__company wow fadeInUp animated"
                            data-wow-delay="200ms"
                            style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                            <div class="footer-widget__title">
                                <h3>Company</h3>
                            </div>
                            <ul class="footer-widget__company-list list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">How It Works</a></li>
                                <li><a href="#">Knowledge hub</a></li>
                                <li><a href="#">Success Stories</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3">
                        <div class="footer-widget__column footer-widget__explore wow fadeInUp animated"
                            data-wow-delay="300ms"
                            style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                            <div class="footer-widget__title">
                                <h3>Explore</h3>
                            </div>
                            <ul class="footer-widget__explore_list list-unstyled">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Trust & Safety</a></li>
                                <li><a href="#">Help & Support</a></li>
                                <li><a href="#">Press</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4">
                        <div class="footer-widget__column footer-widget__links wow fadeInUp animated"
                            data-wow-delay="400ms"
                            style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                            <div class="footer-widget__title">
                                <h3>Links</h3>
                            </div>
                            <ul class="footer-widget_links_list list-unstyled">
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Cookies</a></li>
                                <li><a href="#">Funded Companies</a></li>
                                <li><a href="#">Media Centre</a></li>
                                <li><a href="#">Partnership</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-8 col-md-8">
                        <div class="footer-widget__column footer-widget__options wow fadeInUp animated"
                            data-wow-delay="400ms"
                            style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                            <div class="footer-widget__title">
                                <h3>Options</h3>
                            </div>
                            <div class="footer_Currency">
                                <select name="currency" id="currency" class="selectpicker">
                                    <option value="Country">$ US Dollars </option>
                                    <option value="Aud">AUD</option>
                                    <option value="Aud">CAD</option>
                                </select>
                                <select name="language" id="language" class="selectpicker">
                                    <option value="Country">English</option>
                                    <option value="Canada">Russian</option>
                                    <option value="England">Urdu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!--Site Footer Bottom Start-->
        <div class="site-footer_bottom">
            <div class="container">
                <div class="site-footer_bottom_copyright">
                    <div class="site_footer_bottom_icon">
                        <img src="assets/images/shapes/footer-bottom-shape.png" alt="">
                    </div>
                    <p>@ All copyright 2020, <a href="#">Layerdrops.com</a></p>
                </div>
                <div class="site-footer__social">
                    <a href="#" class="tw-clr"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="fb-clr"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" class="dr-clr"><i class="fab fa-dribbble"></i></a>
                    <a href="#" class="ins-clr"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
