@extends('layouts.admin')

@section('title', 'Edit User Profile')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylish-tooltip.css') }}">
<style>
#applied_user .dataTables_wrapper .top {
    position: relative;
    width: 100%;
}
</style>

<div class="row">
    <div class="col-lg-12">
        <a href="{{url('manage-user')}}">
            <h4 class="pull-left" style="font-size: 20px;color: #e91e63">
                <i class="fa fa-arrow-left"></i> Back
            </h4>
        </a>

        <div class="page_title_block user_dashboard_item" style="background-color: #333;border-radius:6px 1px 4px 0 rgba(0, 0, 0, 0.14);border-bottom:0">
            <div class="user_dashboard_item">
                <div class="col-md-12 col-xs-12"> <br>
                    <span class="badge badge-success badge-icon">
                        <div class="user_profile_img">
                            <img src="{{ asset('admin/images/google-logo.png') }}" style="width: 16px;height: 16px;position: absolute;top: 24px;z-index: 1;left: 62px;">
                            <img src="{{ asset('admin/images/uploads/'. $user->user_image ) }}" alt="" style="width: 40px; height: 40px;"/>
                        </div>
                        <span style="font-size: 14px;">{{ $user->name }}</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                        <span style="font-size: 14px;text-transform: lowercase;">{{ $user->email }}</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <strong style="font-size: 14px;">Registered At:</strong>
                        <span style="font-size: 14px;">{{ $user->created_at->format('d-m-Y') }}</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <strong style="font-size: 14px;">Last Activity On:</strong>
                        <span style="font-size: 14px;text-transform: lowercase;">{{ $user->updated_at->diffForHumans() }}</span>
                    </span>
                    <br><br/>
                </div>
            </div>
        </div>

        <div class="card card-tab">
            <div class="card-body no-padding tab-content">
                <div role="tabpanel" class="tab-pane active" id="edit_profile">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('normal.users.update', $user->id) }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                                <div class="section">
                                    <div class="section-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Name :-</label>
                                            <div class="col-md-6">
                                                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email :-</label>
                                            <div class="col-md-6">
                                                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password :-</label>
                                            <div class="col-md-6">
                                                <input type="password" name="password" id="password" class="form-control">
                                                <small class="form-text text-muted text-danger">Leave blank to keep current password</small>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Phone :-</label>
                                            <div class="col-md-6">
                                                <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">City :-</label>
                                            <div class="col-md-6">
                                                <input type="text" name="city" id="city" value="{{ $user->city }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Address :-</label>
                                            <div class="col-md-6">
                                                <input type="text" name="address" id="address" value="{{ $user->address }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">User Image :-</label>
                                            <div class="col-md-6">
                                                <div class="fileupload_block">
                                                    <input type="file" name="user_image" id="fileupload" onchange="readURL(this)">
                                                    <div class="fileupload_img">
                                                        <img id="user_image" src="{{ asset('admin/images/uploads/'.$user->user_image) }}" style="width: 90px;height: 90px" alt="User Image" />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#user_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
