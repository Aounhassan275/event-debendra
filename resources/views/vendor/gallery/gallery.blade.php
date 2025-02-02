@extends('vendor.layouts.app')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-14">
            <ul class="d-flex align-items-center gap-2">
                <a href="{{ route('vendor.gallery') }}"> <i class="fa-solid fa-image"></i>
                    <b>Gallery</b></a>
            </ul>
        </div>
    </div>

    @include('vendor.layouts.message')

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="gallery-btn mb-5">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#guidelinesModal">Photo
                            upload guidelines</button>
                        {{-- <button class="btn btn-success">Upload photo/video</button> --}}
                        <a href="{{ route('gallery.add') }}" class="btn btn-success">Upload photo/video</a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="guidelinesModal" tabindex="-1" aria-labelledby="guidelinesModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="guidelinesModalLabel">Photo Upload Guidelines</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="font-size: 0.9rem;">
                                    <ul style="list-style: none; padding-left: 0;">
                                        <li><span class="icon">&#9733;</span> Ensure the photo is in JPG or PNG format.
                                        </li>
                                        <li><span class="icon">&#9733;</span> The photo size should not exceed 2MB.</li>
                                        <li><span class="icon">&#9733;</span> Use a clear and recent photo.</li>
                                        <li><span class="icon">&#9733;</span> The photo background should be plain and
                                            professional.</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('gallery.delete') }}" method="POST">
                        @csrf
                        <div class="gallery-delete mb-3">
                            <button type="submit" class="btn btn-danger">Delete Selected</button>
                        </div>
                        <div class="container gallery-container">
                            <div class="row">
                                @foreach ($all_data as $gallery)
                                    <div class="col-md-3 gallery-div">
                                        <div class="gallery-card position-relative">
                                            @php
                                                $extension = strtolower(pathinfo($gallery->file, PATHINFO_EXTENSION));
                                            @endphp
                                            @if (strpos($extension, 'mp4') === false && strpos($extension, 'webm') === false && strpos($extension, 'ogg') === false)
                                                <img src="{{ asset('vendor/galleries/' . $gallery->file) }}"
                                                    class="img-fluid">
                                            @else
                                                <video controls class="img-fluid gallery-video">
                                                    <source src="{{ asset('vendor/galleries/' . $gallery->file) }}"
                                                        type="video/{{ $extension }}">Your browser does not support the
                                                    video
                                                    tag.
                                                </video>
                                            @endif
                                            <div class="position-absolute top-0 end-0 p-2">
                                                <input type="checkbox" name="ids[{{ $gallery->id }}]"
                                                    value="{{ $gallery->id }}" class="form-check-input">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
