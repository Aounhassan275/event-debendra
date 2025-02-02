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
                        <div class="page_title">Manage Menus</div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="search_list text-right">
                            <div class="add_btn_primary">
                                <a href="{{ route('menu.add') }}" class="btn btn-primary">Add Menus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered MyTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Menu</th>
                                <th>Url</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($menus as $data)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $data->menu }}</td>
                                    <td>{{ $data->url }}</td>
                                    <td>
                                        <a href="{{ route('menu.edit',$data->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('menu.delete',$data->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
