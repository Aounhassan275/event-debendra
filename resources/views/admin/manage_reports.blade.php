@extends('layouts.admin')

@section('content')
<style>
    .select2 {
        width: 100% !important;
    }
    .select2 .select2-selection--single .select2-selection__rendered {
        padding: 8px 10px;
    }
</style>

<div class="row">
    <div class="col-xs-12">
        <div class="card mrg_bottom">
            <div class="page_title_block">
                <div class="col-md-7 col-xs-12">
                    <div class="page_title">Manage Reports</div>
                </div>
                <div class="col-md-6">
                    <select name="event_id" class="form-control event_id select2" style="padding: 5px 10px;height: 40px;">
                        <option value="">All Events</option>
                        <option value="1">Event Title 1</option>
                        <option value="2" selected>Event Title 2</option>
                        <option value="3">Event Title 3</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 mrg-top">
                    <button class="btn btn-danger btn_cust btn_delete_all" style="margin-bottom:20px;">
                        <i class="fa fa-trash"></i> Delete All
                    </button>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:40px">
                                    <div class="checkbox" style="margin: 0px">
                                        <input type="checkbox" name="checkall" id="checkall">
                                        <label for="checkall"></label>
                                    </div>
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Event</th>
                                <th>Type</th>
                                <th style="width: 200px;">Report</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                            <tr>
                                <td>
                                    <div>
                                        <div class="checkbox" id="checkbox_contact">
                                            <input type="checkbox" name="post_ids[]" id="checkbox{{ $i }}" value="report_id_{{ $i }}" class="post_ids">
                                            <label for="checkbox{{ $i }}"></label>
                                        </div>
                                    </div>
                                </td>
                                <td>User Name {{ $i + 1 }}</td>
                                <td>user{{ $i + 1 }}@example.com</td>
                                <td>Event Title {{ $i + 1 }}</td>
                                <td>Type {{ $i + 1 }}</td>
                                <td style="width: 200px;">
                                    <p>This is a report description for report {{ $i + 1 }}.</p>
                                </td>
                                <td>
                                    <a href="#" data-toggle="tooltip" data-tooltip="Delete" class="btn btn-danger btn_delete" data-id="report_id_{{ $i }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endfor
                            @if (5 == 0) <!-- Simulating no data found -->
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p style="font-size: 18px" class="text-muted"><strong>Sorry!</strong> no data found.</p>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="pagination_item_block">
                        <nav>
                            <!-- Pagination Links Here -->
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    // Event selection change
    $("select[name='event_id']").on("change", function() {
        var selectedValue = $(this).val();
        var page = new URLSearchParams(window.location.search).get('page');
        if (page) {
            window.location.href = "manage_report.php?event_id=" + selectedValue + '&page=' + page;
        } else {
            window.location.href = selectedValue ? "manage_report.php?event_id=" + selectedValue : "manage_report.php";
        }
    });

    // Event delete
    $(".btn_delete").click(function(e) {
        e.preventDefault();
        var _id = $(this).data("id");
        // Confirmation dialog (implement your dialog logic)
        alert('Are you sure you want to delete report ' + _id + '?');
        // On confirmation, send AJAX request to delete the report
    });

    // Delete all reports
    $(".btn_delete_all").click(function(e) {
        e.preventDefault();
        var _ids = $.map($('.post_ids:checked'), function(c) {
            return c.value;
        });
        if (_ids.length) {
            // Confirmation dialog (implement your dialog logic)
            alert('Are you sure you want to delete these reports?');
            // On confirmation, send AJAX request to delete all selected reports
        } else {
            alert('No data selected');
        }
    });
</script>
@endpush
