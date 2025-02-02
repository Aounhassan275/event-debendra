@extends('layouts.admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <div class="row">
        @if (Session::has('success'))
            <div style="max-width: 100%" id="message"
                class="alert alert-success {{ Session::has('success_important') ? 'alert-important' : '' }} ">
                {{ session('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div style="max-width: 100%" id="message"
                class="alert alert-danger {{ Session::has('success_important') ? 'alert-important' : '' }} ">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-md-12">
            <a href="{{ url('manage-event') }}">
                <h4 class="pull-left" style="font-size: 20px;color: #e91eb6">
                    <i class="fa fa-arrow-left"></i> Back
                </h4>
            </a>
            <div class="card">
                <div class="page_title_block">
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">Add Event</div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="card-body mrg_bottom">
                    <form action="{{ route('events.store') }}" name="addeditcategory" method="POST"
                        class="form form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <div class="section-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Event Title :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="title" id="event_title"
                                            placeholder="Enter Event Title" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Category :-</label>
                                    <div class="col-md-6">
                                        <select name="category" id="category"
                                            class="select2 select2-container select2-container--default select2-container--below"
                                            required>
                                            <option value="">--Select Category--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Subcategory :-</label>
                                    <div class="col-md-6">
                                        <select name="subactegory_id" id="subcategory_id"
                                            class="select2 select2-container select2-container--default select2-container--below"
                                            required>
                                            <option value="">--Select Subcategory--</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Description :-</label>
                                    <div class="col-md-6">
                                        <textarea name="description" id="event_description" class="form-control" placeholder="Enter Your Description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="email" id="event_email"
                                            placeholder="Enter your email address" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" id="event_phone"
                                            placeholder="Enter Your Phone Number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Website :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="website" id="event_website" placeholder="Enter website"
                                            class="form-control">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Address :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="address" id="p-address" placeholder="Enter Your Address"
                                            class="form-control" class=" form-control">
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 10px">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <a href="https://www.latlong.net/" target="_blank">Find your latitude &
                                            longitude</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Latitude/Longitude :-</label>
                                    <div class="col-md-3">
                                        <input type="text" name="latitude" id="p-lat" placeholder="Latitude"
                                            placeholder="12.3456" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="longitude" id="p-long" placeholder="Longitude"
                                            placeholder="98.7654" class="form-control">
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Event Start Date & Time :-</label>
                                    <div class="col-md-3">
                                        <input type="text" name="event_start_date" id="start_date"
                                            placeholder="MM/DD/YYYY" class="form-control datepicker" autocomplete="off"
                                            readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="time" name="start_datetime" id="event_start_time"
                                            placeholder="09:00" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Event End Date & Time :-</label>
                                    <div class="col-md-3">
                                        <input type="text" name="event_end_date" id="end_date"
                                            class="form-control datepicker" placeholder="MM/DD/YYYY" autocomplete="off"
                                            readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="time" name="end_datetime" id="event_end_time"
                                            placeholder="09:00" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Event Type :-</label>
                                    <div class="col-md-6">
                                        <select name="type" id="website" class="select2" required>
                                            <option value="">--Select Type--</option>
                                            <option selected value="public">Public</option>
                                            <option value="private">Private</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group private_fields">
                                    <label class="col-md-3 control-label">Event Max. Tickets :- <p
                                            class="control-label-help">(Total no. of tickets)</p></label>
                                    <div class="col-md-6">
                                        <input type="number" name="max_tickets" id="event_ticket"
                                            placeholder="Enter event maximum ticket" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group private_fields">
                                    <label class="col-md-3 control-label">Person Wise Tickets :-<p
                                            class="control-label-help">(Total no. of tickets person can buy at a time)</p>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="number" name="tickets_per_person" id="person_wise_ticket"
                                            placeholder="Enter Person Wise Tickets" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group private_fields">
                                    <label class="col-md-3 control-label">Ticket Price (Rs.) :-</label>
                                    <div class="col-md-6">
                                        <input type="number" name="ticket_price" id="ticket_price"
                                            placeholder="Enter Ticket Price" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group private_fields">
                                    <label class="col-md-3 control-label">Registration Start Date & Time :-</label>
                                    <div class="col-md-3">
                                        <input type="text" name="registration_start_date" id="registration_start_date"
                                            placeholder="MM/DD/YYYY" class="form-control datepicker" autocomplete="off"
                                            readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="time" name="registration_start_datetime"
                                            id="registration_start_time" placeholder="09:00" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group private_fields">
                                    <label class="col-md-3 control-label">Registration End Date & Time :-</label>
                                    <div class="col-md-3">
                                        <input type="text" name="registration_end_date" id="registration_end_date"
                                            placeholder="MM/DD/YYYY" class="form-control datepicker" autocomplete="off"
                                            readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="time" name="registration_end_datetime" id="registration_end_time"
                                            placeholder="17:00" class="form-control">
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Event Logo :-<p class="control-label-help">
                                            (Recommended resolution: 300x300)</p> </label>
                                    <div class="col-md-6">
                                        <div class="fileupload_block">
                                            <input type="file" name="logo" id="fileupload"
                                                onchange="readURLLogo(this)">
                                            <div class="fileupload_img">
                                                <img id="event_logo" src="{{ asset('admin/images/landscape.jpg') }}"
                                                    alt="Featured image" style="width: 90px;height: 90px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Event Banner :- <p class="control-label-help">
                                            (Recommended resolution: 1200x450)</p></label>
                                    <div class="col-md-6">
                                        <div class="fileupload_block">
                                            <input type="file" name="banner" onchange="readURLBanner(this)">
                                            <div class="fileupload_img">
                                                <img id="event_banner" src="{{ asset('admin/images/landscape.jpg') }}"
                                                    alt="Banner image" style="width: 90px;height: 90px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Gallery Image :- <p class="control-label-help">
                                            (Recommended resolution: 600x400 OR width greater than height)</p></label>
                                    <div class="col-md-6">
                                        <div class="fileupload_block">
                                            <input type="file" name="gallery_image" onchange="readURLGallery(this)">
                                            <div class="fileupload_img">
                                                <img id="gallery_image" src="{{ asset('admin/images/landscape.jpg') }}"
                                                    alt="Banner image" style="width: 90px;height: 90px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                {{-- <div class="form-group">
                                <label class="col-md-3 control-label">Featured :-</label>
                                <div class="col-md-6">
                                    <input type="checkbox" id="event_featured" class="cbx hidden" value="1"
                                        name="event_featured">
                                    <label for="event_featured" class="lbl"></label>
                                </div>
                            </div> --}}

                                <br>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <button type="submit" name="submit"
                                            class="btn btn-primary btn-lg">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function readURLLogo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#event_logo').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLBanner(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#event_banner').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLGallery(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gallery_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function() {
            $(".private_fields").hide();

            $("#website").change(function() {
                if ($("#website").val() == "private") {
                    $(".private_fields").show();
                } else {
                    $(".private_fields").hide();
                }
            });

            $("#website").trigger("change");
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#category', function() {
                var category = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '{{ route('getSubCategory') }}',
                    data: {
                        'category': category,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').html('<option value="">Select</option>');
                        $.each(response, function(key, value) {
                            $('#subcategory_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    },
                });
            });
        });
    </script>
@endsection
