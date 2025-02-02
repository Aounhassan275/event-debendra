@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if (isset($_SERVER['HTTP_REFERER']))
                <a href="{{ $_SERVER['HTTP_REFERER'] }}">
                    <h4 class="pull-left" style="font-size: 20px; color: #e91e63">
                        <i class="fa fa-arrow-left"></i> Back
                    </h4>
                </a>
            @endif

            <div class="card">
                <div class="page_title_block">
                    <div class="col-md-6 col-xs-12">
                        <div class="page_title">Edit Vendors</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <form action="{{ route('vendors.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $edit->id }}">
                        <div class="form-group col-md-6">
                            <label> Vendor Type:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter vendor type" value="{{ $edit->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label> Vendor Type Image:</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('admin/vendors/'.$edit->image) }}" style="height: 80px; width: 80px;">
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
