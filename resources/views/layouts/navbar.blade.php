{{-- berisikan navigasi semacam login/logout/home/about --}}
<div class="preloader">
    <img src="assets/images/loader.png" class="preloader__image" alt="">
</div><!-- /.preloader -->


    <div class="site-header__header-one-wrap clearfix">

        <div class="site-header__header-one-wrap-left">
            <a href="index.html" class="main-nav__logo">
                <img src={{asset("assets/images/resources/logo.png")}} class="main-logo" alt="Awesome Image">
            </a>
        </div>

        <header class="main-nav__header-one">

            <div class="main-nav__header-one-top clearfix">
                <div class="border-bottom"></div>
                <div class="button"><a href="#">Start a Project</a></div>
                <div class="main-nav__header-one-top-left">
                    <ul>
                        <li><a href="#">Customer Support</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                    </ul>
                </div>
                <div class="main-nav__header-one-top-right">
                    <div class="one__social">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-dribbble"></i></a>
                    </div>
                </div>
            </div>

            <nav class="header-navigation one stricky">
                <div class="container-box clearfix">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="main-nav__left">
                        <a href="index.html" class="main-nav__logo">
                            <img src={{asset("assets/images/resources/logo.png")}} class="main-logo" alt="Awesome Image">
                        </a>
                        <a href="#" class="side-menu__toggler">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="main-nav__main-navigation">
                        <ul class=" main-nav__navigation-box">
                            <li class="dropdown current">
                                <a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home 01</a></li>
                                    <li><a href="index2.html">Home 02</a></li>
                                    <li><a href="index3.html">Home 03</a></li>
                                    <li><a href="index4.html">Home 04</a></li>
                                    <li><a href="index5.html">Home 05</a></li>
                                    <li class="dropdown"><a href="#">Header Versions</a>
                                        <ul>
                                            <li><a href="index.html">Header 01</a></li>
                                            <li><a href="index2.html">Header 02</a></li>
                                            <li><a href="index3.html">Header 03</a></li>
                                            <li><a href="index4.html">Header 04</a></li>
                                            <li><a href="index5.html">Header 05</a></li>
                                        </ul><!-- /.sub-menu -->
                                    </li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li class="dropdown">
                                <a href="#">Explore</a>
                                <ul>
                                    <li><a href="project.html">Projects</a></li>
                                    <li><a href="project-details.html">Projects Detail</a></li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li class="dropdown">
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="why-choose-us.html">Why Choose Us</a></li>
                                    <li><a href="faq.html">FAQs</a></li>
                                    <li><a href="team.html">Team Members</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li class="dropdown">
                                <a href="#">Latest News</a>
                                <ul>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="news-detail.html">News Details</a></li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li class="dropdown">
                                <a href="#">Shop</a>
                                <ul>
                                    <li><a href="product.html">Products</a></li>
                                    <li><a href="product-detail.html">Product Detail</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->

                    <div class="main-nav__right">
                        <div class="phone-mail-box">
                            <ul>
                                <li><span class="fas fa-envelope"></span><a
                                        href="mailto:logistic@email.com">info@website.com</a></li>
                                <li><span class="fa fa-phone"></span><a href="tel:123456789">+098987 876 767</a>
                                </li>
                            </ul>
                        </div>
                        <div class="icon-search-box">
                            <a href="#" class="main-nav__search search-popup__toggler">
                                <i class="icon-magnifying-glass"></i>
                            </a>
                        </div>
                        <div class="icon_cart_box">
                            <a href="cart.html">
                                <span class="icon-shopping-cart"></span>
                            </a>
                        </div>
                    </div>

                </div>
            </nav>
        </header>
    </div>