<!DOCTYPE HTML>
<html lang="en-US">

<!-- Mirrored from coderstheme.com/html/saymon/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jan 2025 04:33:00 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Einvie</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    {{-- <link rel="icon" type="image/png" href="{{ asset('web/images/logo/icon.png') }}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('vendor/images/logo-icon.png') }}">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}" type="text/css" media="all" />
    <!-- carousel CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.min.css') }}" type="text/css" media="all" />
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}" type="text/css" media="all" />
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}" type="text/css" media="all" />
    <!-- animated-text CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/animated-text.css') }}" type="text/css" media="all" />
    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/all.min.css') }}" type="text/css" media="all" />
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/flaticon.css') }}" type="text/css" media="all" />
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/theme-default.css') }}" type="text/css" media="all" />
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/meanmenu.min.css') }}" type="text/css" media="all" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}" type="text/css" media="all" />
    <!-- transitions CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/owl.transitions.css') }}" type="text/css" media="all" />
    <!-- venobox CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/venobox.css') }}" type="text/css" media="all" />
    <!-- Jquery UI CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/jquery-ui.min.css') }}" type="text/css" media="all" />
    <!-- ScrollCue CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/scrollCue.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('web/css/dark.css') }}" type="text/css" media="all" />

    <!-- modernizr js -->
    <script src="{{ asset('web/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- date picker -->
    <link rel="stylesheet" href="{{ asset('web/css/flatpickr.min.css') }}">

</head>

<body>


    <div class="da" id="toggleButton">
        {{-- <img src="{{ asset('web/images/day-night2.gif') }}" alt="#"> --}}
    </div>


    <!--==================================================-->
    <!-- start saymon Header Top Menu Area -->
    <!--==================================================-->
    <!-- <div class="header-top-menu">
  <div class="container">
   <div class="row">
    <div class="col-lg-8">
     <div class="header-top-address">
      <ul>
       <li><a href="#"><i class="far fa-envelope"></i> example@gmail.com</a></li>
       <li><span><i class="fas fa-map-marker-alt"></i> 2st Floor New World</span></li>
       <li><a href="#"><i class="fas fa-phone"></i>+880 888 444 242</a></li>
      </ul>
     </div>
    </div>
    <div class="col-lg-4">
     <div class="hrader-top-social text-right">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-dribbble"></i></a>
      <a href="#" class="search-box-btn search-box-outer"><i class="fa fa-search" aria-hidden="true"></i></a>
     </div>
    </div>
   </div>
  </div>
 </div> -->
    @include('web.layouts.header')


    @yield('content')


    @include('web.layouts.footer')

    <!--==================================================-->

    <!--========= Prealoader ==============-->
    <div class="loading-screen" id="loading-screen">
        <span class="bar top-bar"></span>
        <span class="bar down-bar"></span>
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="E" class="letters-loading">
                    E
                </span>
                <span data-text-preloader="I" class="letters-loading">
                    I
                </span>
                <span data-text-preloader="N" class="letters-loading">
                    N
                </span>
                <span data-text-preloader="V" class="letters-loading">
                    V
                </span>
                <span data-text-preloader="I" class="letters-loading">
                    I
                </span>
                <span data-text-preloader="E" class="letters-loading">
                    E
                </span>
            </div>
        </div>
    </div>
    <!--========= End Prealoader ==============-->



    <!-- scroll strat============  -->
    <div class="scroll-area">
        <div class="top-wrap">
            <div class="go-top-btn-wraper">
                <div class="go-top go-top-button">
                    <i class="fas fa-arrow-up"></i>
                    <i class="fas fa-arrow-up"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- scroll end============  -->

    <!-- scroll 2 strat============  -->
    <!-- <div id="progress" class="progress hide">
  <div id="progress-value"></div>
 </div> -->
    <!-- scroll end============  -->

    <!-- Start Search Popup Area -->
    <!--==================================================-->
    <div class="search-popup">
        <button class="close-search style-two"><i class="fa fa-times" aria-hidden="true"></i></button>
        <button class="close-search"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
        <form method="post" action="#">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>

    <!--==================================================-->

    <!-- jquery js -->
    <script src="{{ asset('web/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <!-- carousel js -->
    <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
    <!-- counterup js -->
    <script src="{{ asset('web/js/jquery.counterup.min.js') }}"></script>
    <!-- waypoints js -->
    <script src="{{ asset('web/js/waypoints.min.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('web/js/wow.js') }}"></script>
    <!-- imagesloaded js -->
    <script src="{{ asset('web/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- venobox js -->
    <script src="{{ asset('web/js/venobox.js') }}"></script>
    <!-- <script src="web/js/tilt.jquery.min.js"></script> -->
    <!-- ajax mail js -->
    <script src="{{ asset('web/js/ajax-mail.js') }}"></script>
    <!--  animated-text js -->
    <script src="{{ asset('web/js/animated-text.js') }}"></script>
    <!-- venobox min js -->
    <script src="{{ asset('web/js/venobox.min.js') }}"></script>
    <!-- isotope js -->
    <script src="{{ asset('web/js/isotope.pkgd.min.js') }}"></script>
    <!-- jquery nivo slider pack js -->
    <script src="{{ asset('web/js/jquery.nivo.slider.pack.js') }}"></script>
    <!-- jquery meanmenu js -->
    <script src="{{ asset('web/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('web/js/popper.min.js') }}"></script>
    <!-- jquery scrollup js -->
    <script src="{{ asset('web/js/jquery.scrollUp.js') }}"></script>
    <!-- Jquery UI js -->
    <!-- <script src="web/js/jquery-ui.min.js"></script> -->
    <!-- scrollCue -->
    <script src="{{ asset('web/js/scrollCue.min.js') }}"></script>

    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- smuth scroll -->
    <script src="{{ asset('web/js/plugin.js') }}"></script>
    <!-- jquery js -->
    <script src="{{ asset('web/js/main.js') }}"></script>
    <!-- lighting js -->
    <script src="{{ asset('web/js/lighting.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=datetime-local]", {});
    </script>






</body>

<!-- Mirrored from coderstheme.com/html/saymon/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jan 2025 04:34:10 GMT -->

</html>
