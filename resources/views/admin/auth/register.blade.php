<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('register') }}">
        @csrf    
        <div class="app app-default">
        <div class="app-container app-login">
            <div class="flex-center">
                <div class="app-body">
                    <div class="app-block">
                        <div class="app-form login-form">
                            <div class="form-header">
                                <div class="app-brand">Einvie Registration</div>
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
                            
                            <!-- Laravel Registration Form -->
                            <form method="POST" action="{{ route('register') }}" >
                                @csrf
                                
                                <!-- Name Input -->
                                <div class="input-group mb-3">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" aria-describedby="basic-addon1" required autofocus>
                                </div>
                                
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                
                                <!-- Email Input -->
                                <div class="input-group mb-3">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="basic-addon2" required>
                                </div>
                                
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                
                                <!-- Password Input -->
                                <div class="input-group mb-4">
                                    <span class="input-group-addon" id="basic-addon3">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="basic-addon3" required>
                                </div>
                                
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                
                                <!-- Confirm Password Input -->
                                <div class="input-group mb-4">
                                    <span class="input-group-addon" id="basic-addon4">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" aria-describedby="basic-addon4" required>
                                </div>
                                
                                <!-- Register Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-submit">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</x-guest-layout>