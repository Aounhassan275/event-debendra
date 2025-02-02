<nav class="navbar navbar-default" id="navbar">
    <div class="container-fluid">
        <div class="navbar-collapse collapse in">
            <ul class="nav navbar-nav navbar-mobile">
                <li>
                    <button type="button" class="sidebar-toggle">
                        <i class="fa fa-bars"></i>
                    </button>
                </li>
                <li class="logo">
                    <a class="navbar-brand" href="#">Einvie</a>
                </li>
                <li>
                    <button type="button" class="navbar-toggle">
                        <img class="profile-img" src="{{ asset('admin/images/app_icon.png') }}">
                    </button>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-left">
                <li class="navbar-title">Einvie</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown profile">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="profile-img" src="{{ asset('admin/images/app_icon.png') }}">
                        <div class="title">Profile</div>
                    </a>
                    <div class="dropdown-menu">
                        <div class="profile-info">
                            <h4 class="username">{{Auth::user()->name}}</h4>
                        </div>
                        <ul class="action">
                            <!-- Profile Link -->
                            <li>
                                {{-- <a href="{{ route('admin.profile') }}">Profile</a> --}}
                            </li>

                            <!-- Logout Link -->
                            <li>
                                <a href="{{ route('auth.logout') }}">
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>
