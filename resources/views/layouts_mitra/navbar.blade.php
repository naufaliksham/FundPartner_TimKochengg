{{-- berisikan navigasi semacam login/logout/home/about --}}
<div class="preloader">
    <img src="assets/images/loader.png" class="preloader__image" alt="">
</div><!-- /.preloader -->


    <div class="site-header__header-one-wrap clearfix">

        <div class="site-header__header-one-wrap-left">
            <a href="indexmitra" class="main-nav__logo">
                <img src={{asset("assets/images/resources/logo.png")}} class="main-logo" alt="Awesome Image">
            </a>
        </div>

        <header class="main-nav__header-one">

            <div class="main-nav__header-one-top clearfix">
                @if (Auth::check() && Auth::user()->role == 'mitra_umkm')
                <div class="button"><a href="{{route('create')}}">Daftarkan Usahamu</a></div>
                @else
                <div class="button"><a href="{{route('login')}}">Daftarkan Usahamu</a></div>
                @endif
                <div class="main-nav__header-one-top-left">
                    <ul>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('profile') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}">{{ __('logout') }}</a>
                                </li>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

            <nav class="header-navigation one stricky">
                <div class="container-box clearfix">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="main-nav__left">
                        <a href="indexmitra" class="main-nav__logo">
                            <img src={{asset("assets/images/resources/logo.png")}} class="main-logo" alt="Awesome Image">
                        </a>
                        <a href="#" class="side-menu__toggler">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="main-nav__main-navigation">
                        <ul class=" main-nav__navigation-box">
                            <li class="dropdown current">
                                <a href="indexmitra">Home</a>
                                {{-- <ul>
                                    <li><a href="indexmitra">Halaman Mitra</a></li>
                                    <li><a href="index2.html">Halaman Investor</a></li>
                                    
                                </ul><!-- /.sub-menu --> --}}
                            </li>
                            @if (Auth::check() && Auth::user()->role == 'mitra_umkm')
                                <li class="dropdown">
                                    <a href="/rincian">UMKM Saya</a>
                                    {{-- <ul>
                                        <li><a href="project.html">UMKM</a></li>
                                        <li><a href="/rincian">UMKM saya</a></li>
                                    </ul><!-- /.sub-menu --> --}}
                                </li>
                                
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->

                    {{-- <div class="main-nav__right">
                        <div class="phone-mail-box">
                            <ul>
                                <li><span class="fas fa-envelope"></span><a
                                        href="mailto:logistic@email.com">info@website.com</a></li>
                                <li><span class="fa fa-phone"></span><a href="tel:123456789">+62xxxx xxxx xxxx</a>
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
                    </div> --}}

                </div>
            </nav>
        </header>
    </div>