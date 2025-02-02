@extends('web.layouts.app')
@section('content')
    <!-- ===================Hero section start ===================== -->
    <div class="bratecome-section">
        <div class="container">
            <div class="contant reveal-rotate">
                <div class="title">
                    <h2>About Us</h2>
                </div>
                <div class="inner-contant">
                    <ul>
                        <li><a href="#">Home</a><i class="fa fa-angle-right" aria-hidden="true"></i> About</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- =================Hero section end ===================== -->
    <!-- ========================team section start======================== -->

    <div class="team-section">
        <div class="container">
            <div class="top-content" data-cue="zoomIn">
                <div class="logos-image">
                    <img src="{{ asset('web/images/logo/title-logo.png') }}" alt="">
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
    <div class="testimonial-section about">
        <div class="container">
            <div class="top-content" data-cue="zoomIn">
                <div class="logos-image">
                    <img src="{{ asset('web/images/logo/title-logo.png') }}" alt="">
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
                        <div class="testi-box">
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
                        </div>

                        <div class="testi-box">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====================Testimonial section end====================== -->


    <!--================ About Section Start ============== -->
    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="left-content">
                        <div class="top-content" data-cue="zoomIn">
                            <div class="logos-image">
                                <img src="web/images/logo/title-logo.png" alt="">
                            </div>
                            <h2>We Invite guests to celebrate life</h2>
                        </div>
                        <div class="bottom-content">
                            <div class="description">
                                <p>A hotel serves as a transient oasis for travelers, providing a temporary home away from
                                    home. Whether nestled in a bustling urban landscape or nestled in a serene resort
                                    setting, hotels are diverse establishments designed to cater to the varied needs and
                                    preferences of guests. Offering a spectrum of accommodations, from opulent suites to</p>
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
@endsection
