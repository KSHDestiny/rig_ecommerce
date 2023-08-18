<nav class="navbar fixed-top border border-bottom-1 top-nav">
    <div class="container">
        <div class="d-flex flex-column flex-sm-row align-items-center logo-container">
            <a href="{{ route('frontend.home') }}">
                <img src="{{asset('frontend/img/common/img_rig_logo.jpeg')}}" alt="" class="logo">
            </a>
            <div class="d-flex d-md-none align-items-center justify-content-between w-100">
                @include('layouts.frontend.partials.nav_tabs')
            </div>
        </div>
        <form class="position-relative search-form"  action="{{ route('frontend.product-list') }}" method="GET" id="filter_form">
            {{-- @csrf --}}
            <input type="hidden" name="brand" id="brand_input" value="{{isset($brand) ? $brand->slug  : ''}}">
            <input type="hidden" name="category" id="category_input" value="{{isset($category) ? $category->slug : ''}}">
            <input type="search" name="search" id="search_input" class="form-control" placeholder="Search Product . . ." value="{{isset($search) ? $search : ''}}">
            <div class="position-absolute top-0 search-btn">
                <button class="btn btn-dark" type="submit" id="search_btn" >
                    <i class="ri-search-line"></i>
                </button>
            </div>
        </form>
        <div class="d-none d-md-flex align-items-center">
            @include('layouts.frontend.partials.nav_tabs')
        </div>
    </div>
</nav>
<nav class="navbar fixed-top py-0 d-flex justify-content-center bot-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-uppercase text-light {{ request()->segment(1) == "" ? 'active' : ''}}" href="{{ route('frontend.home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase text-light {{ request()->segment(1) == "product-list" ? 'active' : ''}}" href="{{ route('frontend.product-list') }}">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase text-light {{ request()->segment(1) == "contact" ? 'active' : ''}}" href="{{ route('frontend.contact-us') }}">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase text-light {{ request()->segment(1) == "blog" ? 'active' : ''}}" href="{{ route('frontend.blog') }}">Blog</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase text-light {{ request()->segment(1) == "about" ? 'active' : ''}}" href="{{ route('frontend.about') }}">About</a>
        </li>

    </ul>
</nav>
