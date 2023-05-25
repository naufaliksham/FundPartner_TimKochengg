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
                                <img src="{{asset('storage/'.$item->gambar)}}" alt="">
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
                                                            $data = number_format(($item->dana_terkumpul / $item->dana) * 100)
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
                                        <li>
                                            <h5>32</h5>
                                            <p>Days Left</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project_details_btn_box">
                                    <a href="#" class="thm-btn follow_btn"><i class="fa fa-heart"></i>Follow</a>
                                    <a href="#" class="thm-btn back_this_project_btn">Back This Project</a>
                                </div>
                                <div class="project_detail_share_box">
                                    <div class="share_box_title">
                                        <h2>Share with friends</h2>
                                    </div>
                                    <div class="project_detail__social">
                                        <a href="#" class="tw-clr"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="fb-clr"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#" class="dr-clr"><i class="fab fa-dribbble"></i></a>
                                        <a href="#" class="ins-clr"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
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
                                    <li data-tab="#faq" class="tab-btn"><span>FAQ</span></li>
                                    <li data-tab="#update" class="tab-btn"><span>Updates</span></li>
                                    <li data-tab="#comm" class="tab-btn"><span>Comments</span></li>
                                </ul>
                                <div class="tabs-content">
                                    <div class="tab active-tab" id="idea">
                                        <div class="project_idea_details">
                                            <div class="row">
                                                <div class="col-xl-8 col-lg-8">
                                                    <div class="project_idea_details_content">
                                                        <p class="project_idea_first_text">{{ $item->deskripsi }}aaaaaa</p>
                                                        <div class="project_idea_first_image">
                                                            <img src="assets/images/project/project_idea-img-1.jpg"
                                                                alt="">
                                                        </div>
                                                        <p class="project_idea_second_text">Integer feugiat est in tincidunt
                                                            congue. Nam eget accumsan ligula. Nunc auctor ligula a quam
                                                            fermentum, non iaculis diam suscipit. Aliquam lacinia lorem vel
                                                            suscipit pulvinar. Etiam condimentum nunc non ultricies
                                                            hendrerit. Sed nec blandit libero, ut gravida quam. Nam tortor
                                                            est, faucibus at dolor id, blandit venenatis leo. Praesent
                                                            euismod tempus libero et accumsan. Nunc ultrices sit amet urna
                                                            sed euismod. Pellentesque finibus ipsum non mi sodales, vel
                                                            ullamcorper ipsum pharetra. Praesent nec pharetra neque.</p>
                                                        <ul class="project_idea_list list-unstyled">
                                                            <li><i class="fa fa-check"></i>Praesent euismod tempus libero et
                                                                accumsan.</li>
                                                            <li><i class="fa fa-check"></i>Nunc ultrices sit amet urna sed
                                                                euismod.</li>
                                                            <li><i class="fa fa-check"></i>Vel ullamcorper ipsum pharetra
                                                                raesent nec pharetra neque.</li>
                                                            <li><i class="fa fa-check"></i>Fusce elit libero, imperdiet nec
                                                                orci quis, convallis hendrerit nisl.</li>
                                                        </ul>
                                                        <div class="project_idea_second_image">
                                                            <img src="assets/images/project/project_idea-img-2.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="project_idea_3rd_text">
                                                            <h5>Nulla in ex at mi viverra sagittis ut non erat raesent nec
                                                                congue elit.</h5>
                                                            <p>Nunc arcu odio, convallis a lacinia ut, tristique id eros.
                                                                Suspendisse leo erat, pellentesque et commodo vel, varius in
                                                                felis. Nulla mollis turpis porta justo eleifend volutpat.
                                                                Cras malesuada nec magna eu blandit. Nam sed efficitur ante.
                                                                Quisque lobortis sodales risus, eu dapibus dolor porta
                                                                vitae. Vestibulum eu ex auctor, scelerisque velit sit amet,
                                                                vehicula sapien.</p>
                                                        </div>
                                                        <div class="project_idea_4th_text">
                                                            <h5>Suspendisse leo erat, pellentesque et commodo vel, varius in
                                                                felis.</h5>
                                                            <p>Nulla mollis turpis porta justo eleifend volutpat. Cras
                                                                malesuada nec magna eu blandit. Nam sed efficitur ante.
                                                                Quisque lobortis sodales risus, eu dapibus dolor porta
                                                                vitae. Vestibulum eu ex auctor, scelerisque velit sit amet,
                                                                vehicula sapien.</p>
                                                        </div>
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
                                                                <h5>First Created · 0 backed</h5>
                                                            </div>
                                                            <div class="project_detail_creator_text">
                                                                <p>Crochet designer and Creator of the Woolly Chic brand.
                                                                    Loves British wool and is passionate about the
                                                                    environment.</p>
                                                            </div>
                                                        </div>
                                                        <div class="project_detail_pledge">
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
                                                        </div>
                                                        <div class="project_detail_rewards">
                                                            <h3>Pledge $50 or more</h3>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab" id="faq">
                                        <div class="project_detail_faq">
                                            <div class="row">
                                                <div class="col-xl-8">
                                                    <div class="faq">
                                                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                                            <div class="accrodion active">
                                                                <div class="accrodion-title">
                                                                    <h4>How donations transferred to the charity?</h4>
                                                                </div>
                                                                <div class="accrodion-content">
                                                                    <div class="inner">
                                                                        <p>Suspendisse finibus urna mauris, vitae consequat
                                                                            quam vel. Vestibulum leo ligula, molestie vitae
                                                                            commodo nisl. Nulla facilisi. Pellentesque est
                                                                            metus many of eration in some form.</p>
                                                                    </div><!-- /.inner -->
                                                                </div>
                                                            </div>
                                                            <div class="accrodion ">
                                                                <div class="accrodion-title">
                                                                    <h4>What information should I share on my project page?
                                                                    </h4>
                                                                </div>
                                                                <div class="accrodion-content">
                                                                    <div class="inner">
                                                                        <p>Suspendisse finibus urna mauris, vitae consequat
                                                                            quam vel. Vestibulum leo ligula, molestie vitae
                                                                            commodo nisl. Nulla facilisi. Pellentesque est
                                                                            metus many of eration in some form.</p>
                                                                    </div><!-- /.inner -->
                                                                </div>
                                                            </div>
                                                            <div class="accrodion">
                                                                <div class="accrodion-title">
                                                                    <h4>What fee do you take for a project?</h4>
                                                                </div>
                                                                <div class="accrodion-content">
                                                                    <div class="inner">
                                                                        <p>Suspendisse finibus urna mauris, vitae consequat
                                                                            quam vel. Vestibulum leo ligula, molestie vitae
                                                                            commodo nisl. Nulla facilisi. Pellentesque est
                                                                            metus many of eration in some form.</p>
                                                                    </div><!-- /.inner -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="project_detail_ask_question">
                                                        <p>Don't see the answer to your question? Ask the project creator
                                                            directly.</p>
                                                        <div class="ask_queston_btn">
                                                            <a href="#" class="thm-btn">Ask a Question</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab" id="update">
                                        <div class="project_detail_update">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="project_detail_update_single">
                                                        <h4>#1 Update</h4>
                                                        <h3>Wow! What an incredible first day!</h3>
                                                        <div class="person_detail_box">
                                                            <div class="person_detail_left_box">
                                                                <div class="person_detail_left_img">
                                                                    <img src="assets/images/project/project_detail_person-img-1.png"
                                                                        alt="">
                                                                </div>
                                                                <div class="person_detail_left_content">
                                                                    <h5>by <span>Kevin Martin</span></h5>
                                                                    <p>Jan 16, 2020</p>
                                                                </div>
                                                            </div>
                                                            <div class="person_detail_right_box">
                                                                <a href="#" class="thm-btn creator_btn">Creator</a>
                                                            </div>
                                                        </div>
                                                        <p class="project_detail_update_first_text">Lorem ipsum dolor sit
                                                            amet, consectetur adipiscing elit. Praesent vulputate sed mauris
                                                            vitae pellentesque. Nunc ut ullamcorper libero. Aenean fringilla
                                                            mauris quis risus laoreet interdum. Quisque imperdiet orci in
                                                            metus aliquam egestas. Fusce elit libero, imperdiet nec orci
                                                            quis, convallis hendrerit nisl. Cras auctor nec purus at
                                                            placerat.</p>
                                                        <p class="project_detail_update_last_text">Quisque consectetur,
                                                            lectus in ullamcorper tempus, dolor arcu suscipit elit, id
                                                            laoreet tortor justo nec arcu. Nam eu dictum ipsum. Morbi in mi
                                                            eu urna placerat finibus a vel neque. Nulla in ex at mi viverra
                                                            sagittis ut non erat. Praesent nec congue elit. Nunc arcu odio,
                                                            convallis a lacinia ut, tristique id eros. Suspendisse leo erat,
                                                            pellentesque et commodo vel, varius in felis. Nulla mollis
                                                            turpis porta justo eleifend volutpat.</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="project_detail_update_single update_single_last">
                                                        <h4>#2 Update</h4>
                                                        <h3>Wow! What an incredible first day!</h3>
                                                        <div class="person_detail_box">
                                                            <div class="person_detail_left_box">
                                                                <div class="person_detail_left_img">
                                                                    <img src="assets/images/project/project_detail_person-img-1.png"
                                                                        alt="">
                                                                </div>
                                                                <div class="person_detail_left_content">
                                                                    <h5>by <span>Kevin Martin</span></h5>
                                                                    <p>Jan 16, 2020</p>
                                                                </div>
                                                            </div>
                                                            <div class="person_detail_right_box">
                                                                <a href="#" class="thm-btn creator_btn">Creator</a>
                                                            </div>
                                                        </div>
                                                        <p class="project_detail_update_first_text">Lorem ipsum dolor sit
                                                            amet, consectetur adipiscing elit. Praesent vulputate sed mauris
                                                            vitae pellentesque. Nunc ut ullamcorper libero. Aenean fringilla
                                                            mauris quis risus laoreet interdum. Quisque imperdiet orci in
                                                            metus aliquam egestas. Fusce elit libero, imperdiet nec orci
                                                            quis, convallis hendrerit nisl. Cras auctor nec purus at
                                                            placerat.</p>
                                                        <p class="project_detail_update_last_text">Quisque consectetur,
                                                            lectus in ullamcorper tempus, dolor arcu suscipit elit, id
                                                            laoreet tortor justo nec arcu. Nam eu dictum ipsum. Morbi in mi
                                                            eu urna placerat finibus a vel neque. Nulla in ex at mi viverra
                                                            sagittis ut non erat. Praesent nec congue elit. Nunc arcu odio,
                                                            convallis a lacinia ut, tristique id eros. Suspendisse leo erat,
                                                            pellentesque et commodo vel, varius in felis. Nulla mollis
                                                            turpis porta justo eleifend volutpat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab" id="comm">
                                        <div class="project_detail_comment_box">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="project_detail_comment_box_inner">
                                                        <h3 class="project_detail_comment_title">2 Comments</h3>
                                                        <div class="project_detail_comment_single">
                                                            <div class="project_detail_comment_image">
                                                                <img src="assets/images/project/comment-img-1.png"
                                                                    alt="">
                                                            </div>
                                                            <div class="project_detail_comment_content">
                                                                <h3>Kevin Martins<span>26 January, 2020</span></h3>
                                                                <p>Lorem Ipsum is simply dummy text of the rinting and
                                                                    typesetting been the industry standard dummy text ever
                                                                    sincer condimentum purus. In non ex at ligula fringilla
                                                                    lobortis. Aliquam hendrerit a augue insuscipit. Etiam
                                                                    aliquam massa quis des mauris commodo.</p>
                                                            </div>
                                                        </div>
                                                        <div class="project_detail_comment_single">
                                                            <div class="project_detail_comment_image">
                                                                <img src="assets/images/project/comment-img-1.png"
                                                                    alt="">
                                                            </div>
                                                            <div class="project_detail_comment_content">
                                                                <h3>Kevin Martins<span>26 January, 2020</span></h3>
                                                                <p>Lorem Ipsum is simply dummy text of the rinting and
                                                                    typesetting been the industry standard dummy text ever
                                                                    sincer condimentum purus. In non ex at ligula fringilla
                                                                    lobortis. Aliquam hendrerit a augue insuscipit. Etiam
                                                                    aliquam massa quis des mauris commodo.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="project_detail_leave_comment__box">
                                                        <h3 class="leave_comment__box_title">Leave a Comment</h3>
                                                        <form class="project_detail_leave_comment__box_form"
                                                            action="#">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="input-box">
                                                                        <input type="text" name="name"
                                                                            placeholder="Full name" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="input-box">
                                                                        <input type="email" name="email"
                                                                            placeholder="Email address" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="input-box">
                                                                        <textarea name="review" placeholder="Write review" required=""></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="project_detail_leave_comm_btn">
                                                                        <a href="#" class="thm-btn">Submit
                                                                            Comment</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
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
