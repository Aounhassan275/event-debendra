@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <a href="#"><h4 class="pull-left" style="font-size: 20px; color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>
    <div class="card">
      <div class="page_title_block">
        <div class="col-md-5 col-xs-12">
          <div class="page_title">Send Notification</div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="card-body mrg_bottom" style="padding: 0px">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a href="#notification_settings" aria-controls="notification_settings" role="tab" data-toggle="tab">
              <i class="fa fa-wrench"></i> Notification Settings
            </a>
          </li>
          <li role="presentation">
            <a href="#send_notification" aria-controls="send_notification" role="tab" data-toggle="tab">
              <i class="fa fa-send"></i> Send Notification
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <!-- Send Notification Tab -->
          <div role="tabpanel" class="tab-pane" id="send_notification">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <form action="" method="post" class="form form-horizontal" enctype="multipart/form-data">
                    <div class="section">
                      <div class="section-body">
                        <div class="form-group">
                          <label class="col-md-3 control-label">Title:</label>
                          <div class="col-md-6">
                            <input type="text" name="notification_title" class="form-control" placeholder="Notification Title" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 control-label">Message:</label>
                          <div class="col-md-6">
                              <textarea name="notification_msg" class="form-control" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 control-label">
                            Image:<br />(Optional)
                            <p class="control-label-help" style="color: red">(Recommended resolution: 600x293)</p>
                          </label>
                          <div class="col-md-6">
                            <div class="fileupload_block">
                              <input type="file" name="big_picture" id="fileupload" onchange="readURL(this)">
                              <div class="fileupload_img">
                                <img id="big_picture" src="{{ asset('assets/images/landscape.jpg') }}" alt="image" style="width: 150px; height: 90px">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-9 mrg_bottom link_block">
                          <div class="form-group">
                            <label class="col-md-4 control-label">
                              Event:<br />(Optional)
                              <p class="control-label-help">To directly open event when clicked</p>
                            </label>
                            <div class="col-md-8">
                              <select name="event_id" class="select2" required>
                                <option value="0">--Select Event--</option>
                                <option value="1">Event 1</option>
                                <option value="2">Event 2</option>
                              </select>
                            </div>
                          </div>
                          <div class="or_link_item">
                            <h2>OR</h2>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">
                              Category:<br />(Optional)
                              <p class="control-label-help">To directly open category when clicked</p>
                            </label>
                            <div class="col-md-8">
                              <select name="cat_id" class="select2" required>
                                <option value="0">--Select Category--</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                              </select>
                            </div>
                          </div>
                          <div class="or_link_item">
                            <h2>OR</h2>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">External Link:<br />(Optional)</label>
                            <div class="col-md-8">
                              <input type="text" name="external_link" class="form-control" placeholder="http://www.example.com">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Notification Settings Tab -->
          <div role="tabpanel" class="tab-pane active" id="notification_settings">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <form action="" method="post" class="form form-horizontal" enctype="multipart/form-data" id="api_form">
                    <div class="section">
                      <div class="section-body">
                        <div class="form-group">
                          <label class="col-md-3 control-label">One Signal App ID:</label>
                          <div class="col-md-6">
                            <input type="text" name="onesignal_app_id" value="dummy_app_id" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 control-label">One Signal Rest Key:</label>
                          <div class="col-md-6">
                            <input type="text" name="onesignal_rest_key" value="dummy_rest_key" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
    document.title = $(this).text() + " | AppName";
  });

  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
    $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
  }

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#big_picture').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
