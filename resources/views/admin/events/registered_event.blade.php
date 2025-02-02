@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <a href="{{url('manage-user')}}"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>
        
        <div class="page_title_block user_dashboard_item" style="background-color: #333;border-radius:6px;0 1px 4px 0 rgba(0, 0, 0, 0.14);border-bottom:0">
            <div class="user_dashboard_item">
                <div class="col-md-12 col-xs-12">
                    <br>
                    <span class="badge badge-success badge-icon">
                        <div class="user_profile_img">
                            <img src="assets/images/google-logo.png" style="width: 16px;height: 16px;position: absolute;top: 24px;z-index: 1;left: 62px;">
                            <img type="image" src="assets/images/user-icons.jpg" alt="image" />
                        </div>
                        <span style="font-size: 14px;">John Doe</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                        <span style="font-size: 14px;text-transform: lowercase;">johndoe@example.com</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <strong style="font-size: 14px;">Registered At:</strong>
                        <span style="font-size: 14px;">25-10-2023</span>
                    </span>
                    <span class="badge badge-success badge-icon">
                        <strong style="font-size: 14px;">Last Activity On:</strong>
                        <span style="font-size: 14px;text-transform: lowercase;">5 minutes ago</span>
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
                    <li role="registered_events" class="active" style="width: auto">
                        <a href="#" aria-controls="registered_events">Registered Events</a>
                    </li>
                    <li role="favourite_event" style="width: auto">
                        <a href="{{url('favorite-event')}}" aria-controls="favourite_event">Favourite Events</a>
                    </li>
                    <li role="recent_event" style="width: auto">
                        <a href="{{url('recent-event')}}" aria-controls="recent_event">Recent Events</a>
                    </li>
                </ul>
            </div>

            <div class="card-body no-padding tab-content">
                <div role="tabpanel" class="tab-pane active" id="registered_events">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover datatable" style="margin-top: 50px !important;overflow-y: auto;">
                                <thead>
                                    <tr>
                                        <th>Ticket No.</th>
                                        <th>Event</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Tickets</th>
                                        <th>Date</th>
                                        <th class="cat_action_list">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>12345</td>
                                        <td title="Event Title">Sample Event</td>
                                        <td>John Doe</td>
                                        <td>johndoe@example.com</td>
                                        <td>123-456-7890</td>
                                        <td>2</td>
                                        <td>25-10-2023</td>
                                        <td nowrap="">
                                            <a href="#" class="btn btn-success btn_edit btn_ticket" data-toggle="tooltip" data-tooltip="Ticket"><i class="fa fa-ticket"></i></a>
                                            <a href="#" class="btn btn-danger btn_delete" data-toggle="tooltip" data-tooltip="Delete!"><i class=" fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Add additional rows with dummy data as needed -->
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script type="text/javascript">

$(document).ready(function() {
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        document.title = $(this).text() + " | App Name";
    });

    // Delete event
    $(".btn_delete").click(function(e) {
        e.preventDefault();
        if (confirm('Are you sure? All data will be removed which belong to this!')) {
            // Simulate delete action here
            alert("Event deleted successfully.");
        }
    });
});

</script>
