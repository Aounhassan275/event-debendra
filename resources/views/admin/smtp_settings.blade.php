@extends('layouts.admin')

@section('title', 'SMTP Settings')

@section('content')
<div class="row">
  <div class="col-md-12">
    <a href="{{ url()->previous() }}">
      <h4 class="pull-left" style="font-size: 20px; color: #e91e63">
        <i class="fa fa-arrow-left"></i> Back
      </h4>
    </a>

    <div class="card">
      <div class="page_title_block">
        <div class="col-md-5 col-xs-12">
          <div class="page_title">SMTP Settings</div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="card-body mrg_bottom">
        <div class="row">
          <div class="col-md-8">
            <form action="#" method="post" class="form form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">SMTP Type <span style="color: red">*</span>:</label>
                    <div class="col-md-9">
                      <div class="radio radio-inline" style="margin-top: 10px; padding-left: 5px">
                        <input type="radio" name="smtp_type" id="gmail" value="gmail" checked disabled>
                        <label for="gmail">Gmail SMTP</label>
                      </div>
                      <div class="radio radio-inline" style="margin-top: 10px; padding-left: 5px">
                        <input type="radio" name="smtp_type" id="server" value="server" disabled>
                        <label for="server">Server SMTP</label>
                      </div>
                    </div>
                  </div>
                  <br/>

                  <input type="hidden" name="smtpIndex" value="gmail">

                  <div class="gmailContent" style="display:block">
                    <div class="form-group">
                      <label class="col-md-3 control-label">SMTP Host <span style="color: red">*</span>:</label>
                      <div class="col-md-9">
                        <input type="text" name="smtp_host[]" class="form-control" value="smtp.gmail.com" placeholder="mail.example.in" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Email <span style="color: red">*</span>:</label>
                      <div class="col-md-9">
                        <input type="text" name="smtp_email[]" class="form-control" value="info@example.com" placeholder="info@example.com" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label">Password <span style="color: red">*</span>:</label>
                      <div class="col-md-9">
                        <input type="password" name="smtp_password[]" class="form-control" placeholder="*********">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label">SMTPSecure:</label>
                      <div class="col-md-5">
                        <select name="smtp_secure[]" class="select2" required>
                         <option value="tls" selected>TLS</option>
                         <option value="ssl">SSL</option>
                       </select>
                     </div>
                     <div class="col-md-4">
                      <input type="text" name="port_no[]" class="form-control" value="587" placeholder="Enter Port No." required>
                    </div>
                   </div>
                </div>

                <div class="serverContent" style="display:none">
                  <div class="form-group">
                    <label class="col-md-3 control-label">SMTP Host <span style="color: red">*</span>:</label>
                    <div class="col-md-9">
                      <input type="text" name="smtp_host[]" id="smtp_host" class="form-control" value="mail.example.com" placeholder="mail.example.in" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Email <span style="color: red">*</span>:</label>
                    <div class="col-md-9">
                      <input type="text" name="smtp_email[]" id="smtp_email" class="form-control" value="info@example.com" placeholder="info@example.com" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Password <span style="color: red">*</span>:</label>
                    <div class="col-md-9">
                      <input type="password" name="smtp_password[]" id="smtp_password" class="form-control" placeholder="********">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label">SMTPSecure:</label>
                    <div class="col-md-5">
                      <select name="smtp_secure[]" class="select2" required>
                       <option value="tls">TLS</option>
                       <option value="ssl">SSL</option>
                     </select>
                   </div>
                   <div class="col-md-4">
                    <input type="text" name="port_no[]" id="port_no" class="form-control" value="465" placeholder="Enter Port No." required>
                  </div>
                 </div>
              </div>
              <input type="hidden" id="server_data" data-stuff='{"smtp_type":"server"}'>
            </div>
            <div class="form-group">
              <div class="col-md-9 col-md-offset-3">
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-4">
        <div class="check_smtp" style="border: 1px solid rgb(153, 153, 153); padding: 10px 20px; border-radius: 6px; margin-top:15px;">
          <h4>Check Mail Configuration</h4>
          <p style="color:#8a8a8a;">Send test mail to your email to check Email functionality work or not.</p>
          <hr/>
          <form action="#" method="post" id="check_smtp_form">
            @csrf
            <div class="form-group">
              <label class="control-label">Email <span style="color: red">*</span>:</label>
              <div>
                <input type="text" name="email" class="form-control" autocomplete="off" placeholder="info@example.com" required>
              </div>
            </div>
            <div class="form-group">
              <div>
                <button type="submit" name="btn_send" class="btn btn-primary">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <br/>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <h4>Note:</h4>
      <p style="margin-bottom: 10px"><i class="fa fa-hand-o-right"></i> This email is required; otherwise, the <strong>forgot password</strong> OR <strong>email</strong> feature will not work.</p>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $("input[name='smtp_type']").on("click", function(e) {
    var checkbox = $(this);
    e.preventDefault();
    e.stopPropagation();

    var _val = $(this).val();
    if (_val == 'gmail') {
      confirmDlg = duDialog('Are you sure?', '', {
        init: true,
        dark: false,
        buttons: duDialog.OK_CANCEL,
        okText: 'Proceed',
        callbacks: {
          okClick: function(e) {
            confirmDlg.hide();
            checkbox.attr("disabled", true);
            checkbox.prop("checked", true);
            $("#server").attr("disabled", false);
            $("#server").prop("checked", false);
            $(".serverContent").hide();
            $(".gmailContent").show();
            $(".serverContent").find("input").attr("required", false);
            $(".gmailContent").find("input").attr("required", true);
            $("input[name='smtpIndex']").val('gmail');
            $("input[name='smtp_password[]']").attr("required", false);
          }
        }
      });
      confirmDlg.show();
    } else {
      confirmDlg = duDialog('Are you sure?', '', {
        init: true,
        dark: false,
        buttons: duDialog.OK_CANCEL,
        okText: 'Proceed',
        callbacks: {
          okClick: function(e) {
            confirmDlg.hide();
            checkbox.attr("disabled", true);
            checkbox.prop("checked", true);
            $("#gmail").attr("disabled", false);
            $("#gmail").prop("checked", false);
            $(".gmailContent").hide();
            $(".serverContent").show();
            $(".gmailContent").find("input").attr("required", false);
            $(".serverContent").find("input").attr("required", true);
            $("input[name='smtpIndex']").val('server');
          }
        }
      });
      confirmDlg.show();
    }
  });
</script>
@endsection
