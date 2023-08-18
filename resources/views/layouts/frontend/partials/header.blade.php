{{-- <header class="sec-header">
    <div class="top-header text-white px-5 py-2 d-flex justify-content-end" style="background-color: #343A40;">
        <span>
            <i class="ri-shut-down-line"></i>
            @auth
            <a href="{{ url('/logout') }}" class="text-white text-decoration-none">LOGOUT</a>
            @else
            <a href="{{ route('login') }}" class="text-white text-decoration-none">LOGIN</a> / <a href="{{ route('register') }}" class="text-white text-decoration-none">REGISTER</a>
            @endauth
        </span>
    </div>

    <div class="middle-header px-5 py-3">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-3 mb-3 mb-lg-0">
                <h1 class="logo">
                    <span class="fw-bold">LOGO</span>
                </h1>
            </div>

            <div class="col-12 col-md-7 mb-4 mb-lg-0">
                <form class="row px-0" action="{{ route('frontend.product-list') }}" method="GET" id="filter_form">
                    @csrf
                    <input type="hidden" name="category" id="category_input" value="{{isset($category) ? $category->slug : ''}}">
                    <input type="hidden" name="brand" id="brand_input" value="{{isset($brand) ? $brand->slug : ''}}">
                      <div class="col-8">
                        <input type="text" class="form-control-plaintext border px-4 custom-py-14 rounded"
                            name="search" value="" placeholder="Search Product Here . . .">
                      </div>
                      <div class="col-4" style="position:relative; right: 38px; top: 4.5px;">
                        <button type="submit" id="search_btn" class="btn btn-dark fs-14 custom-py-9 px-5">Search</button>
                      </div>
                </form>
            </div>

              <div class="col-2 col-md-2 d-flex justify-content-around mb-3 mb-lg-0">
                  <button type="button" class="btn btn-dark position-relative" >
                      <i class="ri-heart-3-line fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        0
                    </span>
                </button>

                <a href="{{ route('cart.list') }}" class="btn btn-dark position-relative add-cart-btn">
                    <i class="ri-shopping-cart-line fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <span class="cart-count">
                            {{ session()->has('cart') && count(session()->get('cart')) > 0 ? count(session()->get('cart')) : 0 }}
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="bottom-header px-5 py-3 bg-dark">
        <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('frontend.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.product-list') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.contact-us') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header> --}}
