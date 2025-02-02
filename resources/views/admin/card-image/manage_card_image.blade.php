@extends('layouts.admin')
@section('content')
<div class="row">
    @if (Session::has('success'))
    <div style="max-width: 100%" id="message"
        class="alert alert-success {{ Session::has('success_important') ? 'alert-important' : '' }}">
        {{ session('success') }}
    </div>
    @endif
    @if (Session::has('error'))
    <div style="max-width: 100%" id="message"
        class="alert alert-danger {{ Session::has('success_important') ? 'alert-important' : '' }}">
        {{ session('error') }}
    </div>
    @endif
    <div class="col-xs-12">
        <a href="{{ url()->previous() }}">
            <h4 class="pull-left" style="font-size: 20px; color: #e91e63">
                <i class="fa fa-arrow-left"></i> Back
            </h4>
        </a>

        <div class="card mrg_bottom">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Manage Card Images</div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">
                        <div class="add_btn_primary">
                            <a href="{{ route('card-images.create') }}">Add Card Image</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 mrg-top">

                <div class="row">
                    @forelse ($cardImages as $cardImage)
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="block_wallpaper add_wall_category">
                            <div class="wall_image_title">
                                <h2><a href="javascript:void(0)">{{ $cardImage->category_name }}</a></h2>
                                <ul>
                                    <li>
                                        <a href="{{ route('card-images.edit', $cardImage->id) }}" data-toggle="tooltip"
                                            data-tooltip="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('card.delete',$cardImage->id) }}" data-toggle="tooltip"
                                        data-tooltip="Delete"><i class="fa fa-trash" ></i></a>
                                    </li>
                                </ul>
                            </div>
                            <span>
                                <img src="{{ asset('admin/images/uploads/card/' . $cardImage->image_path) }}" alt="{{ $cardImage->category_name }}" />
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <p>No card images available.</p>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="col-md-12 col-xs-12">
                <div class="pagination_item_block">
                    <nav>
                        {{ $cardImages->links() }} <!-- Assuming you are using Laravel's pagination -->
                    </nav>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection
