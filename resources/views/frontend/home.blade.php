@extends('layouts.frontend.master')

@section('title', 'Home')

@section('content')
<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @for ($i = 0; $i < count($banners); $i++)
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{$i}}" class="{{$i == 0 ? 'active' : ''}}"></button>
        @endfor
    </div>
    <div class="carousel-inner">
        @foreach ($banners as $banner)
            <div class="carousel-item {{$loop->first ? 'active' : ''}}" data-bs-interval="5000">
                <img src='{{asset("uploads/banners/$banner->image")}}' class="d-block w-100 caro-img">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span an class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="sec-product-list">
    <div class="container">
        <div class="slider" style="--slide-count:{{count($brands)}}">
            <div class="slide-track">
                @for ($i = 0; $i < 2; $i++)
                    @foreach ($brands as $val)
                        <a href="javascript:;" class="slide brand-link" data-brand-slug="{{$val->slug}}">
                            <img src='{{asset("uploads/brands/$val->image")}}' class="brand-img" alt="" />
                        </a>
                    @endforeach
                @endfor
            </div>
        </div>
        <div class="row g-4 py-5 my-5">
            <h2 class="cmn-ttl text-uppercase mb-5">
                Latest Products
            </h2>
            @php
                $screen_sm = isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'Mobi');
                $screen_md = isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'Tablet') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false);
                if ($screen_sm) {
                    $products = $products->take(2);
                }elseif($screen_md) {
                    $products = $products->take(3);
                }
            @endphp
            @foreach($products as $product)
                @include('frontend.components.product_card',[
                    "card_class" => "col-6 col-md-4 col-xl-3"
                ])
            @endforeach
        </div><!-- /.row -->

    </div><!-- /.container -->
</div><!-- /.sec-product-list -->
@endsection
