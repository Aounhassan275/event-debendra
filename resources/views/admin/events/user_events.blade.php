@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <a href="#" class="back-link">
            <h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4>
        </a>

        <div class="card mrg_bottom">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Manage User Event</div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">
                        <div class="search_block">
                            <form method="post" action="#">
                                <input class="form-control input-sm" placeholder="Search..." type="search" name="search_value" required>
                                <button type="submit" name="event_search" class="btn-search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <form id="filterForm" method="GET">
                    <div class="col-md-3">
                        <select name="filter" class="form-control select2 filter" style="padding: 5px 10px;height: 40px;">
                            <option value="">All</option>
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="cat_id" class="form-control select2 filter" style="padding: 5px 10px;height: 40px;">
                            <option value="">All Category</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                        </select>
                    </div>
                </form>

                <div class="col-md-3 col-xs-12" style="float: right;width: 18%">
                    {{-- <div class="checkbox" style="width: 100px;margin-top: 8px;margin-left: 10px;float: left;right: 138px;position: absolute;">
                        <input type="checkbox" id="checkall_input">
                        <label for="checkall_input">
                            Select All
                        </label>
                    </div> --}}
                    <div class="dropdown" style="float:right">
                        {{-- <button class="btn btn-primary dropdown-toggle btn_delete"
                                  type="button" data-toggle="dropdown">Action
                            <span class="caret"></span>
                        </button> --}}
                        <ul class="dropdown-menu" style="right:0;left:auto;">
                            <li><a href="#" class="actions" data-action="enable">Enable</a></li>
                            <li><a href="#" class="actions" data-action="disable">Disable</a></li>
                            <li><a href="#" class="actions" data-action="delete">Delete !</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div role="tabpanel" class="card-body mrg_bottom" style="padding: 0px">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a href="{{url('manage-event')}}" aria-controls="home" aria-expanded="true">Admin Events</a></li>
                    <li role="presentation" class="active"><a href="#" aria-controls="profile" aria-expanded="false">Users Events</a></li>
                </ul>
            </div>

            <div class="col-md-12 mrg-top">
                <div class="row">
                    <!-- Example of a single event item -->
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="block_wallpaper">
                            <div class="wall_category_block">
                                <h2>Category Name</h2>
                                <a href="javascript:void(0)" class="toggle_btn_a" data-id="1" data-action="deactive" data-column="is_slider" data-toggle="tooltip" data-tooltip="Slider">
                                    <div style="color:green;"><i class="fa fa-sliders"></i></div>
                                </a>
                                {{-- <div class="checkbox" style="float: right;">
                                    <input type="checkbox" name="post_ids[]" id="checkbox1" value="1" class="post_ids">
                                    <label for="checkbox1"></label>
                                </div> --}}
                            </div>
                            <div class="wall_image_title">
                                <p style="font-size: 16px;">Event Title</p>
                                <span>
                                    <strong style="font-weight: 500;">Created By:</strong><a href="#" style="color:#fff;font-weight: 500;">User Name</a>
                                </span>
                                <p><span style="color:red;"><strong style="font-weight: 500">Registration Status:</strong> [Closed]</span></p>
                                <ul>
                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-tooltip="100 Views"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="{{url('edit-event')}}" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>



                                    {{-- Delete button --}}
                                    <li><a href="#" class="btn_delete_a" data-id="1"  data-toggle="tooltip" data-tooltip="Delete"><i class="fa fa-trash"></i></a></li>
                                    <li><div class="row toggle_btn"><a href="javascript:void(0)" data-id="1" data-action="deactive" data-column="status" data-toggle="tooltip" data-tooltip="ENABLE"><img src="assets/images/btn_enabled.png" alt="" /></a></div></li>
                                </ul>
                            </div>
                            <span><img src="admin/images/category_image_2.jpg" alt="Event Banner" /></span>
                        </div>
                    </div>
                    <!-- End of a single event item -->
                </div>
            </div>

            <div class="col-md-12 col-xs-12">
                <div class="pagination_item_block">
                    <nav>
                        <!-- Pagination goes here -->
                    </nav>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
      $.urlParam = function(name){
      var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
      if (results==null) {
      return '';
      }
      return decodeURI(results[1]) || 0;
  }
  //for user event enable and disable
  $(".toggle_btn a, .toggle_btn_a").on("click",function(e){
    e.preventDefault();
    $(".loader").show();
    var _for=$(this).data("action");
    var _id=$(this).data("id");
    var _column=$(this).data("column");
    var _table='tbl_events';
    $.ajax({
      type:'post',
      url:'processData.php',
      dataType:'json',
      data:{id:_id,for_action:_for,column:_column,table:_table,'action':'toggle_status','tbl_id':'id'},
      success:function(res){
          console.log(res);
          if(res.status=='1'){
            location.reload();
          }
        }
    });
  });
  //for user event delete
 $(".btn_delete_a").click(function(e){
      e.preventDefault();
      var _ids=$(this).data("id");
        confirmDlg = duDialog('Are you sure?', 'All data will be removed which belong to this!', {
        init: true,
        dark: false,
        buttons: duDialog.OK_CANCEL,
        okText: 'Proceed',
        callbacks: {
          okClick: function(e) {
            $(".dlg-actions").find("button").attr("disabled",true);
            $(".ok-action").html('<i class="fa fa-spinner fa-pulse"></i> Please wait..');
            $.ajax({
              type:'post',
              url:'processData.php',
              dataType:'json',
              data:{id:_ids,'action':'multi_delete','tbl_nm':'tbl_events'},
              success:function(res){
                location.reload();
              }
            });
          }
        }
      });
      confirmDlg.show();
    });
