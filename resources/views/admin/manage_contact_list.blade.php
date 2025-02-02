@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (url()->previous())
        <a href="{{ url()->previous() }}">
            <h4 class="pull-left" style="font-size: 20px; color: #e91e63;">
                <i class="fa fa-arrow-left"></i> Back
            </h4>
        </a>
    @endif
        <div class="card">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Contact List</div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="card-body mrg_bottom" style="padding:0px 0px 30px 0px">

                <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 10px">
                    <li role="presentation" class="active">
                        <a href="#subject_list" aria-controls="comments" role="tab" data-toggle="tab">
                            <i class="fa fa-comments"></i> Subjects List
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#contact_list" aria-controls="contact_list" role="tab" data-toggle="tab">
                            <i class="fa fa-envelope"></i> Contact Forms
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="subject_list">
                        <div class="container-fluid">
                            <div class="rows">
                                <div class="col-md-12 mrg-top">
                                    <div class="add_btn_primary">
                                        <a href="{{url('contact-subject')}}" class="btn_cust">Add Subject</a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="100">Sl No.</th>
                                                <th>Subject Title</th>
                                                <th class="cat_action_list" style="width:60px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Subject Title 1</td>
                                                <td nowrap="">
                                                    <a href="{{url('contact-subject')}}" class="btn btn-primary btn_edit" data-toggle="tooltip" data-tooltip="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" data-id="1" data-table="tbl_contact_sub" class="btn btn-danger btn_delete" data-toggle="tooltip" data-tooltip="Delete !">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Subject Title 2</td>
                                                <td nowrap="">
                                                    <a href="#" class="btn btn-primary btn_edit" data-toggle="tooltip" data-tooltip="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" data-id="2" data-table="tbl_contact_sub" class="btn btn-danger btn_delete" data-toggle="tooltip" data-tooltip="Delete !">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <p style="font-size: 18px" class="text-muted"><strong>Sorry!</strong> no data found.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="contact_list">
                        <div class="container-fluid">
                            <div class="rows">
                                <div class="col-md-12 mrg-top manage_comment_btn">
                                    <form method="post" action="">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn_edit" style="margin-bottom:20px;" name="delete_rec" value="delete_post">
                                            <i class="fa fa-trash"></i> Delete All
                                        </button>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width:40px">
                                                        <div class="checkbox" style="margin: 0px">
                                                            <input type="checkbox" name="checkall" id="checkall" value="">
                                                            <label for="checkall"></label>
                                                        </div>
                                                    </th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Date</th>
                                                    <th class="cat_action_list" style="width:60px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox" id="checkbox_contact">
                                                            <input type="checkbox" name="post_ids[]" id="checkbox1" value="1" class="post_ids">
                                                            <label for="checkbox1"></label>
                                                        </div>
                                                    </td>
                                                    <td>Samim Ansari</td>
                                                    <td>samim@example.com</td>
                                                    <td>Subject Title 1</td>
                                                    <td>Lorem ipsum dolor sit amet...</td>
                                                    <td nowrap="">01-01-2024</td>
                                                    <td>
                                                        <a href="javascript:void(0)" data-id="1" data-table="tbl_contact_list" class="btn btn-danger btn_delete" data-toggle="tooltip" data-tooltip="Delete !">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox" id="checkbox_contact">
                                                            <input type="checkbox" name="post_ids[]" id="checkbox2" value="2" class="post_ids">
                                                            <label for="checkbox2"></label>
                                                        </div>
                                                    </td>
                                                    <td>Jane Smith</td>
                                                    <td>janesmith@example.com</td>
                                                    <td>Subject Title 2</td>
                                                    <td>Lorem ipsum dolor sit amet...</td>
                                                    <td nowrap="">02-01-2024</td>
                                                    <td>
                                                        <a href="javascript:void(0)" data-id="2" data-table="tbl_contact_list" class="btn btn-danger btn_delete" data-toggle="tooltip" data-tooltip="Delete !">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7" class="text-center">
                                                        <p style="font-size: 18px" class="text-muted"><strong>Sorry!</strong> no data found.</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="pagination_item_block">
                                        <nav>
                                            <!-- Pagination links can be added here -->
                                            <ul class="pagination">
                                                <li class="disabled"><a href="#">«</a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">»</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
        document.title = $(this).text() + " | Dummy App";
    });

    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }

    // For contact list delete
    $(".btn_delete").click(function(e) {
        e.preventDefault();

        var _id = $(this).data("id");
        var _table = $(this).data("table");

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
                        url: '{{ url("processData") }}',
                        dataType: 'json',
                        data: {'id': _id, 'tbl_nm': _table, 'tbl_id': 'id', 'action': 'removeData'},
                        success: function(res) {
                            location.reload();
                        }
                    });
                }
            }
        });
        confirmDlg.show();
    });

    // For multiple actions on contact
    $("button[name='delete_rec']").click(function(e) {
        e.preventDefault();

        var _ids = $.map($('.post_ids:checked'), function(c) {
            return c.value;
        });

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
                        var _table = 'tbl_comments';

                        $.ajax({
                            type: 'post',
                            url: '{{ url("processData") }}',
                            dataType: 'json',
                            data: {id: _ids, 'action': 'multi_delete', 'tbl_nm': 'tbl_contact_list'},
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
            infoDlg = duDialog('Oops!', 'No data selected', {init: true});
            infoDlg.show();
        }
    });
</script>

@endsection
