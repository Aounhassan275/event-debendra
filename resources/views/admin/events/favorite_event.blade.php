@extends('layouts.admin')

@section('title', 'Users Profile')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{url('manage-user')}}">
            <h4 class="pull-left" style="font-size: 20px;color: #e91e63">
                <i class="fa fa-arrow-left"></i> Back
            </h4>
        </a>
        <div class="page_title_block user_dashboard_item" style="background-color: #333; border-radius: 6px; border-bottom: 0">
            <div class="user_dashboard_item">
                <div class="col-md-12 col-xs-12"> <br>
                    <span class="badge badge-success badge-icon">
                        <div class="user_profile_img">
                            <img src="{{ asset('assets/images/user-icons.jpg') }}" alt="User Image" style=""/>
                        </div>
                        <span style="font-size: 14px;">Dummy User Name</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                        <span style="font-size: 14px;text-transform: lowercase;">dummyuser@example.com</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <strong style="font-size: 14px;">Registered At:</strong>
                        <span style="font-size: 14px;">01-01-2024</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <strong style="font-size: 14px;">Last Activity On:</strong>
                        <span style="font-size: 14px;text-transform: lowercase;">2 days ago</span>
                    </span>
                    <br><br/>
                </div>
            </div>
        </div>
        <div class="card card-tab">
            <div class="card-header" style="overflow: hidden;">
                <ul class="nav nav-tabs">
                    <li role="created_events" style="width: auto">
                        <a href="{{url('edit-user')}}" aria-controls="created_events">User Profile</a>
                    </li>
                    <li role="created_events" style="width: auto">
                        <a href="{{url('user-profile')}}" aria-controls="created_events">Created Events</a>
                    </li>
                    <li role="registered_events" style="width: auto">
                        <a href="{{url('registered-event')}}" aria-controls="registered_events">Registered Events</a>
                    </li>
                    <li role="favourite_event" class="active" style="width: auto">
                        <a href="#" aria-controls="favourite_event">Favourite Events</a>
                    </li>
                    <li role="recent_event" style="width: auto">
                        <a href="{{url('recent-event')}}" aria-controls="recent_event">Recent Events</a>
                    </li>
                </ul>
            </div>
            <div class="card-body no-padding tab-content">
                <div role="tabpanel" class="tab-pane active" id="favourite_event">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @for ($i = 0; $i < 3; $i++) <!-- Dummy data loop -->
                                    <div class="col-lg-4 col-sm-6 col-xs-12">
                                        <div class="block_wallpaper">
                                            <div class="wall_category_block">
                                                <h2>Dummy Category</h2>
                                                <a href="javascript:void(0)" class="toggle_btn_a" data-id="1" data-action="deactive">
                                                    <div style="color:green;"><i class="fa fa-sliders"></i></div>
                                                </a>
                                            </div>
                                            <div class="wall_image_title">
                                                <p style="font-size: 16px;">
                                                    Dummy Event Title
                                                </p>
                                                <p><span style="color:red;"><strong style="font-weight: 500">Registration Status:</strong> [Closed]</span></p>
                                                <ul>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-tooltip="10 Views"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="#" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>
                                                </ul>
                                            </div>
                                            <span><img src="{{ asset('images/dummy_banner.jpg') }}" /></span>
                                        </div>
                                    </div>
                                @endfor
                                <div class="col-md-12 text-center">
                                    <h3 class="text-muted">Sorry! no data found.</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12">
                            <div class="pagination_item_block">
                                <nav>
                                    <!-- Dummy pagination -->
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    </ul>
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

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        // Store active tab in local storage
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
            document.title = $(this).text() + " | {{ config('app.name') }}";
        });

        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
        }

        // Handle toggle button click
        $(".toggle_btn_a").on("click", function(e) {
            e.preventDefault();
            // Your AJAX code here
        });

        // Handle delete button click
        $(".btn_delete_a").click(function(e) {
            e.preventDefault();
            // Your AJAX code here
        });
    });
</script>
@endsection
