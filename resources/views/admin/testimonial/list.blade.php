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
                @include('layouts.message')
                <div class="page_title_block">
                    <div class="col-md-6 col-xs-12">
                        <div class="page_title">Manage Testimonial</div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="search_list text-right">
                            <div class="add_btn_primary">
                                <a href="{{ route('testimonial.add') }}" class="btn btn-primary">Add New Testimonial</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered MyTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Designation</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($list as $testimonial)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td><img src="{{ asset('admin/web/testimonial/' . $testimonial->image) }}" alt=""
                                            style="height: 100px; width: 100px;"></td>
                                    <td>{{ $testimonial->designation }}</td>
                                    <td>{{ Str::limit($testimonial->description, 50, '...') }}</td>
                                    <td>
                                        <a href="{{ route('testimonial.edit',$testimonial->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('testimonial.delete',$testimonial->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
