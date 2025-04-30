@extends('web.layouts.app')
@section('content')
    <!--========================Start slider area==========================-->
    <div class="slider-section">
        <div class="row">
            <div class="col-lg-3 col-md-0">

            </div>
            <div class="col-lg-9 col-md-12">
                <div class="right-content">
                    <div class="slider-list owl-carousel">
                        {{-- <div class="slider-item-1"></div>
                        <div class="slider-item-2"></div>
                        <div class="slider-item-3"></div> --}}
                        @foreach ($silders as $slider)
                            <div class="slider-item"
                                style="background: url('{{ asset('slider/images/' . $slider->image) }}');
                               background-repeat: no-repeat;
                               background-size: cover;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            @foreach ($silders as $slider)
                <div class="left-content">
                    <div class="image-theme">
                        <img src="{{ asset('web/images/slider/lb7.png') }}" alt="">
                    </div>
                </div>
                <div class="slider-content">
                    <div class="title">
                        <h4>Welcome to Einvie</h4>
                    </div>
                    <h2>CELEBRATE WITH US</h2>
                    <h2>YOUR VACATION</h2>
                </div>
            @endforeach
            {{-- <div class="booking-area">
                <form action="https://formspree.io/f/myyleorq" method="POST" id="coderstheme-form">
                    <div class="all-box row align-items-center">
                        <div class="col-lg-2 col-md-6">
                            <div class="input-box">
                                <h3>Check In</h3>
                                <input class="form-control" type="datetime-local" placeholder="Selecet Start Date">
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="input-box">
                                <h3>Check Out</h3>
                                <input class="form-control" type="datetime-local" placeholder="Selecet End Date">
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="input-box">
                                <h3>Rooms</h3>
                                <select name="place" id="place">
                                    <option value="saab">Select Option</option>
                                    <option value="opel">02 Rooms</option>
                                    <option value="audi">03 Rooms</option>
                                    <option value="audi">04 Rooms</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="input-box">
                                <h3>Guests</h3>
                                <select name="place" id="place" placeholder="selecet">
                                    <option value="saab">Select Option</option>
                                    <option value="opel">Adult / Child</option>
                                    <option value="audi">Adult / Child</option>
                                    <option value="audi">Adult / Child</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="input-box">
                                <h3>Number</h3>
                                <input class="form-control" type="number" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="booking-button">
                                <button type="submit">Book Now</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="status"></div>
            </div> --}}
        </div>
    </div>

    <!--========================end slider area==========================-->

    <!--================ About Section Start ============== -->
    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="left-content">
                        <div class="top-content" data-cue="zoomIn">
                            <div class="logos-image">
                                <img src="{{ asset('vendor/images/logo-icon.png') }}" alt="" style="height:56px; width:auto ;">
                            </div>
                            <h2>We Invite guests to celebrate life</h2>
                        </div>
                        <div class="bottom-content">
                            <div class="description">
                                <p>A hotel serves as a transient oasis for travelers, providing a temporary home away
                                    from home. Whether nestled in a bustling urban landscape or nestled in a serene
                                    resort setting, hotels are diverse establishments designed to cater to the varied
                                    needs and preferences of guests. Offering a spectrum of accommodations, from opulent
                                    suites to</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="single-counter">
                                        <div class="count-box">
                                            <div class="count-title">
                                                <h1 class="counter">706</h1>
                                                <span>K+</span>
                                            </div>
                                            <p>Happy Clients</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="single-counter">
                                        <div class="count-box">
                                            <div class="count-title">
                                                <h1 class="counter">906</h1>
                                                <span>K+</span>
                                            </div>
                                            <p>Service Review</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="single-counter">
                                        <div class="count-box">
                                            <div class="count-title">
                                                <h1 class="counter">409</h1>
                                                <span>K+</span>
                                            </div>
                                            <p>Feture Buildin</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="about-button" data-cue="zoomIn">
                                <a href="#">See More <i class="flaticon-arrow-pointing-to-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-image-wrap">
                        <div class="s-section">
                            <div class="containers">
                                <input type="radio" name="slider" class="d-none" id="s1" checked>
                                <input type="radio" name="slider" class="d-none" id="s2">
                                <input type="radio" name="slider" class="d-none" id="s3">
                                <input type="radio" name="slider" class="d-none" id="s4">
                                <input type="radio" name="slider" class="d-none" id="s5">
                                <div class="cards">
                                    <label for="s1" id="slide1">
                                        <div class="card">
                                            <div class="image">
                                                <img src="{{ asset('web/images/slider/1.png') }}" alt="">
                                            </div>
                                        </div>
                                    </label>

                                    <label for="s2" id="slide2">
                                        <div class="card">
                                            <div class="image">
                                                <img src="{{ asset('web/images/slider/2.png') }}" alt="">
                                            </div>
                                        </div>
                                    </label>

                                    <label for="s3" id="slide3">
                                        <div class="card">
                                            <div class="image">
                                                <img src="{{ asset('web/images/slider/3.png') }}" alt="">
                                            </div>
                                        </div>
                                    </label>

                                    <label for="s4" id="slide4">
                                        <div class="card">
                                            <div class="image">
                                                <img src="{{ asset('web/images/slider/4.png') }}" alt="">
                                            </div>
                                        </div>
                                    </label>
                                    <label for="s5" id="slide5">
                                        <div class="card">
                                            <div class="image">
                                                <img src="{{ asset('web/images/slider/5.png') }}" alt="">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ About Section end ============== -->

    <!-- ===================marque section start===================== -->
    {{-- <div class="marque-section ">
        <div class="container-cus">
            <div class="text_bar style1">
                <div class="text_bar_content" data-cue="zoomIn">
                    <div class="text-item">
                        <h3>Text Item</h3>
                        <h3>Text Item</h3>
                        <h3>Text Item</h3>
                        <h3>Text Item</h3>
                    </div>
                    <div class="text-item copy">
                        <h3>Text Item</h3>
                        <h3>Text Item</h3>
                        <h3>Text Item</h3>
                        <h3>Text Item</h3>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ====================marque section end======================= -->

    <!--================ main services Start ============== -->

    <div class="service-section">
        <div class="container">
            <div class="top-content" data-cue="zoomIn">
                <div class="logos-image">
                    <img src="{{ asset('vendor/images/logo-icon.png') }}" alt="" style="height:56px; width:auto ;">
                </div>
                <h2>Our Events</h2>
            </div>
            <div class="all-service" data-cue="zoomIn">
                <div class="bed-slider owl-carousel">
                    @foreach ($events as $event)
                        <div class="single-service">
                            <div class="image-theme">
                                <img src="{{ asset('admin/images/uploads/event/' . $event->banner) }}" alt=""
                                    style="height:252px; width:100%;">
                                <div class="button">
                                    <a href="{{route('web.event_detail',$data->id)}}">View Details</a>
                                </div>
                            </div>
                            <div class="content-box">

                                <div class="service-title">
                                    <h4>{{ $event->getCategory->name }}</h4>
                                    <h2>{{ $event->title }}</h2>
                                    <div class="services-icon">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    {{-- <div class="bed-number">
                                        <div class="bed d-flex align-items-center">
                                            <img src="{{ asset('web/images/logo/bed.png') }}" alt="">
                                            <p>2 Luxry Bed</p>
                                        </div>
                                        <div class="feet">
                                            <p>1000 SQ.FT / Room</p>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="single-service">
                        <div class="image-theme">
                            <img src="{{ asset('web/images/body/bed3.png') }}" alt="">
                            <div class="button">
                                <a href="service-details.html">View Details</a>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="service-title">
                                <h4>Cofortable Room</h4>
                                <h2>Single Bed Room</h2>
                                <div class="services-icon">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="bed-number">
                                    <div class="bed d-flex align-items-center">
                                        <img src="{{ asset('web/images/logo/bed.png') }}" alt="">
                                        <p>1 Luxry Bed</p>
                                    </div>
                                    <div class="feet">
                                        <p>1000 SQ.FT / Room</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-service">
                        <div class="image-theme">
                            <img src="{{ asset('web/images/body/bed4.png') }}" alt="">
                            <div class="button">
                                <a href="service-details.html">View Details</a>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="service-title">
                                <h4>Cofortable Room</h4>
                                <h2>Duble Bed Room</h2>
                                <div class="services-icon">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="bed-number">
                                    <div class="bed d-flex align-items-center">
                                        <img src="{{ asset('web/images/logo/bed.png') }}" alt="">
                                        <p>2 Luxry Bed</p>
                                    </div>
                                    <div class="feet">
                                        <p>1000 SQ.FT / Room</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!--================ Service section end =============== -->

    <!--===============feature section start =============== -->

    <div class="feature-section">
        <div class="container">
            <div class="top-content" data-cue="zoomIn">
                <div class="logos-image">
                    <img src="{{ asset('vendor/images/logo-icon.png') }}" alt="" style="height:56px; width:auto ;">
                </div>
                <h2>Our Event Partners</h2>
            </div>
            <div class="row">
                @foreach ($vendors_type as $type)
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="single-feature"
                            style="--feature-bg-image: url('{{ asset('vendor/images/vendor-type/' . $type->image) }}')">
                            <div class="feature-icon">
                                <img src="{{ asset('vendor/images/logo-icon.png') }}" alt=""
                                    style="height: 47px; width:47px;">
                            </div>
                            <div class="text">
                                <h3>{{ $type->name }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('web/images/logo/feature-6.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>Air Condition</h3>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('web/images/logo/feature-3.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>Smart Lock</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('web/images/logo/feature-5.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>Swiming Pool</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('web/images/logo/feature-4.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>Breakfast</h3>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="about-button" data-cue="zoomIn">
                <a href="#">See More <i class="flaticon-arrow-pointing-to-right"></i></a>
            </div> --}}
            <div class="text-center mt-4 Vendor-button" data-cue="zoomIn">
                <a href="{{ route('vendor.register') }}">Register as a Vendor</a>
            </div>
        </div>
    </div>

    <!--===============feature section end =============== -->
    <!--===============feature section start =============== -->
    {{-- <div class="spa-section">
        <div class="container">
            <div class="row all-content">
                <div class="col-md-7 col-sm-12">
                    <div class="single">
                        <div class="left-content">
                            <div class="spa-slider owl-carousel" data-cue="zoomIn">
                                <div class="slider-image"
                                    style="background-image: url('{{ asset('web/images/facility/spa1.jpg') }}');background-size: cover; background-repeat: no-repeat; background-position: center center;">
                                </div>
                                <div class="slider-image"
                                    style="background-image: url('{{ asset('web/images/facility/spa2.jpg') }}');background-size: cover; background-repeat: no-repeat; background-position: center center;">
                                </div>
                                <div class="slider-image"
                                    style="background-image: url('{{ asset('web/images/facility/spa3.jpg') }}');background-size: cover; background-repeat: no-repeat; background-position: center center;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="single">
                        <div class="right-content">
                            <div class="top-content" data-cue="zoomIn">
                                <div class="logos-image">
                                    <img src="{{ asset('web/images/logo/title-logo.png') }}">
                                </div>
                                <h2>Our Parlar & Spa Center</h2>
                            </div>
                            <div class="description">
                                <p>
                                    Welcome to the exquisite Havenview Hotel, where luxury meets comfort in the heart of
                                    the vibrant cityscape. Nestled amidst lush landscapes and offering breathtaking
                                    views of the city skyline, Havenview Hotel is a sanctuary for those seeking an
                                    unparalleled hospitality experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--================feature section end =============== -->
    <!--================vodeo section start =============== -->
    <div class="video-section">
        <div class="container">
            <div class="main-content">
                <div class="top-content" data-cue="zoomIn">
                    {{-- <div class="logos-image">
                        <img src="{{ asset('web/images/logo/title-logo.png') }}" alt="">
                    </div> --}}
                    <div class="title reveal-rotate">
                        <h2>New Year Offer !</h2>
                        <h2>50% Descount In All Suites And Rooms</h2>
                    </div>
                    <div class="offer-button" data-cue="zoomIn">
                        <a href="#">See Details <i class="flaticon-arrow-pointing-to-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <canvas id="canvas"></canvas>
    </div>
    <!--================vodeo section end =============== -->

    <!-- ========================team section start======================== -->

    <div class="team-section">
        <div class="container">
            <div class="top-content" data-cue="zoomIn">
                <div class="logos-image">
                    <img src="{{ asset('vendor/images/logo-icon.png') }}" alt="" style="height:56px; width:auto ;">
                </div>
                <h2>Our Professional Team Member</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-team" data-cue="zoomIn">
                        <div class="team-contant">
                            <div class="team-image">
                                <img src="{{ asset('web/images/team/hm1.jpg') }}" alt="">
                            </div>
                            <div class="team-text">
                                <div class="team-title">
                                    <h3>Beauty Que</h3>
                                </div>
                                <div class="team-degicnation">
                                    <p>Maneger</p>
                                </div>
                                <div class="social-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-team" data-cue="zoomIn">
                        <div class="team-contant">
                            <div class="team-image">
                                <img src="{{ asset('web/images/team/hm2.jpg') }}" alt="">
                            </div>
                            <div class="team-text">
                                <div class="team-title">
                                    <h3>Bruce Land</h3>
                                </div>
                                <div class="team-degicnation">
                                    <p>Service Director</p>
                                </div>
                                <div class="social-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-team" data-cue="zoomIn">
                        <div class="team-contant">
                            <div class="team-image">
                                <img src="{{ asset('web/images/team/hm8.jpg') }}" alt="">
                            </div>
                            <div class="team-text">
                                <div class="team-title">
                                    <h3>Nikkol</h3>
                                </div>
                                <div class="team-degicnation">
                                    <p>Gide Expert</p>
                                </div>
                                <div class="social-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-team" data-cue="zoomIn">
                        <div class="team-contant">
                            <div class="team-image">
                                <img src="{{ asset('web/images/team/hm5.jpg') }}" alt="">
                            </div>
                            <div class="team-text">
                                <div class="team-title">
                                    <h3>Bruce jison</h3>
                                </div>
                                <div class="team-degicnation">
                                    <p>Food Director</p>
                                </div>
                                <div class="social-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ========================team section end======================== -->

    <!-- ======================Testimonial section start===================== -->
    <div class="testimonial-section">
        <div class="container">
            <div class="top-content" data-cue="zoomIn">
                <div class="logos-image">
                    <img src="{{ asset('vendor/images/logo-icon.png') }}" alt="" style="height:56px; width:auto ;">
                </div>
                <h2>Our Clients Overview About Us</h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="image-tham" data-cue="zoomIn">
                        <img src="{{ asset('web/images/slider/tes2.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 ff">
                    <div class="testi-slider2 owl-carousel" data-cue="zoomIn">
                        @foreach ($testimonial as $data)
                        <div class="testi-box">
                            <div class="testi-content">
                                <h2><span>What</span> People Say?</h2>
                                <p style="min-height: 101px; max-height: 101px; overflow:hidden;"> {{ $data->description }} </p>
                                <div class="people d-flex align-items-center">
                                    <img src="{{ asset('admin/web/testimonial/' .$data->image) }}" alt="">
                                    <div class="text">
                                        <h4>{{ $data->name }}</h4>
                                        <span>{{ $data->designation }}</span>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('web/images/logo/tes-logo.png') }}" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="testi-box">
                            <div class="testi-content">
                                <h2><span>What</span> People Say?</h2>
                                <p>Dynamically innovate sustainable platform after cross functional supply chains.
                                    Progressively expedite market positioning commun with collaborative value.
                                    Authoritatively extend equity invested in through long-term high-impact.</p>
                                <div class="people d-flex align-items-center">
                                    <img src="{{ asset('web/images/slider/tp.png') }}" alt="">
                                    <div class="text">
                                        <h4>John Don</h4>
                                        <span>Queality Expert</span>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('web/images/logo/tes-logo.png') }}" alt="">
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====================Testimonial section end====================== -->

    <!-- ========================brand section start======================== -->


    <!-- ========================brand section end======================== -->




    <!-- ======================blog section start========================= -->
    <div class="blog-section">
        <div class="container">
            <div class="top-content" data-cue="zoomIn">
                <div class="logos-image">
                    <img src="{{ asset('vendor/images/logo-icon.png') }}" alt="" style="height:56px; width:auto ;">
                </div>
                <h2>Our Update Newes And Portal</h2>
            </div>

            <div class="blog-slider owl-carousel" data-cue="zoomIn">
                <div class="songle-blog">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="#">04 November 2024</a>
                            <span>By Admin</span>
                        </div>
                        <div class="blog-text">
                            <h3>
                                <a href="blog-detail.html"> Infrastructure Upgrade</a>
                            </h3>
                            <p>Each technology is very fresh and fully saymon by taking our good firm Each technology is
                                very fresh</p>
                        </div>
                    </div>
                    <div class="blog-image">
                        <img src="web/images/blog/blog1.jpg" alt="">
                    </div>
                    <div class="category">
                        <p>Category</p>
                    </div>
                </div>

                <div class="songle-blog">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="#">04 November 2024</a>
                            <span>By Admin</span>
                        </div>
                        <div class="blog-text">
                            <h3>
                                <a href="blog-detail.html"> Single Room Upgrade</a>
                            </h3>
                            <p>Each technology is very fresh and fully saymon by taking our good firm Each technology is
                                very fresh</p>
                        </div>
                    </div>
                    <div class="blog-image">
                        <img src="{{ asset('web/images/blog/blog2.jpg') }}" alt="">
                    </div>
                    <div class="category">
                        <p>Category</p>
                    </div>
                </div>

                <div class="songle-blog">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="#">04 November 2024</a>
                            <span>By Admin</span>
                        </div>
                        <div class="blog-text">
                            <h3>
                                <a href="blog-detail.html"> Infrastructure Upgrade</a>
                            </h3>
                            <p>Each technology is very fresh and fully saymon by taking our good firm Each technology is
                                very fresh</p>
                        </div>
                    </div>
                    <div class="blog-image">
                        <img src="{{ asset('web/images/blog/blog3.jpg') }}" alt="">
                    </div>
                    <div class="category">
                        <p>Category</p>
                    </div>
                </div>

                <div class="songle-blog">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="#">04 November 2024</a>
                            <span>By Admin</span>
                        </div>
                        <div class="blog-text">
                            <h3>
                                <a href="blog-detail.html"> Duble Room Upgrade</a>
                            </h3>
                            <p>Each technology is very fresh and fully saymon by taking our good firm Each technology is
                                very fresh</p>
                        </div>
                    </div>
                    <div class="blog-image">
                        <img src="{{ asset('web/images/blog/blog4.jpg') }}" alt="">
                    </div>
                    <div class="category">
                        <p>Category</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================blog section end======================== -->

    <!-- ===================brand section start===================== -->
    {{-- <div class="brand-section ">
        <div class="container-cus">
            <div class="row">
                <div class="brand-slider owl-carousel">
                    <div class="brand-single-box">
                        <div class="brand-thumb">
                            <img src="{{ asset('web/images/brand/1.png') }}" alt="">
                        </div>
                    </div>

                    <div class="brand-single-box">
                        <div class="brand-thumb">
                            <img src="{{ asset('web/images/brand/2.png') }}" alt="">
                        </div>
                    </div>

                    <div class="brand-single-box">
                        <div class="brand-thumb">
                            <img src="{{ asset('web/images/brand/3.png') }}" alt="">
                        </div>
                    </div>

                    <div class="brand-single-box">
                        <div class="brand-thumb">
                            <img src="{{ asset('web/images/brand/4.png') }}" alt="">
                        </div>
                    </div>

                    <div class="brand-single-box">
                        <div class="brand-thumb">
                            <img src="{{ asset('web/images/brand/5.png') }}" alt="">
                        </div>
                    </div>

                    <div class="brand-single-box">
                        <div class="brand-thumb">
                            <img src="{{ asset('web/images/brand/6.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ====================brand section end======================= -->
@endsection
