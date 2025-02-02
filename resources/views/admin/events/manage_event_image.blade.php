@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <a href="{{ url()->previous() }}">
            <h4 class="pull-left" style="font-size: 20px; color: #e91e63">
                <i class="fa fa-arrow-left"></i> Back
            </h4>
        </a>

        <div class="card mrg_bottom">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Manage Event Images</div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <!-- Optional add button -->
                    {{-- <div class="add_btn_primary">
                        <a href="{{ route('add_card_image') }}">Add Card Image</a>
                    </div> --}}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 mrg-top">
                <div class="row">
                    @for ($i = 0; $i < 12; $i++)
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="block_wallpaper add_wall_category">
                            <div class="wall_image_title">
                                <h2>
                                    <a href="javascript:void(0)">User Name (Event Title)</a>
                                </h2>
                                <ul>
                                    <li>
                                        <a href="#" class="btn_delete_a" data-id="{{ $i }}" data-toggle="tooltip" data-tooltip="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <span>
                                <img src="{{ asset('admin/images/category_image_5.jpg') }}" alt="Event Image" />
                            </span>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <div class="col-md-12 col-xs-12">
                <div class="pagination_item_block">
                    <nav>
                        {{-- Include pagination --}}

                        <!-- assuming you have a paginator -->
                    </nav>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@section('scripts')
<script type="text/javascript">
    // For category delete
    $(".btn_delete_a").click(function (e) {
        e.preventDefault();

        var _ids = $(this).data("id");

        confirmDlg = duDialog('Are you sure?', 'All data will be removed which belong to this!', {
            init: true,
            dark: false,
            buttons: duDialog.OK_CANCEL,
            okText: 'Proceed',
            callbacks: {
                okClick: function (e) {
                    $(".dlg-actions").find("button").attr("disabled", true);
                    $(".ok-action").html('<i class="fa fa-spinner fa-pulse"></i> Please wait..');
                    $.ajax({
                        type: 'post',
                        url: '{{ url("processData") }}', // adjust the URL as necessary
                        dataType: 'json',
                        data: { id: _ids, 'action': 'multi_delete', 'tbl_nm': 'event_image' },
                        success: function (res) {
                            location.reload();
                        }
                    });
                }
            }
        });
        confirmDlg.show();
    });
</script>

<script>
    // For check all selected
    $("#checkall").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endsection
@endsection
