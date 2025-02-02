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
                        <div class="page_title">Edit Menus</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <form action="{{ route('menu.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="hidden" name="id" value="{{ $edit->id }}">
                            <label > Menus:</label>
                            <input type="text" name="menu" class="form-control" placeholder="Enter menu" value="{{ $edit->menu }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label > Url:</label>
                            <input type="text" name="url" placeholder="Enter menu url" class="form-control" value="{{ $edit->url }}">
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
