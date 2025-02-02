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
                        <div class="page_title">Manage Testimonial</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label > Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Image:</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Designation:</label>
                            <input type="text" name="designation" class="form-control" placeholder="Enter Designation">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Description:</label>
                            <textarea name="description"cols="20" class="form-control" rows="4" placeholder="Enter Description"></textarea>
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
