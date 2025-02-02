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
    <div class="card mrg_bottom">
      <div class="page_title_block">
        <div class="col-md-7 col-xs-12">
          <div class="page_title">Manage Event Feeds</div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 mrg-top">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>User Name</th>
                <th>Event Title</th>
                <th>Event Feed</th>
                <th style="width: 100px;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John Doe</td>
                <td>Event Title 1</td>
                <td>This is a dummy event feed for event 1.</td>
                <td>
                  <a href="#" data-toggle="tooltip" data-tooltip="Delete" class="btn btn-danger btn_delete" data-id="1">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>Jane Smith</td>
                <td>Event Title 2</td>
                <td>This is a dummy event feed for event 2.</td>
                <td>
                  <a href="#" data-toggle="tooltip" data-tooltip="Delete" class="btn btn-danger btn_delete" data-id="2">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td colspan="4" class="text-center">
                  <p style="font-size: 18px" class="text-muted"><strong>Sorry!</strong> no data found.</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-12 col-xs-12">
          <div class="pagination_item_block">
            <nav>
              <!-- Static pagination links -->
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
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
// For event delete
$(".btn_delete").click(function(e) {
  e.preventDefault();

  var _id = $(this).data("id");

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
          data: {id: _id, 'action': 'multi_delete', 'tbl_nm': 'event_feed'},
          success: function(res) {
            location.reload();
          }
        });
      }
    }
  });
  confirmDlg.show();
});
</script>

@endsection
