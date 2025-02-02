@extends('vendor.layouts.app')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-14">
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('vendor.dashboard') }}">
                        <i class="fa-solid fa-user"></i>
                        <b>Profile</b>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (isset($profile->photo))
                        <div class="mb-3" style="text-align: center;">
                            <img src="{{ asset('vendor/images/profile/' . $profile->photo) }}" alt="Profile Photo"
                            style="width: 150px; height:150px; margin-top: 10px; border-radius:50%;">
                        </div>
                    @endif
                    <form class="row gy-3 needs-validation" novalidate action="{{ route('vendor.profile') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="{{ $profile->id ?? '' }}">
                            <label class="form-label">Your Brand Name</label>
                            <input type="text" name="brand_name" class="form-control"
                                value="{{ isset($profile->brand_name) ? $profile->brand_name : old('brand_name') }}"
                                required>
                            @error('brand_name')
                                <span class="text-danger">{{ 'Brand Name field is required' }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Upload Owner/Contact Person profile photo</label>
                            <input type="file" name="photo" class="form-control">
                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Vendor type</label>
                            <input type="text" value="{{ Auth::user()->get_vendor->name }}" class="form-control"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control"
                                value="{{ old('location', $profile->location ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Login email id</label>
                            <input type="text" value="{{ Auth::user()->email }}" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Website link</label>
                            <input type="text" name="website_link" class="form-control"
                                value="{{ old('website_link', $profile->website_link ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Additional email id</label>
                            <input type="text" name="alt_email" class="form-control"
                                value="{{ old('alt_email', $profile->alt_email ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Instagram link</label>
                            <input type="text" name="instagram" class="form-control"
                                value="{{ old('instagram', $profile->instagram ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact person name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $profile->name ?? '') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Facebook link</label>
                            <input type="text" name="facebook" class="form-control"
                                value="{{ old('facebook', $profile->facebook ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact number (Must be in WhatsApp)</label>
                            <input type="text" name="number" class="form-control"
                                value="{{ old('number', $profile->number ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">YouTube link</label>
                            <input type="text" name="youtube" class="form-control"
                                value="{{ old('youtube', $profile->youtube ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
