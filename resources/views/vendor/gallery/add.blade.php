@extends('vendor.layouts.app')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-14">
            <ul class="d-flex align-items-center gap-2">
                <a href="{{ route('vendor.pricing') }}"> <i class="fa-solid fa-briefcase"></i>
                    <b>Add Images/Videos</b></a>
            </ul>
        </div>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="row gy-3 needs-validation" novalidate action="{{ route('gallery.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add Images/Videos</h5>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Images/Videos</label>
                            <input type="file" name="file[]" class="form-control" accept="image/*,video/*" multiple>
                            @error('title')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('vendor/galleries/') }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
