@extends('layouts.admin')

@section('title', 'Manage Slider')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ url('dashboard') }}">
                <h4 class="pull-left" style="font-size: 20px; color: #e91e63">
                    <i class="fa fa-arrow-left"></i> Back
                </h4>
            </a>
            <div class="card mrg_bottom">
                <div class="page_title_block">
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">Manage Slider</div>
                    </div>
                    <div class="col-md-7 col-xs-12">
                        <div class="search_list">
                            <div class="search_block">
                                <form method="post" action="{{ url()->current() }}">
                                    @csrf
                                    <input class="form-control input-sm" placeholder="Search..." type="search"
                                        name="search_value" required>
                                    <button type="submit" name="data_search" class="btn-search"><i
                                            class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="add_btn_primary">
                                <a href="{{ route('slider.add') }}">Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 mrg-top">
                    <div class="row">
                        @foreach ($sliders as $data)
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="block_wallpaper">
                                    <div class="wall_category_block" style="text-align: right;">
                                        @if ($data->event_id != null)
                                            <div class="row" style="padding: 10px;">
                                                <span class="label label-success">Event</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="wall_image_title">
                                        <h2>
                                            <a href="javascript:void(0)">
                                                @if ($data->getEvent)
                                                    {{ $data->getEvent->title }}
                                                @else
                                                    {{ $data->title }}
                                                @endif
                                            </a>
                                        </h2>
                                        <ul>
                                            <li>
                                                <a href="{{ route('slider.delete', $data->id) }}" class="btn_delete_a"
                                                    data-id="1" data-toggle="tooltip" data-tooltip="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('slider.edit', $data->id) }}" data-toggle="tooltip"
                                                    data-tooltip="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <span>
                                        @if ($data->getEvent && $data->getEvent->gallery_image)
                                            <img src="{{ asset('admin/images/uploads/event/' . $data->getEvent->gallery_image) }}"
                                                alt="Event Image" />
                                        @else
                                            <img src="{{ asset('slider/images/' . $data->image) }}" />
                                        @endif
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="pagination_item_block">
                        <nav>
                            {{-- {{ $sliders->links() }} <!-- Laravel pagination links --> --}}
                        </nav>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // For slider enable and disable
        $(".toggle_btn a").on("click", function(e) {
            e.preventDefault();
            var _for = $(this).data("action");
            var _id = $(this).data("id");
            var _column = $(this).data("column");
            var _table = 'tbl_slider';

            $.ajax({
                type: 'post',
                url: '{{ url('processData') }}',
                dataType: 'json',
                data: {
                    id: _id,
                    for_action: _for,
                    column: _column,
                    table: _table,
                    'action': 'toggle_status',
                    'tbl_id': 'id'
                },
                success: function(res) {
                    console.log(res);
                    if (res.status == '1') {
                        location.reload();
                    }
                }
            });
        });

        // For slider delete
        // $(".btn_delete_a").click(function(e) {
        //     e.preventDefault();

        //     var _id = $(this).data('id');
        //     var _tbl_nm = 'tbl_slider';

        //     confirmDlg = duDialog('Are you sure?', 'All data will be removed which belong to this!', {
        //         init: true,
        //         dark: false,
        //         buttons: duDialog.OK_CANCEL,
        //         okText: 'Proceed',
        //         callbacks: {
        //             okClick: function(e) {
        //                 $(".dlg-actions").find("button").attr("disabled", true);
        //                 $(".ok-action").html('<i class="fa fa-spinner fa-pulse"></i> Please wait..');
        //                 $.ajax({
        //                     type: 'post',
        //                     url: '{{ url('processData') }}',
        //                     dataType: 'json',
        //                     data: {
        //                         id: _id,
        //                         tbl_nm: _tbl_nm,
        //                         'action': 'removeSlider'
        //                     },
        //                     success: function(res) {
        //                         location.reload();
        //                     }
        //                 });
        //             }
        //         }
        //     });
        //     confirmDlg.show();
        // });
    </script>
@endsection
