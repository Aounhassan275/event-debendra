@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url()->previous() }}">
                <h4 class="pull-left" style="font-size: 20px; color: #e91e63;">
                    <i class="fa fa-arrow-left"></i> Back
                </h4>
            </a>

            <div class="card">
                <div class="page_title_block">
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">Envato Verify Purchase</div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="card-body mrg_bottom">
                    <form name="verify_purchase" method="post" class="form form-horizontal" enctype="multipart/form-data" id="api_form">
                        @csrf
                        <div class="section">
                            <div class="section-body">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Envato Username :-
                                        <p class="control-label-help" style="margin-bottom: 5px;">
                                            https://codecanyon.net/user/<u style="color: #e91e63">sampleusername</u>
                                        </p>
                                        <p class="control-label-help">(<u style="color: #e91e63">sampleusername</u> is the username)</p>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="envato_buyer_name" readonly id="envato_buyer_name" value="sampleusername" class="form-control" placeholder="sampleusername">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Envato Purchase Code :-
                                        <p class="control-label-help">
                                            (<a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code" target="_blank">Where Is My Purchase Code?</a>)
                                        </p>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="envato_purchase_code" id="envato_purchase_code" value="XXXX-XXXX-XXXX-XXXX" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Android Package Name :-
                                        <p class="control-label-help">(More info in Android Doc)</p>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="package_name" id="package_name" value="com.example.myapp" class="form-control" placeholder="com.example.myapp">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <br/>
                    <div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <h4 id="oh-snap!-you-got-an-error!">Note:</h4>
                        <p style="margin-bottom: 10px">
                            <i class="fa fa-hand-o-right"></i> Buyer name and purchase code should match and package name should be the same in the Android project, otherwise the application will not work.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
