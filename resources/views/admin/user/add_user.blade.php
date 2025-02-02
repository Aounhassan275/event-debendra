@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ url('manage-user') }}">
            <h4 class="pull-left" style="font-size: 20px;color: #e91e63">
                <i class="fa fa-arrow-left"></i> Back
            </h4>
        </a>

        <div class="card">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Add User</div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="card-body mrg_bottom">
                <form action="{{ route('normal_users.store') }}" name="addedituser" method="post" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf

                    <div class="section">
                        <div class="section-body">
                            <!-- Name Field -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email:</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password:</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>

                            <!-- Phone Field -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone:</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>

                            <!-- City Field -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">City:</label>
                                <div class="col-md-6">
                                    <input type="text" name="city" class="form-control">
                                </div>
                            </div>

                            <!-- Address Field -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Address:</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>

                            <!-- User Image Upload -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">User Image :-</label>
                                <div class="col-md-6">
                                    <div class="fileupload_block">
                                        <input type="file" name="user_image" id="fileupload" onchange="readURL(this)">
                                        <div class="fileupload_img">
                                            <img type="image" id="user_image" src="{{asset('admin/images/landscape.jpg')}}"
                                                style="width: 90px; height: 90px" alt="image" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
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
@endsection
