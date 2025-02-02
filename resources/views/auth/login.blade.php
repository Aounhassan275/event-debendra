<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            required autocomplete="current-password" />

        </div> --}}

        <!-- Remember Me -->

        {{-- resources/views/auth/login.blade.php --}}



        <div class="app app-default">
            <div class="app-container app-login">
                <div class="flex-center">
                    <div class="app-body">
                        <div class="app-block">
                            <div class="app-form login-form">
                                <div class="form-header">
                                    <div class="app-brand">Einvie </div>
                                </div>

                                <!-- Title Line with Icons -->
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

                                <!-- Laravel Auth Form -->
                                <form action="{{ route('auth.checkLogin') }}" method="POST">
                                    @csrf

                                    {{-- @include('vendor.layouts.message') --}}
                                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                                    <!-- Error Message for Session Message -->
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <!-- Username Input -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email" required value="{{ old('email') }}">
                                    </div>

                                    <!-- Password Input -->
                                    <div class="input-group mb-4">
                                        <span class="input-group-addon" id="basic-addon2">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                        </span>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password" aria-describedby="basic-addon2" required>
                                    </div>

                                    <!-- Login Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-submit">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
