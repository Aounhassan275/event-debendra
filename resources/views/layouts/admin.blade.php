<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('admin/images/app_icon.png') }}" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/flat-admin.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/theme/blue-sky.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/theme/blue.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/theme/red.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/theme/yellow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/duDialog-master/duDialog.min.css?v=') }}">
    <link rel="stylesheet" href="{{ asset('admin/colorpicker/jquery.minicolors.css') }}">
    <script src="{{ asset('admin/colorpicker/jquery.minicolors.js') }}"></script>

    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/js/vendor.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/app.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{ asset('admin/duDialog-master/duDialog.min.js?v=') }}"></script>

    <script src="{{ asset('admin/js/notify.min.js') }}"></script>

    <style type="text/css">
        .minicolors-theme-default .minicolors-input {
            height: 48px !important;
            width: auto;
            display: inline-block;
            padding-left: 40px !important;
        }

        .minicolors-theme-default .minicolors-swatch {
            top: 9px !important;
            left: 5px !important;
            width: 30px !important;
            height: 30px !important;
        }

        .minicolors-theme-default.minicolors {
            width: 100% !important;
        }
    </style>

</head>

<body>

    <div class="app app-default">
        <div class="loader"></div>
        @include('layouts.partials.sidebar')
        <div class="app-container">
            @include('layouts.partials.navbar')

            @yield('content')

            @include('layouts.partials.footer')
        </div>
    </div>



    <!-- Include DataTables and initialization -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        let table = new DataTable('.MyTable');
    </script>
    <!-- Vendor and App JS -->
    <script src="{{ asset('admin/js/vendor.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>

    <!-- jQuery UI CSS (CDN) -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- jQuery UI JS (CDN) -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- duDialog JS with versioning -->
    <script src="{{ asset('admin/duDialog-master/duDialog.min.js') }}?v={{ now()->format('dmYHis') }}"></script>

    <!-- Notify JS -->
    <script src="{{ asset('admin/js/notify.min.js') }}"></script>

</body>

</html>
