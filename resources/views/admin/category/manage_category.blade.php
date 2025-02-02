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

            <div class="card mrg_bottom">
                <div class="page_title_block">
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">Category Management</div>
                    </div>
                    <div class="col-md-7 col-xs-12">
                        <div class="search_list">
                            <div class="search_block">
                                <form method="get" action="">
                                    <input class="form-control input-sm" placeholder="Search here..."
                                        aria-controls="DataTables_Table_0" type="search" name="keyword"
                                        value="{{ request()->get('keyword') }}" required="required">
                                    <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="add_btn_primary">
                                <a href="{{ route('add_category') }}">Add Category</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 mrg-top">
                    @foreach ($categories->chunk(4) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $data)
                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="block_wallpaper">
                                    <div class="wall_image_title">
                                        <h2>
                                            <a> {{ $data->name }} <span>(10)</span></a>
                                        </h2>
                                        <ul>
                                            <li>
                                                <a data-toggle="tooltip" title="Edit"
                                                    style="display: inline-block; background-color: {{ $data->background_color }};">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('category.edit', $data->id) }}" data-toggle="tooltip"
                                                    title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('category.delete', $data->id) }}" class="btn_delete_a"
                                                    data-id="{{ $data }}" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-id="{{ $data }}"
                                                    data-action="active" title="Enable">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('Category/icon_image/' . $data->icon_path) }}" alt="Category Image {{ $data }}" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                    <div class="pagination_item_block">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
