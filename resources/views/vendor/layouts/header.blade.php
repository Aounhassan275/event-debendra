<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src=" {{ asset('vendor/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src=" {{ asset('vendor/images/logo.png') }}" alt="site logo" class="dark-logo">
            <img src=" {{ asset('vendor/images/logo-icon.png') }} " alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('vendor.dashboard') }}">
                    <i class="fa-solid fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ Route('vendor.pricing') }}">
                    <i class="fa-solid fa-briefcase"></i>
                    <span>Pricing</span>
                </a>
            </li>
            <li class="{{ Route::is('vendor/gallery*') ? 'active' : '' }}">
                <a href="{{ route('vendor.gallery') }}">
                    <i class="fa-regular fa-image"></i>
                    <span>Gallery</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('vendor.review') }}">
                    <iconify-icon icon="bi:star" class="menu-icon"></iconify-icon>
                    <span>Reviews</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <iconify-icon icon="fa-solid:users" class="menu-icon"></iconify-icon>
                    <span>Membership</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('auth.logout') }}">
                    <iconify-icon icon="mdi:logout" class="menu-icon"></iconify-icon>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
