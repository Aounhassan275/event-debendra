@extends('vendor.layouts.app')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-14">
            <ul class="d-flex align-items-center gap-2">
                <a href="{{ route('vendor.review') }}"> <i class="fa-solid fa-star"></i>
                    <b>Review</b></a>
            </ul>
        </div>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="review-body">
                        <div class="review-heading" style="display: flex; justify-content: space-between;">
                            <div class="col-md-6">
                                <p><b>Pragya Panda</b></p>
                            </div>
                                <div class="col-md-6 rating" style="border: 1px solid black; border-radius: 35%; padding: 5px 10px; font-size: 14px; display: flex; justify-content: center; width: fit-content; height: 37px;">
                                    <p><i class="fa-solid fa-star"></i> <b>4.5</b></p>
                            </div>
                        </div>
                        <div class="review-body" style="margin-top: -15px;">
                            <p style="font-size: 12px;"><b>27 Dec 2024</b></p>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure iusto modi sequi ipsa, commodi, nobis aut, consequuntur libero earum odit enim tempora ad sapiente pariatur laborum rem beatae dolorem! Velit!</p>
                        </div>
                    </div>

                    <div class="review-body">
                        <div class="review-heading" style="display: flex; justify-content: space-between;">
                            <div class="col-md-6">
                                <p><b>Pragya </b></p>
                            </div>
                                <div class="col-md-6 rating" style="border: 1px solid black; border-radius: 35%; padding: 5px 10px; font-size: 14px; display: flex; justify-content: center; width: fit-content; height: 37px;">
                                    <p><i class="fa-solid fa-star"></i> <b>4.0</b></p>
                            </div>
                        </div>
                        <div class="review-body" style="margin-top: -15px;">
                            <p style="font-size: 12px;"><b>27 Dec 2024</b></p>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure iusto modi sequi ipsa, commodi, nobis aut, consequuntur libero earum odit enim tempora ad sapiente pariatur laborum rem beatae dolorem! Velit!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