// for multiple actions on user event
$(".actions").click(function(e){
    e.preventDefault();
    var _ids = $.map($('.post_ids:checked'), function(c){return c.value; });
    var _action=$(this).data("action");
    if(_ids!='')
    {
      confirmDlg = duDialog('Action: '+$(this).text(), 'Do you really want to perform?', {
        init: true,
        dark: false,
        buttons: duDialog.OK_CANCEL,
        okText: 'Proceed',
        callbacks: {
          okClick: function(e) {
            $(".dlg-actions").find("button").attr("disabled",true);
            $(".ok-action").html('<i class="fa fa-spinner fa-pulse"></i> Please wait..');
            var _table='tbl_video';
            $.ajax({
              type:'post',
              url:'processData.php',
              dataType:'json',
              data:{id:_ids,for_action:_action,table:_table,'action':'multi_action'},
              success:function(res){
                $('.notifyjs-corner').empty();
                if(res.status=='1'){
                  location.reload();
                }
              }
            });
          }
        }
      });
      confirmDlg.show();
    }
    else{
      infoDlg = duDialog('Opps!', 'No data selected', { init: true });
      infoDlg.show();
    }
});
 var totalItems=0;
  $("#checkall_input").click(function () {
    totalItems=0;
    $('input:checkbox').not(this).prop('checked', this.checked);
    $.each($("input[name='post_ids[]']:checked"), function(){
      totalItems=totalItems+1;
    });
    if($('input:checkbox').prop("checked") == true){
      $('.notifyjs-corner').empty();
      $.notify(
        'Total '+totalItems+' item checked',
        { position:"top center",className: 'success'}
      );
    }
    else if($('input:checkbox'). prop("checked") == false){
      totalItems=0;
      $('.notifyjs-corner').empty();
    }
  });
  var noteOption = {
      clickToHide : false,
      autoHide : false,
  }
  $.notify.defaults(noteOption);
  $(".post_ids").click(function(e){
      if($(this).prop("checked") == true){
        totalItems=totalItems+1;
      }
      else if($(this). prop("checked") == false){
        totalItems = totalItems-1;
      }
      if(totalItems==0){
        $('.notifyjs-corner').empty();
        exit();
      }
      $('.notifyjs-corner').empty();
      $.notify(
        'Total '+totalItems+' item checked',
        { position:"top center",className: 'success'}
      );
  });
 $(".filter").on("change",function(e){
    $("#filterForm *").filter(":input").each(function(){
      if ($(this).val() == '')
        $(this).prop("disabled", true);
    });
    $("#filterForm").submit();
  });
@endsection
