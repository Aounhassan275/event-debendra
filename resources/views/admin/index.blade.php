<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Einvie</title>
    <link rel="icon" href="{{ asset('images/dummy_logo.png') }}" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flat-admin.css') }}">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue-sky.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/blue.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/red.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/yellow.css') }}">

    <script src="{{ asset('assets/js/login.js') }}" type="text/javascript"></script>
</head>
<body>
<div class="app app-default">
    <div class="app-container app-login">
        <div class="flex-center">
            <div class="app-body">
                <div class="app-block">
                    <div class="app-form login-form">
                        <div class="form-header">
                            <div class="app-brand">Dummy App</div>
                        </div>
                        <div class="login_title_lineitem">
                            <div class="line_1"></div>
                            <div class="flipInX-1 blind icon">
                                <span class="icon">
                                    <i class="fa fa-gg"></i>&nbsp;
                                    <i class="fa fa-gg"></i>&nbsp;
                                    <i class="fa fa-gg"></i>
                                </span>
                            </div>
                            <div class="line_2"></div>
                        </div>
                        <div class="clearfix"></div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group" style="border: 0px;">
                                @if (session('msg'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        {{ session('msg') }}
                                    </div>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon2">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success btn-submit" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
