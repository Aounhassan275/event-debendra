@extends('layouts.admin')
@section('content')
    <div class="row">
        @if (Session::has('success'))
            <div style="max-width: 100%" id="message"
                class="alert alert-success {{ Session::has('success_important') ? 'alert-important' : '' }} ">
                {{ session('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div style="max-width: 100%" id="message"
                class="alert alert-danger {{ Session::has('success_important') ? 'alert-important' : '' }} ">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-xs-12">
            @if (isset($_SERVER['HTTP_REFERER']))
                <a href="{{ $_SERVER['HTTP_REFERER'] }}">
                    <h4 class="pull-left" style="font-size: 20px; color: #e91e63;">
                        <i class="fa fa-arrow-left"></i> Back
                    </h4>
                </a>
            @endif

            <div class="card mrg_bottom">
                <div class="page_title_block">
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">Event Management</div>
                    </div>
                    <div class="col-md-7 col-xs-12">
                        <div class="search_list">
                            <div class="search_block">
                                <form method="post" action="{{ url()->current() }}">
                                    @csrf
                                    <input class="form-control input-sm" placeholder="Search..."
                                        aria-controls="DataTables_Table_0" type="search" name="search_value"
                                        value="{{ request()->input('search_value', '') }}" required>
                                    <button type="submit" name="event_search" class="btn-search"><i
                                            class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="add_btn_primary"><a href="{{ route('events.create') }}">Add Event</a></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <form id="filterForm" method="GET">
                        <div class="col-md-3">
                            <select name="filter" class="form-control select2 filter"
                                style="padding: 5px 10px; height: 40px;">
                                <option value="">All</option>
                                <option value="enable" {{ request('filter') == 'enable' ? 'selected' : '' }}>Enable</option>
                                <option value="disable" {{ request('filter') == 'disable' ? 'selected' : '' }}>Disable
                                </option>
                                <option value="open" {{ request('filter') == 'open' ? 'selected' : '' }}>Open</option>
                                <option value="closed" {{ request('filter') == 'closed' ? 'selected' : '' }}>Closed
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="cat_id" class="form-control select2 filter"
                                style="padding: 5px 10px; height: 40px;">
                                <option value="">All Category</option>
                                <option value="1">Technology</option>
                                <option value="2">Health</option>
                                <option value="3">Education</option>
                                <option value="4">Entertainment</option>
                                <option value="5">Sports</option>
                                <option value="6">Travel</option>
                                <option value="7">Food</option>
                                <option value="8">Fashion</option>
                            </select>
                        </div>
                    </form>
                    <div class="col-md-3 col-xs-12" style="float: right; width: 18%;">
                        {{-- <div class="checkbox"
                            style="width: 100px; margin-top: 8px; margin-left: 10px; float: left; right: 138px; position: absolute;">
                            <input type="checkbox" id="checkall_input">
                            <label for="checkall_input">
                                Select All
                            </label>
                        </div> --}}
                        <div class="dropdown" style="float:right">
                            {{-- <button class="btn btn-primary dropdown-toggle btn_delete" type="button"
                                data-toggle="dropdown">Action
                                <span class="caret"></span>
                            </button> --}}
                            <ul class="dropdown-menu" style="right:0; left:auto;">
                                <li><a href="#" class="actions" data-action="enable">Enable</a></li>
                                <li><a href="#" class="actions" data-action="disable">Disable</a></li>
                                <li><a href="#" class="actions" data-action="delete">Delete!</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div role="tabpanel" class="card-body mrg_bottom" style="padding: 0px">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#" aria-controls="home"
                                aria-expanded="true">Admin
                                Events</a></li>
                        <li role="presentation"><a href="{{ url('user-event') }}" aria-controls="profile"
                                aria-expanded="false">User Events</a></li>
                    </ul>
                </div>

                <div class="col-md-12 mrg-top">

                    <div class="row">
                        @forelse ($events as $event)
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="block_wallpaper">
                                    <div class="wall_category_block">
                                        <h2>{{ $event->getCategory->name }}</h2>

                                        @if ($event->is_slider)
                                            <a href="javascript:void(0)" class="toggle_btn_a"
                                                data-id="{{ $event->id }}" data-action="deactive"
                                                data-column="is_slider" data-toggle="tooltip"
                                                data-tooltip="Remove from Slider">
                                                <div style="color:green;"><i class="fa fa-sliders"></i></div>
                                            </a>
                                        @else
                                            <a href="{{ route('slider.add') }}" class="toggle_btn_a"
                                                data-id="{{ $event->id }}" data-action="active"
                                                data-column="is_slider" data-toggle="tooltip"
                                                data-tooltip="Add to Slider">
                                                <i class="fa fa-sliders"></i>
                                            </a>
                                        @endif

                                        {{-- <div class="checkbox" style="float: right;">
                                            <input type="checkbox" name="post_ids[]" id="checkbox{{ $event->id }}"
                                                class="post_ids">
                                            <label for="checkbox{{ $event->id }}"></label>
                                        </div> --}}
                                    </div>
                                    <div class="wall_image_title">
                                        <p style="font-size: 16px;">{{ $event->title }}</p>
                                        <span><strong style="font-weight: 500">Created By:
                                                {{ $event->created_by }}</strong></span>
                                        <p>
                                            <strong style="font-weight: 500">Registration Status:</strong>
                                            <span style="color: {{ $event->status ? 'green' : 'red' }}">
                                                {{ $event->status ? 'Open' : 'Closed' }}
                                            </span>

                                        </p>
                                        <ul>
                                            <li><a href="javascript:void(0)" data-toggle="tooltip"
                                                    data-tooltip="Views"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="{{ route('edit-event', $event->id) }}" data-toggle="tooltip"
                                                    data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>
                                            <li><a href="{{ route('delete-event', $event->id) }}" class="btn_delete_a"
                                                    data-id="" data-toggle="tooltip" data-tooltip="Delete"><i
                                                        class="fa fa-trash"></i></a></li>

                                        </ul>
                                    </div>

                                    <span><img
                                            src="{{ asset('admin/images/uploads/event/' . ($event->banner ?: 'default.jpg')) }}"
                                            alt="Event Banner" /></span>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <p class="text-center">No events found.</p>
                            </div>
                        @endforelse
                    </div>
                @endsection
