@extends('layouts.admin')

@section('title', 'Created Events')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{ url('manage_users') }}">
            <h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4>
        </a>
        <div class="page_title_block user_dashboard_item" style="background-color: #333; border-radius:6px; box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14); border-bottom:0;">
            <div class="user_dashboard_item">
                <div class="col-md-12 col-xs-12">
                    <br>
                    <span class="badge badge-success badge-icon">
                        <div class="user_profile_img">
                            <img src="{{ asset('admin/images/google-logo.png') }}" style="width: 16px; height: 16px; position: absolute; top: 24px; z-index: 1; left: 62px;">
                            <img src="{{ asset('admin/images/user-icons.jpg') }}" alt="" style="">
                        </div>
                        <span style="font-size: 14px;">Samim Ansari</span>
                    </span>  
                    <span class="badge badge-success badge-icon">
                        <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                        <span style="font-size: 14px;text-transform: lowercase;">samim@example.com</span>
                    </span> 
                    <span class="badge badge-success badge-icon">
                        <strong style="font-size: 14px;">Registered At:</strong>
                        <span style="font-size: 14px;">01-01-2023</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <strong style="font-size: 14px;">Last Activity On:</strong>
                        <span style="font-size: 14px;text-transform: lowercase;">1 day ago</span>
                    </span>
                    <br><br/>
                </div>
            </div>
        </div>
        <div class="card card-tab">
            <div class="card-header" style="overflow: hidden;">
                <ul class="nav nav-tabs">
                    <li role="created_events" style="width: auto">
                        <a href="{{ url('edit-user') }}" aria-controls="created_events">User Profile</a>
                    </li>
                    <li role="created_events" class="active" style="width: auto">
                        <a href="{{ url('user-profile') }}" aria-controls="created_events">Created Events</a>
                    </li>
                    <li role="registered_events" style="width: auto">
                        <a href="{{ url('registered-event') }}" aria-controls="registered_events">Registered Events</a>
                    </li>
                    <li role="favourite_event" style="width: auto">
                        <a href="{{ url('favorite-event') }}" aria-controls="favourite_event">Favourite Events</a>
                    </li>
                    <li role="recent_event" style="width: auto">
                        <a href="{{ url('recent-event') }}" aria-controls="recent_event">Recent Events</a>
                    </li>
                </ul>
            </div>
            <div class="card-body no-padding tab-content">
                <div role="tabpanel" class="tab-pane active" id="created_events">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <!-- Event Card Example -->
                                <div class="col-lg-4 col-sm-6 col-xs-12">
                                    <div class="block_wallpaper">
                                        <div class="wall_category_block">
                                            <h2>Sample Category</h2>  
                                            <a href="javascript:void(0)" class="toggle_btn_a" data-toggle="tooltip" data-tooltip="Add to Slider"><i class="fa fa-sliders"></i></a>
                                        </div>
                                        <div class="wall_image_title">
                                            <p style="font-size: 16px;">Sample Event Title...</p>
                                            <p><span style="color:red;"><strong style="font-weight: 500">Registration Status:</strong> [Closed]</span></p>
                                            <ul>
                                                <li><a href="javascript:void(0)" data-toggle="tooltip" data-tooltip="50 Views"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="{{ url('edit-event') }}" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>
                                                <li><a href="javascript:void(0)" class="btn_delete_a" data-toggle="tooltip" data-tooltip="Delete"><i class="fa fa-trash"></i></a></li>
                                                <li>
                                                    <div class="row toggle_btn">
                                                        <a href="javascript:void(0)" data-toggle="tooltip" data-tooltip="DISABLE"><img src="{{ asset('assets/images/btn_disabled.png') }}" alt="" /></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <span><img src="{{ asset('admin/images/event_img.jpg') }}" alt="Event Banner"></span>
                                    </div>
                                </div>
                                <!-- Repeat the above event card as necessary -->
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12">
                            <div class="pagination_item_block">
                                <nav>
                                    <!-- Pagination Links Here -->
                                </nav>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>              
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
        document.title = $(this).text() + " | MyApp";
    });

    var activeTab = localStorage.getItem('activeTab');
    if(activeTab) {
        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }

    $(".toggle_btn_a").on("click", function(e) {
        e.preventDefault();
        // AJAX code for toggling slider or status goes here
    });

    $(".btn_delete_a").click(function(e) {
        e.preventDefault();
        // AJAX code for deleting the event goes here
    });
</script>
@endpush
