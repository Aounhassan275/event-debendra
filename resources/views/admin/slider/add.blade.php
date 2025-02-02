<!-- resources/views/sliders/add.blade.php -->

@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/quotes_fonts.css') }}">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url()->previous() }}">
                <h4 class="pull-left" style="font-size: 20px;color: #e91e63">
                    <i class="fa fa-arrow-left"></i> Back
                </h4>
            </a>
            <div class="card">
                <div class="page_title_block">
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">ADD SLIDER</div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="card-body mrg_bottom">
                    <form action="{{ route('slider.store') }}" method="POST" class="form form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <div class="section-body">
                                {{-- <div class="form-group">
                                    <label class="col-md-3 control-label">Type :-</label>
                                    <div class="col-md-6">
                                        <select class="select2" name="slider_type" id="slider_type">
                                            <option value="Event">Event</option>
                                            <option value="external">External Banner</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group video_status">
                                    <label class="col-md-3 control-label" for="event_id">Event :-</label>
                                    <div class="col-md-6">
                                        <select name="event_id" id="event_id" class="select2" required>
                                            <option value="">--Select Event--</option>
                                            @foreach ($events as $event)
                                                <option
                                                    data-url="{{ asset('admin/images/uploads/event/' . $event->gallery_image) }}"
                                                    value="{{ $event->id }}">
                                                    {{ $event->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <img class="preview" src="" width="100%" height="auto"
                                                    style="display: none; width: 250px; height: 150px; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2); border-radius: 6px; object-fit: cover; margin-bottom: 20px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="external_banner">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Title :-</label>
                                        <div class="col-md-6">
                                            <input type="text" name="title" placeholder="Enter title"
                                                class="form-control" value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="url">External URL :-</label>
                                        <div class="col-md-6">
                                            <input type="text" name="url" placeholder="Enter external url"
                                                class="form-control" value="{{ old('url') }}">
                                                @error('url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Select Image :-
                                            <p class="control-label-help">(Recommended resolution: Landscape: 800x500,
                                                650x450)</p>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="fileupload_block">
                                                <input type="file" name="image" id="fileupload"
                                                    accept=".png, .jpg, .jpeg">
                                                <div id="uploadPreview" class="fileupload_img">
                                                    <img type="image" src="{{ asset('assets/images/landscape.jpg') }}"
                                                        alt="image alt" />
                                                </div>
                                            </div>
                                            <div class="fileupload_img" id="uploadPreview">
                                                @if (session('slider_file'))
                                                    <img width="100%"
                                                        src="{{ asset('images/' . session('slider_file')) }}" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
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
        $("select[name='slider_type']").on("change", function(e) {
            var type = $(this).val();
            $(".video_status").find("select").attr("required", false);
            $(".external_banner").find("input").attr("required", false);

            if (type === 'Event') {
                $(".video_status").show();
                $(".video_status").find("select").attr("required", true);
                $(".external_banner").hide();
            } else if (type === 'external') {
                $(".external_banner").show();
                $(".external_banner").find("input").attr("required", true);
                $(".video_status").hide();
            }
        });

        $("select[name='event_id']").on("change", function(e) {
            var url = $(this).children("option:selected").data("url");
            $(this).parent("div").find(".preview").attr('src', url);
            $(this).parent("div").find(".preview").show();
        });

        var _URL = window.URL || window.webkitURL;

        $("#fileupload").change(function(e) {
            var file, img;
            var thisFile = $(this);
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    if (this.width < this.height) {
                        alert("Image width must be greater than image height!");
                        thisFile.val('');
                        $('#uploadPreview').html('');
                        return false;
                    } else if (this.width == this.height) {
                        alert("Image width must not equal to image height!");
                        thisFile.val('');
                        $('#uploadPreview').html('');
                        return false;
                    }
                };
                img.onerror = function() {
                    alert("not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
                $('#uploadPreview').html('<img src="' + img.src + '" style="width:180px;height:90px;"/>');
            }
        });
    </script>
@endsection
