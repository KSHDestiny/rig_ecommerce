<div>
    <a href="{{ route('wishlist.show') }}" class="btn position-relative">
        <i class="ri-heart-3-line fs-5"></i>
        <span class="position-absolute top-0 end-1 translate-middle badge rounded-pill bg-danger">
            @auth
                {{ auth()->user()->getWishlistCount() }}
            @else
                0
            @endauth
        </span>
    </a>
    <a href="{{ route('cart.list') }}" class="btn position-relative me-2">
        <i class="ri-shopping-cart-line fs-5"></i>
        <span class="position-absolute top-0 end-1 translate-middle badge rounded-pill bg-danger cart-count">
            {{ session()->has('cart') && count(session()->get('cart')) > 0 ? count(session()->get('cart')) : 0 }}
        </span>
    </a>
</div>
<div>
    @auth
        <a href="{{ url('/logout') }}" class="text-decoration-none btn btn-dark rounded-pill ">
            <span class="d-none d-md-inline">LOGOUT</span>
            <i class="ri-logout-box-r-line"></i>
        </a>
        {{-- <form action="{{ route('logout') }}" method="POST" id="logoutFunction" class="visually-hidden">
            @csrf
        </form>
        <a href="javascript:;" onclick="document.getElementById('logoutFunction').submit()" class="text-decoration-none btn btn-dark rounded-pill ">
            <span class="d-none d-md-inline">LOGOUT</span>
            <i class="ri-logout-box-r-line"></i>
        </a> --}}
    @else
        <a href="{{ route('login') }}" class="text-dark text-decoration-none">LOGIN</a> &nbsp;/&nbsp;
        <a href="{{ route('login') }}" class="text-dark text-decoration-none">REGISTER</a>
    @endauth
</div>
