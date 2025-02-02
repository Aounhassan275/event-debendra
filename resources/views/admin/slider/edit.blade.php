@extends('layouts.admin')

@section('title', 'Edit Slider')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/quotes_fonts.css') }}">

    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('manage_slider') }}" class="btn_back">
                <h4 class="pull-left" style="font-size: 20px;color: #e91e63">
                    <i class="fa fa-arrow-left"></i> Back
                </h4>
            </a>

            <div class="card">
                <div class="page_title_block">
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">Edit Slider</div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="card-body mrg_bottom">
                    <form action="{{ route('slider.update') }}" method="post" class="form form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $edit->id }}" />
                        <input type="hidden" class="is_image" value="true" />
                        <div class="section">
                            <div class="section-body">
                                <div class="edit">
                                    <!-- Events Section -->
                                    <div class="external_banner">
                                        <div class="form-group row">
                                            <label class="col-md-3 control-label">Title :</label>
                                            <div class="col-md-6">
                                                <input type="text" name="title" placeholder="Enter title"
                                                    id="title" value="{{ $edit->title }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 control-label" for="external_url">External URL :</label>
                                            <div class="col-md-6">
                                                <input type="url" name="url" placeholder="Enter external URL"
                                                    id="url" value="{{ $edit->url }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 control-label">Select Image :
                                                <p class="control-label-help">(Recommended resolution: Landscape: 500x280)
                                                </p>
                                            </label>
                                            <div class="col-md-6">
                                                <div class="fileupload_block">
                                                    <input type="file" name="image" id="fileupload"
                                                        accept=".png, .jpg, .jpeg">
                                                    <div class="fileupload_img">
                                                        <img src="{{ asset('slider/images/' . $edit->image) }}"
                                                            alt="Upload Preview" style="width: 200px; height: 100px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                        </div>
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
            function updatePreviewImage(selectedOption) {
                const imageUrl = $(selectedOption).data('url');
                if (imageUrl) {
                    $('.preview').attr('src', imageUrl).show();
                } else {
                    $('.preview').hide();
                }
            }

            $('#event_id').on('change', function() {
                const selectedOption = $(this).find(':selected');
                updatePreviewImage(selectedOption);
            });

            const preSelectedOption = $('#event_id').find(':selected');
            updatePreviewImage(preSelectedOption);

            $("#fileupload").change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#uploadPreview').html('<img src="' + e.target.result +
                            '" style="width:180px;height:90px;"/>');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // function updateSliderTypeUI(selectedType) {
            //     if (selectedType === "Event") {
            //         $('.edit').show();
            //         $('.video_status').show();
            //         $('.external_banner').hide();
            //     } else if (selectedType === "external") {
            //         $('.edit').show();
            //         $('.video_status').hide();
            //         $('.external_banner').show();
            //     } else {
            //         $('.edit').hide();
            //         $('.video_status').hide();
            //         $('.external_banner').hide();
            //     }
            // }

            $('select[name="slider_type"]').on('change', function() {
                const selectedType = $(this).val();
                updateSliderTypeUI(selectedType);
            });

            const initialType = $('select[name="slider_type"]').val();
            updateSliderTypeUI(initialType);
        });
    </script>
@endsection
