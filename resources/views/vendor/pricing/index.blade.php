@extends('vendor.layouts.app')
@section('content')
    <style>
        .form-check {
            display: flex;
            align-items: center;
        }

        .form-check-input {
            margin-right: 2px;
        }
    </style>
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-14">
            <ul class="d-flex align-items-center gap-2">
                <a href="{{ route('vendor.pricing') }}"> <i class="fa-solid fa-briefcase"></i>
                    <b>Pricing</b></a>
            </ul>
        </div>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="row gy-3 needs-validation" novalidate action="{{ route('pricing.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add pricing details</h5>
                        </div>
                        <div class="container">
                            <div id="pricing-details">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Service name</label>
                                        <input type="text" name="service_name[]" class="form-control"
                                            placeholder="Enter Service name" value="{{ old('service_name') }}">
                                        @error('service_name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Cost</label>
                                        <input type="text" name="cost[]" class="form-control" placeholder="Enter Cost"
                                            value="{{ old('cost') }}">
                                        @error('cost')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" id="add-more-pricing" class="btn btn-primary">Add more pricing
                                        details</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <h5 class="card-title mb-0">Services you provide</h5>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Service name</label>
                            <input type="text" name="provided_service" class="form-control" placeholder="Enter Service name"
                                value="{{ old('provided_service') }}">
                            @error('provided_service')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cost</label>
                            <input type="text" name="provided_service_cost" class="form-control" placeholder="Enter Cost"
                                value="{{ old('provided_service_cost') }}">
                            @error('provided_service_cost')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary">Add more services</button>
                        </div>

                        <hr>

                        <div class="col-md-6">
                            <h6>Your payment terms</h6>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_terms" id="payment25"
                                    value="Up to 25% Advance">
                                <label class="form-check-label" for="payment25">
                                    Up to 25% Advance
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_terms" id="payment50"
                                    value="Approx. 50% Advance while booking">
                                <label class="form-check-label" for="payment50">
                                    Approx. 50% Advance while booking
                                </label>
                            </div>
                            <a class="btn btn-outline-primary btn-sm">Add more payment terms</a>
                        </div>

                        <div class="col-md-6">
                            <h6>Travel and lodging costs</h6>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="lodging_costs" id="lodgingClientUs" value="Cost of Stay borne by Client, Travel borne by Us">
                                <label class="form-check-label" for="lodgingClientUs">
                                    Cost of Stay borne by Client, Travel borne by Us
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="lodging_costs" id="lodgingClient" value="Cost of Stay & Travel borne by Client">
                                <label class="form-check-label" for="lodgingClient">
                                    Cost of Stay & Travel borne by Client
                                </label>
                            </div>
                            <a class="btn btn-outline-primary btn-sm">Add more terms & conditions</a>
                        </div>
                        <hr>
                        <div class="form-group mt-3">
                            <h6 class="mb-3">Cancellation Policy</h6>
                            <label class="mb-3" for="">Describe your cancellation policy in details</label>
                            <textarea class="form-control" name="cancellation_policy" cols="20" rows="4"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-more-pricing').click(function() {
                let newFields = `
                <div class="row mb-3 pricing-row">
                    <div class="col-md-6">
                        <label class="form-label">Service name</label>
                        <input type="text" name="service_name[]" class="form-control" placeholder="Enter Service name">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Cost</label>
                        <input type="text" name="cost[]" class="form-control" placeholder="Enter Cost">
                    </div>
                    <div class="col-md-2" style="margin-top: 36px;">
                        <button type="button" class="btn btn-danger btn-sm delete-row">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>`;
                $('#pricing-details').append(newFields);
                $(document).on('click', '.delete-row', function(){
                    $(this).closest('.pricing-row').remove();
                });
            });
        });
    </script>
@endsection
