@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="row">
    <div class="col-md-12">
        <a href="{{ url('card') }}">
            <h4 class="pull-left" style="font-size: 20px; color: #e91e63">
                <i class="fa fa-arrow-left"></i> Back
            </h4>
        </a>
        <div class="card">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Add Card Image</div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="card-body mrg_bottom">
                <form action="{{ route('card.store') }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="section">
                        <div class="section-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category:</label>
                                <div class="col-md-6">
                                    <select name="category_name" id="cat_id" class="select2" required>
                                        <option value="">--Select Category--</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Select Card Image:</label>
                                <div class="col-md-6">
                                    <input type="file" name="card_image" id="fileupload" class="form-control" required>
                                    <small class="text-danger">
                                        (Recommended resolution: 64x64, must have a transparent background)
                                    </small>
                                </div>
                            </div>

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
