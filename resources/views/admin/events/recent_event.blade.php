@extends('layouts.admin')

@section('content')
<?php $page_title = "Users Profile"; ?>

<div class="row">
    <div class="col-lg-12">
        <a href="{{ request()->get('redirect', 'manage-user') }}">
            <h4 class="pull-left" style="font-size: 20px;color: #e91e63">
                <i class="fa fa-arrow-left"></i> Back
            </h4>
        </a>
        <div class="page_title_block user_dashboard_item" style="background-color: #333;border-radius:6px;0 1px 4px 0 rgba(0, 0, 0, 0.14);border-bottom:0">
            <div class="user_dashboard_item">
                <div class="col-md-12 col-xs-12"><br>
                    <span class="badge badge-success badge-icon">
                        <div class="user_profile_img">
                            <img src="{{ asset('images/user.jpg') }}" alt="image" style=""/>
                            <img src="{{ asset('assets/images/google-logo.png') }}" style="width: 16px;height: 16px;position: absolute;top: 24px;z-index: 1;left: 62px;">
                        </div>
                        <span style="font-size: 14px;">John Doe</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                        <span style="font-size: 14px;text-transform: lowercase;">johndoe@example.com</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <strong style="font-size: 14px;">Registered At:</strong>
                        <span style="font-size: 14px;">01-01-2023</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <strong style="font-size: 14px;">Last Activity On:</strong>
                        <span style="font-size: 14px;text-transform: lowercase;">2 hours ago</span>
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
                    <li role="favourite_event" style="width: auto">
                        <a href="{{url('favorite-event')}}" aria-controls="favourite_event">Favourite Events</a>
                    </li>
                    <li role="recent_event" class="active" style="width: auto">
                        <a href="#" aria-controls="recent_event">Recent Events</a>
                    </li>
                </ul>
            </div>

            <div class="card-body no-padding tab-content">
                <div role="tabpanel" class="tab-pane active" id="favourite_event">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <?php
                                // Dummy values for recent events
                                $recent_events = [
                                    ['category_name' => 'Music', 'event_title' => 'Concert', 'registration_closed' => 'false', 'total_views' => 100, 'event_banner' => 'event1.jpg'],
                                    ['category_name' => 'Art', 'event_title' => 'Art Exhibition', 'registration_closed' => 'true', 'total_views' => 50, 'event_banner' => 'event2.jpg'],
                                    // Add more dummy events as needed
                                ];

                                if (count($recent_events)) {
                                    foreach ($recent_events as $event_row) {
                                ?>
                                <div class="col-lg-4 col-sm-6 col-xs-12">
                                    <div class="block_wallpaper">
                                        <div class="wall_category_block">
                                            <h2>{{ $event_row['category_name'] }}</h2>
                                            <a href="javascript:void(0)" class="toggle_btn_a" data-id="1" data-action="deactive" data-column="is_slider" data-toggle="tooltip" data-tooltip="Slider">
                                                <div style="color:green;"><i class="fa fa-sliders"></i></div>
                                            </a>
                                        </div>
                                        <div class="wall_image_title">
                                            <p style="font-size: 16px;">
                                                {{ Str::limit($event_row['event_title'], 25, '...') }}
                                            </p>

                                            <p>
                                                <span style="{{ $event_row['registration_closed'] == 'true' ? 'color:red;' : '' }}">
                                                    <strong style="font-weight: 500">Registration Status:</strong> [{{ $event_row['registration_closed'] == 'true' ? 'Closed' : 'Open' }}]
                                                </span>
                                            </p>
                                            <ul>
                                                <li><a href="javascript:void(0)" data-toggle="tooltip" data-tooltip="{{ $event_row['total_views'] }} Views"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>
                                            </ul>
                                        </div>
                                        <span><img src="{{ asset('images/' . $event_row['event_banner']) }}" /></span>
                                    </div>
                                </div>
                                <?php 
                                    }
                                } else { 
                                ?>
                                <div class="col-md-12 text-center">
                                    <h3 class="text-muted">Sorry! no data found.</h3>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12">
                            <div class="pagination_item_block">
                                <nav>
                                    <!-- Pagination can be included here if needed -->
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
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
        document.title = $(this).text() + " | {{ config('app.name') }}";
    });

    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }
</script>
@endsection
