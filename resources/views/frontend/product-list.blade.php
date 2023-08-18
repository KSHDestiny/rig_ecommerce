@extends('layouts.frontend.master')

@section('title', 'Product List')

@section('css')
    <style>
        .filter-ttl {
            margin-bottom: 3rem;
        }

        .filter-ttl:before {
            left: 0;
        }

        .filter-icon {
            position: relative;
            top: -.5px;
        }

        .social-button .fa-whatsapp {
            color: lime !important;
        }
    </style>
@endsection

@section('content')
<div class="sec-product-list py-1 py-md-5">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-3">
                <h2 class="cmn-ttl text-uppercase filter-ttl">
                    Filters
                </h2>

                <h6 class="text-secondary text-uppercase fw-bold mb-3">
                    <i class="ri-filter-2-line filter-icon"></i>
                    Categories
                </h6>
                <ul class="list-group rounded-0 mb-5 fs-14">
                    @foreach ($categories as $cate)
                        @php
                            $active = false;
                            if (!is_null($category)) {
                                $active = $category->id == $cate->id;
                            }
                        @endphp

                        @if ($loop->first)
                            <li class="list-group-item px-1 py-0 rounded {{ is_null($category) ? 'bg-dark' : '' }}">
                                <a href="javascript:;"
                                    class="category text-decoration-none {{ !is_null($category) ? 'text-dark' : 'text-light' }}  py-2 px-3 d-flex justify-content-between align-items-center">
                                    All Categories <i class="ri-price-tag-3-fill ri-lg"></i>
                                </a>
                            </li>
                        @endif
                        <li class="list-group-item px-1 py-0 rounded {{ $active ? 'bg-dark' : '' }}">
                            <a href="javascript:;" id="{{ $cate->id }}" data-category-slug="{{ $cate->slug }}"
                                class="category text-decoration-none {{ $active ? 'text-light' : 'text-dark' }} py-2 px-3 d-flex justify-content-between align-items-center">
                                {{ $cate->name }}
                                @if ($cate->products_count > 0)
                                    <span class="badge bg-danger rounded-pill">{{ $cate->products_count }}</span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>

                <h6 class="text-secondary text-uppercase fw-bold mb-3">
                    <i class="ri-filter-2-line filter-icon"></i>
                    Brands
                <h6>
                <ul class="row w-100 p-0 m-0 list-unstyled fs-14">
                    @foreach ($brands as $data)
                        @php
                            $active = false;
                            if (!is_null($brand)) {
                                $active = $brand->id == $data->id;
                            }
                        @endphp

                        @if ($loop->first)
                            <li class="col-12 px-1 py-0 rounded {{ is_null($brand) ? 'bg-dark' : '' }}">
                                <a href="javascript:;"
                                    class="brand-link text-decoration-none {{ !is_null($brand) ? 'text-dark' : 'text-light' }}  py-2 px-3 d-flex justify-content-between align-items-center">
                                    All Brands
                                </a>
                            </li>
                        @endif
                        <li class="col-12 px-1 py-0 rounded {{ $active ? 'bg-dark' : '' }}">
                            <a href="javascript:;" id="{{ $data->id }}"
                                data-brand-slug="{{ $data->slug }}"
                                class="brand-link text-decoration-none {{ $active ? 'text-light' : 'text-dark' }} py-2 px-3 d-flex justify-content-between align-items-center">
                                {{ $data->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-12 col-lg-9">
                <div class="row px-5">
                    <h2 class="cmn-ttl text-uppercase mb-4">
                        Available Products
                    </h2>
                    @if (isset($search))
                        <span>
                            Search For : {{ $search }}
                        </span>
                    @endif
                    @foreach ($products as $i => $product)
                        @include('frontend.components.product_card', [
                            'card_class' => 'col-12 col-sm-6 col-lg-4 mt-4',
                        ])
                    @endforeach
                </div>
            </div><!-- /.col-md-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.sec-product-list -->
@endsection
