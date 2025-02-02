@extends('web.layouts.app')
@section('content')
    <!-- Hero section start ===================== -->
    <div class="bratecome-section">
        <div class="container">
            <div class="contant reveal-rotate">
                <div class="title">
                    <h2>Our Events</h2>
                </div>
                <div class="inner-contant">
                    <ul>
                        <li><a href="#">Home</a><i class="fa fa-angle-right" aria-hidden="true"></i> Events</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero section end ===================== -->
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
                    @foreach ($events as $data)
                        <div class="single-service">
                            <div class="image-theme">
                                <img src="{{ asset('admin/images/uploads/event/' . $data->banner) }}" alt="" style="height:252px; width:100%;">
                                <div class="button">
                                    <a href="service-details.html">View Details</a>
                                </div>
                            </div>
                            <div class="content-box">

                                <div class="service-title">
                                    <h4>{{ $data->getCategory->name }}</h4>
                                    <h2>{{ $data->title }}</h2>
                                    <div class="services-icon">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                        <p>2 Luxry Bed</p>
                                    </div>
                                    <div class="feet">
                                        <p>1000 SQ.FT/Room</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div> --}}

                        {{-- <div class="single-service">
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
                                            <p>1000 SQ.FT/Room</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
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
                    <img src="{{ asset('web/images/logo/title-logo.png') }}" alt="">
                </div>
                <h2>World Class Room Services</h2>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('web/images/logo/feature-2.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>Wi-Fi Internet</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('web/images/logo/feature-6.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>Air Condition</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
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
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('web/images/logo/feature-7.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>Bufe Items</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===============feature section end =============== -->
@endsection
