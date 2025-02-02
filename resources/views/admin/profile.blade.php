@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="images/" sizes="16x16">

</head>
<body>

<div class="row">
    <div class="col-md-12">
        <a href="{{ url('dashboard')}}">
            <h4 class="pull-left" style="font-size: 20px; color: #e91e63">
                <i class="fa fa-arrow-left"></i> Back
            </h4>
        </a>
        <div class="card">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Admin Profile</div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row mrg-top">
                <div class="col-md-12">
                    <div class="card-body mrg_bottom">
                        <form action="" method="post" class="form form-horizontal" enctype="multipart/form-data">
                            @csrf <!-- Include CSRF token for form submission -->
                            <div class="section">
                                <div class="section-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Profile Image:</label>
                                        <div class="col-md-6">
                                            <div class="fileupload_block">
                                                <input type="file" name="image" id="fileupload" onchange="readURL(this)">
                                                <div class="fileupload_img">
                                                    <img id="image" src="{{asset('admin/images/user_photo.png')}}" alt="Profile Image" style="width: 90px; height: 90px"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Username:</label>
                                        <div class="col-md-6">
                                            <input type="text" name="username" id="username" value="dummyUser" class="form-control" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password:</label>
                                        <div class="col-md-6">
                                            <input type="password" name="password" id="password" value="dummyPassword" class="form-control" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email:</label>
                                        <div class="col-md-6">
                                            <input type="text" name="email" id="email" value="dummyemail@example.com" class="form-control" required autocomplete="off">
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
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
// Preview profile image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
</body>
</html>
