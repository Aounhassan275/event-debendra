@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if (isset($_SERVER['HTTP_REFERER']))
                <a href="{{ route('admin.dashboard') }}">
                    <h4 class="pull-left" style="font-size: 20px; color: #e91e63">
                        <i class="fa fa-arrow-left"></i> Back
                    </h4>
                </a>
            @endif

            <div class="card mrg_bottom">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="page_title_block">
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">Subcategory Management</div>
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
                                <a href="{{ route('subcategory.add') }}">Add Subcategory</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 mrg-top">
                    @foreach ($subcategories->chunk(4) as $chunk)
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
                                                    <a href="{{ route('subcategory.edit', $data->id) }}"
                                                        data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('subcategory.delete', $data->id) }}"
                                                        class="btn_delete_a" data-id="{{ $data }}" title="Delete">
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
                                        <img src="{{ asset('subcategory/images/' . $data->image) }}"
                                            alt="Category Image {{ $data }}" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="pagination_item_block">
                        {{ $subcategories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
