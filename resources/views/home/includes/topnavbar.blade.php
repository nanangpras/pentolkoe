{{-- <header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
    --}}
    <header>
        <!-- ltn__header-top-area start -->
        <div class="ltn__header-top-area section-bg-6 top-area-color-white---">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li><a href="mailto:{{ $company->email ?? '' }}?Subject=Flower%20greetings%20to%20you"><i
                                            class="icon-mail"></i>{{ $company->email ?? '' }}</a></li>
                                <li><a href="#"><i class="icon-placeholder"></i>
                                        {{ $company->address ?? 'belum ada' }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li><a href="#"> KODE PROMO</a></li>
                                <li>
                                    <a href="#" class="" style="pading:30px; background-color: blanchedalmond; color:black"> PROMO70K</a>


                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-top-area end -->

        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white ltn__logo-right-menu-option">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo-wrap">
                            <div class="site-logo">
                                <a href="{{route('home')}}"> <img src="{{ $company->logo ?? '' }}" alt="Logo"></a>
                            </div>
                            <div class="get-support clearfix d-none">
                                <div class="get-support-icon">
                                    <i class="icon-call"></i>
                                </div>
                                <div class="get-support-info">
                                    <h6>Get Support</h6>
                                    <h4><a href="tel:{{ $company->phone ?? '' }}">{{ $company->phone ?? '' }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col header-menu-column">
                        <div class="header-menu d-none d-xl-block">
                            <nav>
                                <div class="ltn__main-menu">
                                    <ul>
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('shop.index') }}">Template</a></li>
                                        <li><a href="{{ route('home.about') }}">Pertanyaan</a></li>
                                        {{-- <li class="menu-icon"><a href="{{ route('home') }}">Service</a></li> --}}
                                        {{-- <li><a href="{{ route('home') }}">Portofolio</a></li> --}}
                                        {{-- <li><a href="contact.html">Contact</a></li> --}}
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="ltn__header-options ltn__header-options-2 mb-sm-20">
                        <!-- header-search-1 -->
                        <div class="header-search-wrap">
                            <div class="header-search-1">
                                <div class="search-icon">
                                    <i class="icon-search for-search-show"></i>
                                    <i class="icon-cancel  for-search-close"></i>
                                </div>
                            </div>
                            <div class="header-search-1-form">
                                <form id="#" method="get" action="{{ url('/shop') }}">
                                    <input type="text" name="search" value="{{ $search ?? '' }}"
                                        placeholder="Search here..." />
                                    <button type="submit">
                                        <span><i class="icon-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- user-menu -->
                        <div class="ltn__drop-menu user-menu">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-user"></i></a>
                                    <ul>
                                        @guest
                                        <li><a href="{{ route('login') }}">Sign in</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                        @endguest
                                        @auth
                                        <li><a href="{{ route('member.dashboard') }}">{{ Auth::user()->name }}</a></li>
                                        @if (auth::user()->role == 'admin')
                                        <li><a href="{{ route('admin.dashboard') }}">My Account</a></li>
                                        @else
                                        <li><a href="{{ route('member.dashboard') }}">My Account</a></li>
                                        @endif
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log
                                                Out</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                                        </li>
                                        {{-- <li><a href="{{route('logout')}}">Logout</a></li> --}}
                                        @endauth
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- mini-cart -->
                        <div class="mini-cart-icon">
                            <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                <i class="icon-shopping-cart"></i>
                                {{-- <sup>0</sup> --}}
                                <sup>{{ $count_cart ?? '0' }}</sup>
                            </a>
                        </div>
                        <!-- mini-cart -->
                        <!-- Mobile Menu Button -->
                        <div class="mobile-menu-toggle d-xl-none">
                            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path
                                        d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                        id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path
                                        d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                        id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
    </header>