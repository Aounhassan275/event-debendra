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
                    <div class="page_title">Settings</div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="card-body mrg_bottom" style="padding:0">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#app_settings" aria-controls="app_settings" role="tab" data-toggle="tab">App Settings</a></li>
                    <li role="presentation"><a href="#admob_settings" aria-controls="admob_settings" role="tab" data-toggle="tab">Ads Settings</a></li>
                    <li role="presentation"><a href="#api_settings" aria-controls="api_settings" role="tab" data-toggle="tab">API Settings</a></li>
                    <li role="presentation"><a href="#api_privacy_policy" aria-controls="api_privacy_policy" role="tab" data-toggle="tab">App Privacy Policy</a></li>
                    <li role="presentation"><a href="#app_terms_cond" aria-controls="app_terms_cond" role="tab" data-toggle="tab">Terms & Condition</a></li>
                    <li role="presentation"><a href="#account_delete" aria-controls="account_delete" role="tab" data-toggle="tab">Delete Account Instructions</a></li>
                    <li role="presentation"><a href="#api_faq" aria-controls="api_faq" role="tab" data-toggle="tab">App FAQ</a></li>
                    <li role="presentation"><a href="#app_update_popup" aria-controls="app_update_popup" role="tab" data-toggle="tab">App Update</a></li>
                </ul>
                <div class="rows">
                    <div class="col-md-12">
                   <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="app_settings">
                        <form action="" name="settings_from" method="post" class="form form-horizontal" enctype="multipart/form-data">
                      <div class="section">
                        <div class="section-body">
                            <div class="form-group" >
                            <label class="col-md-3 control-label">Email <span style="color: red">*</span>:-
                              <p class="control-label-help" style="color: red">(<strong>Note:</strong> This email is required when user want to contact you.)</p>
                            </label>
                            <div class="col-md-6">
                              <input type="text" name="app_email" id="app_email" value="" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">App Name :-</label>
                            <div class="col-md-6">
                              <input type="text" name="app_name" id="app_name" value="" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">App Logo :-  <p class="control-label-help">(Recommended resolution: 80X80, 90x90)</p></label>
                            <div class="col-md-6">
                              <div class="fileupload_block">
                                <input type="file" name="app_logo" id="fileupload" onchange="readURL(this)">


                                      <div class="fileupload_img"><img type="image" id="app_logo" src="{{asset('admin/images/landscape.jpg')}}" alt="image" /></div>

                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">App Description :-</label>
                            <div class="col-md-6">

                              <textarea name="app_description" id="app_description" class="form-control"> Hii</textarea>

                            <script>
                            CKEDITOR.replace( 'app_description' ,{
                              filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                              filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                              filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                            });
                          </script>
                            </div>
                          </div>
                          <div class="form-group">&nbsp;</div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">App Version :-</label>
                            <div class="col-md-6">
                              <input type="text" name="app_version" id="app_version" value="Dummy value 1" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Author :-</label>
                            <div class="col-md-6">
                              <input type="text" name="app_author" id="app_author" value=" Dummy Value 2" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Contact :-</label>
                            <div class="col-md-6">
                              <input type="text" name="app_contact" id="app_contact" value="Dummy Value 3" class="form-control">
                            </div>
                          </div>

                           <div class="form-group">
                            <label class="col-md-3 control-label">Website :-</label>
                            <div class="col-md-6">
                              <input type="text" name="app_website" id="app_website" value="Dummy Value 4" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Developed By :-</label>
                            <div class="col-md-6">
                              <input type="text" name="app_developed_by" id="app_developed_by" value="Dummy Value 5" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                              <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                        </div>
                      </div>
                       </form>
                      </div>
                                   <!-- admob settings -->
                      <div role="tabpanel" class="tab-pane" id="admob_settings">
                        <form action="" name="admob_settings" method="post" class="form form-horizontal" enctype="multipart/form-data">
                          <div class="section">
                             <div class="section-body">
                              <div class="form-group">
                                  <label class="col-md-3 control-label">Publisher ID <a href="#target-content5"></a>:- <p class="control-label-help" style="color: red">(<strong>Note:</strong>Publisher ID is not required for Facebook Ads)</p></label>
                                  <div class="col-md-9">
                                    <input type="text" name="publisher_id" id="publisher_id" value="Dummy Value 6" class="form-control">
                                  </div>
                                  <div style="height:60px;display:inline-block;position:relative"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="banner_ads_block">
                                          <div class="banner_ad_item">
                                            <label class="control-label">Banner Ads :-</label>
                                            <div class="row toggle_btn" style="position: relative;margin-top: -8px;">
                                              <input type="checkbox" id="chk_banner" name="banner_ad" value="true" class="cbx hidden">
                                              <label for="chk_banner" class="lbl"></label>
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <p class="col-md-4 control-label field_lable">Banner Ad Type :-</p>
                                              <div class="col-md-8">
                                               <select name="banner_ad_type" id="banner_ad_type" class="select2">
                                                  <option value="admob">Admob</option>
                                                  <option value="facebook">Facebook</option>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <p class="col-md-4 control-label field_lable">Banner ID :-</p>
                                              <div class="col-md-8 banner_ad_id" style="display: none">
                                                <input type="text" name="banner_ad_id" id="banner_ad_id" value="" class="form-control">
                                              </div>
                                              <div class="col-md-8 banner_facebook_id" style="display: none">
                                                <input type="text" name="banner_facebook_id" id="banner_facebook_id" value="<" class="form-control">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <div class="interstital_ads_block">
                                          <div class="interstital_ad_item">
                                            <label class="control-label">Interstitial Ads :-</label>
                                            <div class="row toggle_btn" style="position: relative;margin-top: -8px;">
                                              <input type="checkbox" id="chk_interstitial" name="interstital_ad" value="true" class="cbx hidden"/>
                                              <label for="chk_interstitial" class="lbl"></label>
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <p class="col-md-4 control-label field_lable">Interstitial Ad Type :-</p>
                                              <div class="col-md-8">
                                                <select name="interstital_ad_type" id="interstital_ad_type" class="select2">
                                                  <option value="admob">Admob</option>
                                                  <option value="facebook" >Facebook</option>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <p class="col-md-4 control-label field_lable">Interstitial Ad ID :-</p>
                                              <div class="col-md-8 interstital_ad_id" style="display: none">
                                                <input type="text" name="interstital_ad_id" id="interstital_ad_id" value="" class="form-control">
                                              </div>
                                              <div class="col-md-8 interstital_facebook_id" style="display: none">
                                                <input type="text" name="interstital_facebook_id" id="interstital_facebook_id" value="" class="form-control">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <p class="col-md-4 control-label field_lable">Interstitial Clicks :-</p>
                                              <div class="col-md-8">
                                                <input type="text" name="interstital_ad_click" id="interstital_ad_click" value="" class="form-control">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="form-group">
                                  <div class="col-md-9 col-md-offset-0">
                                  <button type="submit" name="admob_submit" class="btn btn-primary">Save</button>
                                  </div>
                                </div>
                          </div>
                        </form>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="api_settings">
                        <form action="" name="settings_api" method="post" class="form form-horizontal" enctype="multipart/form-data">
                      <div class="section">
                        <div class="section-body">
                            <input type="hidden" name="api_latest_limit" value="0">
                               <div class="row">
                                  <div class="col-md-6">
                                    <label class="col-md-5 control-label">Category List Order By:-</label>
                                    <div class="col-md-7">
                                        <select name="api_cat_order_by" id="api_cat_order_by" class="select2">
                                          <option value="cid">ID</option>
                                          <option value="category_name">Name</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <label class="col-md-5 control-label">Category Post Order:-</label>
                                    <div class="col-md-7">
                                      <select name="api_cat_post_order_by" id="api_cat_post_order_by" class="select2">
                                      <option value="ASC">ASC</option>
                                      <option value="DESC">DESC</option>
                                       </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <label class="col-md-5 control-label">Page Limit:-</label>
                                    <div class="col-md-7">
                                       <input type="number" name="page_limit" id="page_limit" value="" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <label class="col-md-5 control-label">Home Recent Limit:-</label>
                                    <div class="col-md-7">
                                       <input type="number" name="api_recent_limit" id="api_recent_limit" value="" class="form-control">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-9 col-md-offset-5">
                                      <button type="submit" name="api_submit" class="btn btn-primary">Save</button>
                                    </div>
                                  </div>
                              </div>
                            </div>
                           </div>
                       </form>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="api_faq">
                            <form action="" name="api_faq" method="post" class="form form-horizontal" enctype="multipart/form-data">
                                <div class="section">
                                    <div class="section-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">App FAQ :-</label>
                                            <div class="col-md-8">
                                                <textarea name="app_faq" id="app_faq" class="form-control"></textarea>
                                        <script>
                                        CKEDITOR.replace( 'app_faq' ,{
                                          filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                                          filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                                          filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                                        });
                                      </script>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" name="app_faq_submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                      <div role="tabpanel" class="tab-pane" id="app_update_popup">
                            <form action="" name="app_update" method="post" class="form form-horizontal" enctype="multipart/form-data">
                                <div class="section">
                                    <div class="section-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">App Update Popup Show/Hide:-
                                                <p class="control-label-help" style="color:#F00">You can show/hide update popup from this option</p>
                                            </label>
                                            <div class="col-md-6">
                                                <div class="row" style="margin-top: 15px">
                                                    <input type="checkbox" id="chk_update" name="app_update_status" value="true" class="cbx hidden" />
                                                    <label for="chk_update" class="lbl" style="left:13px;"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">New App Version Code :-
                                                <a href="assets/images/android_version_code.png" target="_blank">
                                                    <p class="control-label-help" style="color:#F00">How to get version code</p>
                                                </a>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="number" min="1" name="app_new_version" id="app_new_version" required="" value=" Testing" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Description :-</label>
                                            <div class="col-md-6">
                                                <textarea name="app_update_desc" class="form-control">Hii</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">App Link :-
                                                <p class="control-label-help">You will be redirect on this link after click on update</p>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" name="app_redirect_url" id="app_redirect_url" required="" value="Testing" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Cancel Option :-
                                                <p class="control-label-help" style="color:#F00">Cancel button option will show in app update popup</p>
                                            </label>
                                            <div class="col-md-6">
                                                <div class="row" style="margin-top: 15px">
                                                    <input type="checkbox" id="chk_cancel_update" name="cancel_update_status" value="true" class="cbx hidden"/>Testing Last
                                                    <label for="chk_cancel_update" class="lbl" style="left:13px;"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" name="app_update_popup" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="app_terms_cond">
                            <div class="rows">
                                <form action="" method="post" class="form form-horizontal" enctype="multipart/form-data">
                                  <div class="section">
                                   <div class="section-body">
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">App Terms Conditions URL :-</label>
                                          <div class="col-md-9">
                                            <input type="text" readonly class="form-control" value="">
                                          </div>
                                        </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">App Terms Conditions :-</label>
                                        <div class="col-md-9">
                                          <textarea name="app_terms_conditions" id="app_terms_conditions" class="form-control"></textarea>
                                           <script>
                                        CKEDITOR.replace( 'app_terms_conditions' ,{
                                          filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                                          filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                                          filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                                        });
                                      </script>
                                        </div>
                                      </div>
                                      <br/>
                                      <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                          <button type="submit" name="app_terms_con" class="btn btn-primary">Save</button>
                                        </div>
                                      </div>
                                      <br>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="account_delete">
                            <div class="rows">
                                <form action="" method="post" class="form form-horizontal" enctype="multipart/form-data">
                                  <div class="section">
                                    <div class="section-body">

                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Account Delete Instructions URL :-</label>
                                          <div class="col-md-9">
                                            <input type="text" readonly class="form-control" value="NULL">
                                          </div>
                                        </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Account Delete Instructions :-</label>
                                        <div class="col-md-9">
                                          <textarea name="account_delete_intruction" id="account_delete_intruction" class="form-control"> Account delete Instructions</textarea>
                                        <script>
                                        CKEDITOR.replace( 'account_delete_intruction' ,{
                                          filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                                          filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                                          filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                                        });
                                      </script>
                                        </div>
                                      </div>
                                      <br/>
                                      <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                          <button type="submit" name="account_delete" class="btn btn-primary">Save</button>
                                        </div>
                                      </div>
                                      <br>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="api_privacy_policy">
                            <form action="" name="api_privacy_policy" method="post" class="form form-horizontal" enctype="multipart/form-data">
                              <div class="section">
                                <div class="section-body">

                                    <div class="form-group">
                                      <label class="col-md-3 control-label">App Privacy Policy URL :-</label>
                                      <div class="col-md-9">
                                        <input type="text" readonly class="form-control" value="Privacy policy">
                                      </div>
                                    </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">App Privacy Policy :-</label>
                                    <div class="col-md-9">
                                      <textarea name="app_privacy_policy" id="privacy_policy" class="form-control">Hii Testing 3</textarea>
                                   <script>
                                    CKEDITOR.replace( 'privacy_policy' ,{
                                      filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                                      filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                                      filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                                    });
                                  </script>
                                    </div>
                                  </div>
                            <br/>
                          <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                              <button type="submit" name="app_pri_poly" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                        </div>
                      </div>
                       </form>
                      <br>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var app_name="settings";

    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
      document.title = $(this).text()+" | app_name";
    });

    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }

   function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $("input[name='app_logo']").next(".fileupload_img").find("img").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("input[name='app_logo']").change(function() {
      readURL(this);
    });

    if($("select[name='banner_ad_type']").val()==='facebook'){
      $(".banner_ad_id").hide();
      $(".banner_facebook_id").show();
    }
    else{
      $(".banner_facebook_id").hide();
      $(".banner_ad_id").show();
    }
    $("select[name='banner_ad_type']").change(function(e){
      if($(this).val()==='facebook'){
        $(".banner_ad_id").hide();
        $(".banner_facebook_id").show();
      }
      else{
        $(".banner_facebook_id").hide();
        $(".banner_ad_id").show();
      }
    });
    if($("select[name='interstital_ad_type']").val()==='facebook'){
      $(".interstital_ad_id").hide();
      $(".interstital_facebook_id").show();
    }
    else{
      $(".interstital_facebook_id").hide();
      $(".interstital_ad_id").show();
    }
    $("select[name='interstital_ad_type']").change(function(e){
      if($(this).val()==='facebook'){
        $(".interstital_ad_id").hide();
        $(".interstital_facebook_id").show();
      }
      else{
        $(".interstital_facebook_id").hide();
        $(".interstital_ad_id").show(); }});
  </script>
@endsection
