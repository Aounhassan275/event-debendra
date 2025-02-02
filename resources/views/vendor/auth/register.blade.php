<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('vendor/auth/extra/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vendor/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vendor/auth/fonts/font-awesome-4.7.0/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/auth/extra/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/auth/extra/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/auth/extra/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/auth/extra/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/auth/extra/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/auth/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url({{ asset('vendor/auth/images/bg-01.jpg') }});">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-40 p-b-40">
                <form action="{{ route('vendor.storeRegister') }}" class="login100-form validate-form" method="POST">
                    @csrf
                    <span class="login100-form-title p-b-30">
                        Sign Up
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
                        <span class="label-input100">Email ID</span>
                        <input class="input100" type="email" name="email" placeholder="Type your Email ID">
                        <span class="focus-input100" data-symbol="&#xf0e0;"></span>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
                        <span class="label-input100">Reenter Password</span>
                        <input class="input100" type="password" name="confirm_password"
                            placeholder="Reenter your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    @error('confirm_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="container-login100-form-btn p-t-10">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Get Started
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-20 p-b-10">
                        <span>
                            Or Sign Up Using
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                        <a href="#" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </div>

                    <div class="flex-col-c">
                        <span class="txt1 p-b-17">
                            Already a member
                        </span>

                        <a href="{{ route('login') }}" class="txt2">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('vendor/auth/extra/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/auth/extra/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/auth/extra/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/auth/extra/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/auth/extra/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/auth/extra/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/auth/extra/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/auth/extra/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/auth/js/main.js') }}"></script>

</body>

</html>
