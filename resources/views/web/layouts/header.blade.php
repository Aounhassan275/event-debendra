<!--===================start saymon Header  Area====================-->
<div class="header-area" id="sticky-header">
    <div class="container-fluid">
        <div class="row align-items-center d-flex">
            <div class="col-lg-3">
                <div class="header-logo">
                    <a class="main-logo" href="index.html"><img src="{{ asset('vendor/images/logo.png') }}" alt=""></a>
                    <a class="stiky-logo" href="index.html"><img src="{{ asset('vendor/images/logo.png') }}" alt=""></a>
                    {{-- <a class="stiky-logo" href="index.html"><img src="{{ asset('web/images/logo/logo2.png') }}" alt=""></a> --}}
                </div>
            </div>
            <div class="col-lg-9">
                <nav class="saymon_menu">
                    <div class="header-menu">
                        <ul class="nav_scroll">
                            @foreach (App\Models\Menu::all() as $data)
                                <li class="gap"><a href="{{ url($data->url) }}">{{ $data->menu }}</a></li>
                            @endforeach
                            {{-- <li class="gap"><a href="#">pages <span><i class="fas fa-angle-down"></i></span></a>
                                <div class="sub-menu">
                                    <ul>
                                        <li><a href="about.html">about</a></li>
                                        <li><a href="service.html">service</a></li>
                                        <li><a href="service-details.html">service Details</a></li>

                                    </ul>
                                </div>
                            </li>
                            <li class="gap"><a href="#">blog <span><i class="fas fa-angle-down"></i></span></a>
                                <div class="sub-menu">
                                    <ul>
                                        <li><a href="blog-grid.html">blog grid </a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                    </ul>
                                </div>
                            </li> --}}
                            <li class="header-btn"><a class="sign-btn" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="header-btn"><a class="sign-btn" href="{{ route('vendor.register') }}">Register</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- ================mobile menu seection====== -->


<!-- Mobile Menu Section -->
<div class="mobile-menu-area d-sm-block d-md-block d-lg-none">
    <div class="mobile-menu">
        <nav class="menu-box">
            <div class="nav-logo">
                <a href="index.html">
                    <img src="{{ asset('web/images/logo/logo2.png') }}" alt="Logo" title="Logo">
                </a>
            </div>
            <!-- Menu will be populated by jQuery -->
            <ul class="navigation clearfix"></ul>
        </nav>
    </div>
</div>
