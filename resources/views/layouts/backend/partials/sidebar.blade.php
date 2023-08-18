<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
            SHOP
        </h4>
        <ul class="nav flex-column">
            {{-- <li class="nav-item">
                <a class="nav-link @yield('dashboard-active')" href="#">
                    <span data-feather="airplay"></span>
                    Dashboard
                </a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link @yield('banner-active')" href="{{ route('admin.banner.index') }}">
                    <span data-feather="airplay"></span>
                    Web Banner
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('brand-active')" href="{{ route('admin.brand.index') }}">
                    <span data-feather="grid"></span>
                    Brands
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('category-active')" href="{{ route('admin.category.index') }}">
                    <span data-feather="align-left"></span>
                    Categories
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('product-active')" href="{{ route('admin.product.index') }}">
                    <span data-feather="box"></span>
                    Products
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('order-active')" href="{{ route('admin.order.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Orders
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('blog-active')" href="{{ route('admin.blog.index') }}">
                    <span data-feather="feather"></span>
                    Blogs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('coupon-active')" href="{{ route('admin.coupon.index') }}">
                    <span data-feather="gift"></span>
                    Coupons
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('message-active')" href="{{ route('admin.message.index') }}">
                    <span data-feather="message-square"></span>
                    Messages
                </a>
            </li>
        </ul>

        <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            GENERAL
        </h4>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link @yield('user-active')" href="{{ route('admin.user.index') }}">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
        </ul>

        <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            SETTINGS
        </h4>
        <ul class="nav flex-column mb-2">
            {{--
            <li class="nav-item">
                <a class="nav-link @yield('profile-active')" href="">
                    <span data-feather="user"></span>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('password-active')" href="#">
                    <span data-feather="lock"></span>
                    Change Password
                </a>
            </li>
            --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout') }}">
                    <span data-feather="log-out"></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
