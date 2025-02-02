@extends('web.layouts.app')
@section('content')
<!-- ===================Hero section start ===================== -->
<div class="bratecome-section">
    <div class="container">
        <div class="contant reveal-rotate">
            <div class="title">
                <h2>Contact Us</h2>
            </div>
            <div class="inner-contant">
                <ul>
                    <li><a href="#">Home</a><i class="fa fa-angle-right" aria-hidden="true"></i> Contact</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- =================Hero section end ===================== -->

<!-- =====================contact section start======================== -->

<div class="contact-section">
    <div class="container">
        <div class="top-content" data-cue="zoomIn">
            <div class="logos-image">
                <img src="{{ asset('web/images/logo/title-logo.png') }}" alt="">
            </div>
            <h2>We Invite guests to celebrate life</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="contact-icon align-items-center d-flex" data-cue="zoomIn">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="text">
                        <h3>Office Address</h3>
                        <p>2st Floor New World</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="contact-icon align-items-center d-flex" data-cue="zoomIn">
                    <div class="icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="text">
                        <h3>E-mail Address</h3>
                        <p>example@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="contact-icon align-items-center d-flex" data-cue="zoomIn">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="text">
                        <h3>Phone Number</h3>
                        <p>+880 888 444 242</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center midd">
            <div class="col-lg-5 col-md-12">
                <div class="con-iage" data-cue="zoomIn">
                    <img src="{{ asset('web/images/body/contact.avif') }}" alt="" style="height: 451px; width
                    : 100%;">
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="contact_from upper10" data-cue="zoomIn">
                    <form action="https://formspree.io/f/myyleorq" method="POST" id="it-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form_box mb-2">
                                    <h3>Check In</h3>
                                    <input class="form-control" type="datetime-local"
                                        placeholder="Selecet Start Date">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_box mb-2">
                                    <h3>Check Out</h3>
                                    <input class="form-control" type="datetime-local"
                                        placeholder="Selecet End Date">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form_box mb-1">
                                    <h3>Rooms</h3>
                                    <select name="place" id="place">
                                        <option value="saab">Select Option</option>
                                        <option value="opel">02 Rooms</option>
                                        <option value="audi">03 Rooms</option>
                                        <option value="audi">04 Rooms</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_box mb-1">
                                    <h3>Guests</h3>
                                    <select name="place" id="place" placeholder="selecet">
                                        <option value="saab">Select Option</option>
                                        <option value="opel">Adult / Child</option>
                                        <option value="audi">Adult / Child</option>
                                        <option value="audi">Adult / Child</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form_box mb-1">
                                    <h3>Number</h3>
                                    <input class="form-control" type="number" placeholder="Your Phone Nuber">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_box mb-1">
                                    <div class="quote_btn text_center mt-2">
                                        <button class="btn" type="submit"> Send Now <i
                                                class="flaticon-arrow-pointing-to-right"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div id="status"></div>
                </div>
            </div>
            <!-- <div class="con-shap whychoose-rotateme">
            <img src="assets/images/glob2.png" alt="">
        </div> -->
        </div>
    </div>
</div>

<!--start map section  -->
<div class="map-section" data-cue="zoomIn">
    <div class="container-fluid">
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.3700570562946!2d89.27771461495874!3d25.725273183653318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e32db15873de0b%3A0x95440457e2745c92!2z4Kak4Ka-4Kac4Ka54Ka-4KafIOCmnOCmruCmv-CmpuCmvuCmsOCmrOCmvuCnnOCmvywg4Kaw4KaC4Kaq4KeB4Kaw!5e0!3m2!1sen!2sbd!4v1678024331162!5m2!1sen!2sbd"
                width="1920" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<!-- =====================contact section end======================== -->
@endsection
