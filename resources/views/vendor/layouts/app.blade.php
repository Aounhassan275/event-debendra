<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Dashboard-Einvie</title>
    <link rel="icon" type="image/png" href="{{ asset('admin/images/favicon.png') }}" sizes="16x16">
    <!-- remix icon font css  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/css/remixicon.css') }}">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{ asset('vendor/css/lib/bootstrap.min.css') }}">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('vendor/css/lib/apexcharts.css') }}">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('vendor/css/lib/dataTables.min.css') }}">
    <!-- Text Editor css -->
    <link rel="stylesheet" href=" {{ asset('vendor/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('vendor/css/lib/editor.quill.snow.css') }}">
    <!-- Date picker css -->
    <link rel="stylesheet" href=" {{ asset('vendor/css/lib/flatpickr.min.css') }}">
    <!-- Calendar css -->
    <link rel="stylesheet" href=" {{ asset('vendor/css/lib/full-calendar.css') }}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('vendor/css/lib/jquery-jvectormap-2.0.5.css') }}">
    <!-- Popup css -->
    <link rel="stylesheet" href="{{ asset('vendor/css/lib/magnific-popup.css') }}">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{ asset('vendor/css/lib/slick.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href=" {{ asset('vendor/css/style.css') }}">
</head>

<body>

    @include('vendor.layouts.header')

    <main class="dashboard-main">
        <div class="navbar-header">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-4">
                        <button type="button" class="sidebar-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                            <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                        </button>
                        <button type="button" class="sidebar-mobile-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                        </button>
                        <form class="navbar-search">
                            <input type="text" name="search" placeholder="Search">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </form>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <button type="button" data-theme-toggle
                            class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
                        <!-- Notification dropdown end -->

                        <div class="dropdown">
                            <button class="d-flex justify-content-center align-items-center rounded-circle"
                                type="button" data-bs-toggle="dropdown">
                                <img src=" {{ asset('vendor/images/user.png') }} " alt="image"
                                    class="w-40-px h-40-px object-fit-cover rounded-circle">
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <div
                                    class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-2">
                                            @if (Auth::user()->name)
                                                {{ Auth::user()->name }}
                                            @else
                                                {{ Auth::user()->email }}
                                            @endif
                                        </h6>
                                        <span class="text-secondary-light fw-medium text-sm">
                                            @if (Auth::user()->user_type == 1)
                                                Vendor
                                            @elseif (Auth::user()->user_type == 2)
                                                User
                                            @else
                                                Admin
                                            @endif
                                        </span>
                                    </div>
                                    <button type="button" class="hover-text-danger">
                                        <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                    </button>
                                </div>
                                <ul class="to-top-list">
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3"
                                            href="{{ route('auth.logout') }}">
                                            <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon> Log
                                            Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- Profile dropdown end -->
                    </div>
                </div>
            </div>
        </div>
        @yield('content')

    </main>
    @include('vendor.layouts.footer')

    <!-- jQuery library js -->
    <script src="{{ asset('vendor/js/lib/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('vendor/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Apex Chart js -->
    {{-- <script src="{{ asset('vendor/js/lib/apexcharts.min.js') }}"></script> --}}

    <!-- Data Table js -->
    <script src="{{ asset('vendor/js/lib/dataTables.min.js') }}"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('vendor/js/lib/iconify-icon.min.js') }}"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('vendor/js/lib/jquery-ui.min.js') }}"></script>
    <!-- Vector Map js -->
    {{-- <script src="{{ asset('vendor/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('vendor/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script> --}}
    <!-- Popup js -->
    <script src="{{ asset('vendor/js/lib/magnifc-popup.min.js') }}"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('vendor/js/lib/slick.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('vendor/js/app.js') }}"></script>

    {{-- <script src="{{ asset('vendor/js/homeOneChart.js') }}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('.dataTable');
        })
    </script>

</body>

</html>
