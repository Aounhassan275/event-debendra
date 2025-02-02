<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
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
                            <form method="POST" action="{{ route('login') }}" >
                                @csrf

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                <!-- Error Message for Session Message -->
                                @if (session('msg'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        {{ session('msg') }}
                                    </div>
                                @endif

                                <!-- Username Input -->
                                <div class="input-group mb-3">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" required autofocus>
                                </div>

                                <!-- Password Input -->
                                <div class="input-group mb-4">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2" required>
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
