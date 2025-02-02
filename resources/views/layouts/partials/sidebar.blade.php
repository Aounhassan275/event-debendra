<aside class="app-sidebar" id="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand" href="{{ url('dashboard') }}">
            <img src="{{ asset('admin/images/app_icon.png') }}" alt="app logo" />
        </a>
        <button type="button" class="sidebar-toggle">
            <i class="fa fa-times"></i>
        </button>
    </div>

    <div class="sidebar-menu">
        <ul class="sidebar-nav">
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" >
                    <div class="icon"><i class="fa fa-dashboard" aria-hidden="true"></i></div>
                    <div class="title">Dashboard</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/menu*') ? 'active' : '' }}">
                <a href="{{ route('menu.list') }}" >
                    <div class="icon"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    <div class="title">Menu</div>
                </a>
            </li>
            <li class="{{ Request::is('admin/testimonial*') ? 'active' : '' }}">
                <a href="{{ route('testimonial.list') }}" >
                    <div class="icon"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    <div class="title">Testimonial</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                <a href="{{ route('category.index') }}" >
                    <div class="icon"><i class="fa fa-sitemap" aria-hidden="true"></i></div>
                    <div class="title">Categories</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/subcategory*') ? 'active' : '' }}">
                <a href="{{ route('subcategory.list') }}" >
                    <div class="icon"><i class="fa fa-sitemap" aria-hidden="true"></i></div>
                    <div class="title">Subcategories</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/manage-event') ? 'active' : '' }}">
                <a href="{{ route('manage_event') }}">
                    <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                    <div class="title">Events</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/card*') ? 'active' : '' }}">
                <a href="{{ route('manage_card_image')}}">
                    <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                    <div class="title">Card Images</div>
                </a>
            </li>

            <li class="{{ Request::is('#') ? 'active' : '' }}">
                <a href="#">
                    <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                    <div class="title">Card Videos</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/slider*') ? 'active' : '' }}">
                <a href="{{ route('manage_slider')}}">
                    <div class="icon"><i class="fa fa-sliders" aria-hidden="true"></i></div>
                    <div class="title">Home Slider</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/manage-user*') ? 'active' : '' }}">
                <a href="{{ route('normal_users.index')}}">
                    <div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                    <div class="title">Users</div>
                </a>
            </li>
            <li class="{{ Request::is('admin/vendor/list*') ? 'active' : '' }}">
                <a href="{{ route('vendor.list')}}">
                    <div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                    <div class="title">Vendors</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/vendor_type*') ? 'active' : '' }}">
                <a href="{{ route('vendors.list')}}">
                    <div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                    <div class="title">Vendors Type</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/event-booking*') ? 'active' : '' }}">
                <a href="{{ route('event_booking')}}">
                    <div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                    <div class="title">Event Booking</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/event-image*') ? 'active' : '' }}">
                <a href="{{ route('event_image')}}">
                    <div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                    <div class="title">Event Media</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/event-feed*') ? 'active' : '' }}">
                <a href="{{ route('manage_event_feed')}}">
                    <div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                    <div class="title">Event Feeds</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/send-notification*') ? 'active' : '' }}">
                <a href="{{ route('send_notification')}}">
                    <div class="icon"><i class="fa fa-send" aria-hidden="true"></i></div>
                    <div class="title">Notification</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/manage-contacts*') ? 'active' : '' }}">
                <a href="{{ route('manage_contact')}}">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="title">Contact List</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/manage-reports*') ? 'active' : '' }}">
                <a href="{{ route('manage_reports')}}">
                    <div class="icon"><i class="fa fa-bug" aria-hidden="true"></i></div>
                    <div class="title">Reports</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/smtp-settings*') ? 'active' : '' }}">
                <a href="{{route('smtp_settings')}}">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="title">SMTP Settings</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
                <a href="{{route('settings')}}">
                    <div class="icon"><i class="fa fa-cog" aria-hidden="true"></i></div>
                    <div class="title">Settings</div>
                </a>
            </li>

            <li class="{{ Request::is('admin/api*') ? 'active' : '' }}">
                <a href="{{route('api')}}">
                    <div class="icon"><i class="fa fa-exchange" aria-hidden="true"></i></div>
                    <div class="title">API URLs</div>
                </a>
            </li>
        </ul>
    </div>
</aside>
