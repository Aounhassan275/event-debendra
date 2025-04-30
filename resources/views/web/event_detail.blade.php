@extends('web.layouts.app')
@section('content')
    <!-- Hero section start ===================== -->
    <div class="bratecome-section">
        <div class="container">
            <div class="contant reveal-rotate">
                <div class="title">
                    <h2>{{$event->title}}</h2>
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
                    @foreach ($event->eventImages as $eventImage)
                        <div class="single-service">
                            <div class="image-theme">
                                <img src="{{ asset('admin/images/uploads/event/' . $eventImage->image) }}" alt="" style="height:252px; width:100%;">
                            
                            </div>
                        </div>
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
