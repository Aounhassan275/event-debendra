@extends('layouts.admin')

@section('content')
    <style type="text/css">
        .minicolors-theme-default .minicolors-input {
            height: 48px !important;
            width: auto;
            display: inline-block;
            padding-left: 40px !important;
        }

        .minicolors-theme-default .minicolors-swatch {
            top: 9px !important;
            left: 5px !important;
            width: 30px !important;
            height: 30px !important;
        }

        .minicolors-theme-default.minicolors {
            width: 100% !important;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('category.index') }}">
                <h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4>
            </a>

            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="page_title_block">
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">Add Subcategory</div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="card-body mrg_bottom">
                    <form action="{{ route('subcategory.update') }}" method="post" class="form form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <input type="hidden" name="id" value="{{ $edit->id }}">
                            <div class="section-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Subcategory Name:</label>
                                    <div class="col-md-6">
                                        <select name="category_id" class="form-control" required>
                                            <option value="">---CHOOSE---</option>
                                            @foreach ($categories as $data)
                                                <option value="{{ $data->id }}" {{ ($data->id === $edit->category_id)? 'selected' : '' }} >{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Subcategory Name:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Enter Subcategory name" value="{{ $edit->name }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Select Thumbnail:</label>
                                    <div class="col-md-6">
                                        <div class="fileupload_block">
                                            <input type="file" name="image" id="fileupload"
                                                onchange="readURLIcone(this);">
                                            <div class="fileupload_img">
                                                <img type="image" id="category_icone"
                                                    src="{{ asset('subcategory/images/' . $edit->image) }}"
                                                    style="height: 60px;width: 60px" alt="category icon" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/colorpicker/jquery.minicolors.js"></script>
    <link rel="stylesheet" href="/assets/colorpicker/jquery.minicolors.css">

    <script type="text/javascript">
        function rgba2hex(orig) {
            var a, isPercent,
                rgb = orig.replace(/\s/g, '').match(/^rgba?\((\d+),(\d+),(\d+),?([^,\s)]+)?/i),
                alpha = (rgb && rgb[4] || "").trim(),
                hex = rgb ? (rgb[1] | 1 << 8).toString(16).slice(1) + (rgb[2] | 1 << 8).toString(16).slice(1) + (rgb[3] |
                    1 << 8).toString(16).slice(1) : orig;

            if (alpha !== "") {
                a = alpha;
            } else {
                a = 1;
            }
            a = ((a * 255) | 1 << 8).toString(16).slice(1);
            hex = a + hex;

            return hex;
        }

        $("#bg_color_rgba").val(rgba2hex($("#category_bg_color").val()));

        $("#category_bg_color").minicolors({
            opacity: true,
            format: 'rgb' || 'hex',
            theme: 'default',
            change: function(value, opacity) {
                $("#bg_color_rgba").val(rgba2hex(value));
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("input[name='category_image']").next(".fileupload_img").find("img").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLIcone(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#category_icone').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
