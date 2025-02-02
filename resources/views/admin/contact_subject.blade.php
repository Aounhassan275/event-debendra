@extends('layouts.admin')

@section('title', 'Add Contact')

@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="{{url('dashboard')}}">
            <h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4>
        </a>
        <div class="card">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Add Contact</div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="card-body mrg_bottom"> 
                <form action="#" method="post" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="section">
                        <div class="section-body">
                            <div class="input-container">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Title :-</label>
                                    <div class="col-md-6">
                                        <input type="text" name="title[]" placeholder="Enter subject title" class="form-control" value="Sample Title" required>
                                        <a href="#" class="btn_remove" style="float: right;color: red;font-weight: 600;opacity: 0">&times; Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div id="dynamicInput"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">                      
                                    <button type="button" class="btn btn-success btn-xs add_more">Add More Subject</button>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-2">
                                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">

    $(".btn_remove:eq(0)").hide();

    $(".add_more").click(function(e){
        var _html = $(".input-container").html();
        $("#dynamicInput").append(_html);
        $(".btn_remove:not(:eq(0))").css("opacity","1").show();

        $(".btn_remove").click(function(e){
            e.preventDefault();
            $(this).parents(".form-group").remove();
        });
    });

    $(".btn_remove").click(function(e){
        e.preventDefault();
        $(this).parents(".form-group").remove();
    });

</script>
@endsection
