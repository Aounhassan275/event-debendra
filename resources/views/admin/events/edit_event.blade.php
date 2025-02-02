@extends('layouts.admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('user-event') }}" class="btn_back">
                <h4 class="pull-left" style="font-size: 20px;color: #cf1080">
                    <i class="fa fa-arrow-left"></i> Back
                </h4>
            </a>
            <div class="card">
                <div class="page_title_block">
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">Event Management</div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="card-body mrg_bottom">
                    <form action="{{ route('update-event') }}" name="addeditcategory" method="post" class="form form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $event->id }}" />

                        <div class="section">
                            <div class="section-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Registration Closed :-</label>
                                    <div class="col-md-6">
                                        <select name="register_closed" id="register_closed" class="select2" >
                                            <option value="false" selected>No</option>
                                            <option value="true">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Event Title :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="title" id="event_title"
                                            value="{{ $event->title }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Category :-</label>
                                    <div class="col-md-6">
                                        <select name="category" id="category" class="select2" >
                                            <option value="">--Select Category--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $event->category ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">SubCategory :-</label>
                                    <div class="col-md-6">
                                        <select name="subactegory_id" id="subcategory_id" class="select2" >
                                            <option value="">--Select Category--</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}"
                                                    {{ $subcategory->id == $event->subactegory_id ? 'selected' : '' }}>
                                                    {{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Description :-</label>
                                    <div class="col-md-6">
                                        <textarea name="description" id="event_description" class="form-control">{{ $event->description }}</textarea>
                                        <script>
                                            CKEDITOR.replace('event_description', {
                                                filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                                                filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                                                filebrowserImageBrowseUrl: 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email :-</label>
                                    <div class="col-md-6">
                                        <input type="email" name="email" id="event_email" value="{{ $event->email }}"
                                            class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone :-</label>
                                    <div class="col-md-6">
                                        <input type="tel" name="phone" id="event_phone" value="{{ $event->phone}}"
                                            class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Website :-</label>
                                    <div class="col-md-6">
                                        <input type="url" name="website" id="event_website"
                                            value="{{ $event->website }}" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Address :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="address" id="p-address"
                                            value="{{ $event->address }}" class="form-control">
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
                                        <input type="text" name="latitude" id="p-lat"
                                            placeholder="Latitude" value="{{ $event->latitude}}" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="longitude" id="p-long"
                                            placeholder="longitude" value="{{ $event->longitude}}" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Event Start Date & Time :-</label>
                                    <div class="col-md-3">
                                        <input type="text" name="event_start_date" id="start_date" value="{{ $event->event_start_date }}"
                                            class="form-control datepicker" autocomplete="off" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="time" class="form-control event-time-item"
                                            name="start_datetime" value="{{ $event->start_datetime }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Event End Date & Time :-</label>
                                    <div class="col-md-3">
                                        <input type="text" name="event_end_date" id="end_date" value="{{$event->event_end_date}}"
                                            class="form-control" autocomplete="off" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="time" class="form-control event-time-item" name="end_datetime"
                                            value="{{ $event->end_datetime }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Event Type :-</label>
                                    <div class="col-md-6">
                                        <select name="type" id="website" class="select2" >
                                            <option value="">--Select Type--</option>
                                            <option value="public" {{ ($event->type == 'public')? 'selected' : '' }}>Public</option>
                                            <option value="private" {{ ($event->type == 'private')? 'selected' : '' }}>Private</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group private_fields">
                                    <label class="col-md-3 control-label">Event Max. Tickets :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="max_tickets" id="event_ticket" value="{{ $event->max_tickets }}"
                                            class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group private_fields">
                                    <label class="col-md-3 control-label">Person Wise Tickets :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="tickets_per_person" id="person_wise_ticket"
                                            value="{{ $event->tickets_per_person }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group private_fields">
                                    <label class="col-md-3 control-label">Ticket Price (Rs.) :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="ticket_price" id="ticket_price" value="{{ $event->ticket_price }}"
                                            class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group private_fields">
                                    <label class="col-md-3 control-label">Registration Start Date & Time :-</label>
                                    <div class="col-md-3">
                                        <input type="text" name="registration_start_date" id="registration_start_date"
                                            value="{{ $event->registration_start_date }}" class="form-control" autocomplete="off" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="time" class="form-control event-time-item"
                                            name="registration_start_datetime" value="{{ $event->registration_start_datetime }}">
                                    </div>
                                </div>
                                <div class="form-group private_fields">
                                    <label class="col-md-3 control-label">Registration End Date & Time :-</label>
                                    <div class="col-md-3">
                                        <input type="text" name="registration_end_date" id="registration_end_date"
                                            value="{{ $event->registration_end_date }}" class="form-control" autocomplete="off" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="time" class="form-control event-time-item"
                                            name="registration_end_datetime" value="{{ $event->registration_end_datetime }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        <a href="#" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
