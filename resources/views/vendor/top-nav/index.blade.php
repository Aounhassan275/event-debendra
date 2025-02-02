@extends('admin.dashboard')
@section('content')
@include('admin.layouts.message')
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Top Navigations</h5>
                </div>
                <div class="card-body">
                    <form class="row gy-3 needs-validation" novalidate action="{{ route('topnav.store') }}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" name="id"
                            value="{{ isset($top_nav->id) ? $top_nav->id : -1 }}" />
                        <div class="col-md-6">
                            <label class="form-label">Phone no.</label>
                            <input type="number" name="phone" class="form-control"
                                value="{{ isset($top_nav->phone) ? $top_nav->phone : '' }}" placeholder="Enter Phone no."
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ isset($top_nav->email) ? $top_nav->email : '' }}" placeholder="Enter Email"
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="facebook" class="form-control"
                                value="{{ isset($top_nav->facebook) ? $top_nav->facebook : '' }}"
                                placeholder="Enter Facebook link" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Twitter</label>
                            <input type="text" name="twitter" class="form-control"
                                value="{{ isset($top_nav->twitter) ? $top_nav->twitter : '' }}"
                                placeholder="Enter Twitter link" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Google</label>
                            <input type="text" name="google" class="form-control"
                                value="{{ isset($top_nav->google) ? $top_nav->google : '' }}"
                                placeholder="Enter Google+ link" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Instagram</label>
                            <input type="text" name="instagram" class="form-control"
                                value="{{ isset($top_nav->instagram) ? $top_nav->instagram : '' }}"
                                placeholder="Enter Instagram link" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary-600" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
