@extends('layouts.admin')

@section('content')
<style type="text/css">
  .select2 {
    width: 100% !important;
  }
  .select2 .select2-selection--single .select2-selection__rendered {
    padding: 8px 10px;
  }
</style>

<div class="row">
    <div class="col-xs-12">
        <a href="{{ url('dashboard')}}">
            <h4 class="pull-left" style="font-size: 20px; color: #e91e63">
                <i class="fa fa-arrow-left"></i> Back
            </h4>
        </a>
        <div class="card mrg_bottom">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Manage Events Booking</div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">
                        <div class="search_block">
                            <form method="post" action="">
                                @csrf
                                <input class="form-control input-sm" placeholder="Search..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                                <button type="submit" name="event_search" class="btn-search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    <select name="event_id" class="form-control event_id select2" style="padding: 5px 10px; height: 40px;">
                        <option value="">All Events</option>
                        <option value="1" selected>Event Title 1</option>
                        <option value="2">Event Title 2</option>
                        <option value="3">Event Title 3</option>
                        <option value="4">Event Title 4</option>
                    </select>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 mrg-top">
                <button class="btn btn-danger btn_cust btn_delete_all" style="margin-bottom:20px;"><i class="fa fa-trash"></i> Delete All</button>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:40px">Sl no.
                                {{-- <div class="checkbox" style="margin: 0px">
                                    <input type="checkbox" name="checkall" id="checkall" value="">
                                    <label for="checkall"></label>
                                </div> --}}
                            </th>
                            <th>Event</th>
                            <th>Nos. booking</th>
                            <th>Last Update</th>
                            <th class="cat_action_list">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    {{-- <div class="checkbox" id="checkbox_contact">
                                        <input type="checkbox" name="post_ids[]" id="checkbox1" value="1" class="post_ids">
                                        <label for="checkbox1"></label>
                                    </div> --}}
                                </div>
                            </td>
                            <td>Event Title 1</td>
                            <td>10</td>
                            <td>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ url('booking') }}" class="btn btn-success btn_edit" data-toggle="tooltip" data-tooltip="View">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ url('download_register?event_id=1') }}" class="btn btn-primary btn_cust" data-toggle="tooltip" data-tooltip="Excelsheet">
                                    <i class="fa fa-file-excel-o"></i>
                                </a>
                                <a href="javascript:void(0)" data-id="1" class="btn btn-danger btn_delete" data-toggle="tooltip" data-tooltip="Delete !">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    {{-- <div class="checkbox" id="checkbox_contact">
                                        <input type="checkbox" name="post_ids[]" id="checkbox2" value="2" class="post_ids">
                                        <label for="checkbox2"></label>
                                    </div> --}}
                                </div>
                            </td>
                            <td>Event Title 2</td>
                            <td>15</td>
                            <td>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ url('booking') }}" class="btn btn-success btn_edit" data-toggle="tooltip" data-tooltip="View">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ url('download_register?event_id=2') }}" class="btn btn-primary btn_cust" data-toggle="tooltip" data-tooltip="Excelsheet">
                                    <i class="fa fa-file-excel-o"></i>
                                </a>
                                <a href="javascript:void(0)" data-id="2" class="btn btn-danger btn_delete" data-toggle="tooltip" data-tooltip="Delete !">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-center">
                                <p style="font-size: 18px" class="text-muted"><strong>Sorry!!</strong> no data found.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 col-xs-12">
                <div class="pagination_item_block">
                    <nav>
                        <!-- Include pagination logic here -->
                    </nav>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    $("select[name='event_id']").on("change", function(e) {
        var params = new window.URLSearchParams(window.location.search);
        if (params.get('page') != null) {
            if ($(this).val() != '') {
                window.location.href = "{{url('booking')}}?event_id=" + $(this).val() + '&page=' + params.get('page');
            } else {
                window.location.href = "{{ url('event_booking') }}?page=" + params.get('page');
            }
        } else {
            if ($(this).val() != '') {
                window.location.href = "{{ url('event_booking') }}?event_id=" + $(this).val();
            } else {
                window.location.href = "{{ url('event_booking') }}";
            }
        }
    });

    // For event booking delete
    $(".btn_delete").click(function(e) {
        e.preventDefault();
        var _id = $(this).data("id");
        var _table = 'tbl_event_booking';

        confirmDlg = duDialog('Are you sure?', 'All data will be removed which belong to this!', {
            init: true,
            dark: false,
            buttons: duDialog.OK_CANCEL,
            okText: 'Proceed',
            callbacks: {
                okClick: function(e) {
                    $(".dlg-actions").find("button").attr("disabled", true);
                    $(".ok-action").html('<i class="fa fa-spinner fa-pulse"></i> Please wait..');
                    $.ajax({
                        type: 'post',
                        url: '{{ url('processData') }}',
                        dataType: 'json',
                        data: { 'id': _id, 'tbl_nm': _table, 'tbl_id': 'event_id', 'action': 'removeData' },
                        success: function(res) {
                            location.reload();
                        }
                    });
                }
            }
        });
        confirmDlg.show();
    });

    // For multiple event booking delete
    $(".btn_delete_all").click(function(e) {
        e.preventDefault();
        var _ids = $.map($('.post_ids:checked'), function(c) { return c.value; });

        if (_ids != '') {
            confirmDlg = duDialog('Action: ' + $(this).text(), 'Do you really want to perform?', {
                init: true,
                dark: false,
                buttons: duDialog.OK_CANCEL,
                okText: 'Proceed',
                callbacks: {
                    okClick: function(e) {
                        $(".dlg-actions").find("button").attr("disabled", true);
                        $(".ok-action").html('<i class="fa fa-spinner fa-pulse"></i> Please wait..');
                        $.ajax({
                            type: 'post',
                            url: '{{ url('processData') }}',
                            dataType: 'json',
                            data: { id: _ids, 'action': 'multi_delete', 'tbl_nm': 'tbl_event_booking' },
                            success: function(res) {
                                $('.notifyjs-corner').empty();
                                if (res.status == '1') {
                                    location.reload();
                                }
                            }
                        });
                    }
                }
            });
            confirmDlg.show();
        } else {
            alert('Please select at least one checkbox.');
        }
    });
</script>
@endpush
