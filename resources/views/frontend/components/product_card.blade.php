<div class="{{ $card_class }} px-1 px-sm-2 px-md-3 mt-0 mb-5">
    <div class="product-blk shadow-sm rounded h-100 d-flex flex-column justify-content-between">

        <a class="img-bx" data-bs-toggle="modal" data-bs-target="#product_detail{{ $product->id }}">
            <img class="img-fluid" src='{{ asset("/uploads/products/$product->image") }}' alt="">
        </a>

        <div class="border-1 border-top pt-3">
            <div class="txt-blk">
                <div class="text-center">
                    <h6 class="fw-bold fs-6 mb-4">{{ $product->name }}</h6>
                    <span class="product-summary fs-13 text-secondary"> {!! $product->summary !!} </span>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                    @if (isset($product->discount))
                        <span class="fs-13 fw-bold text-decoration-line-through text-secondary">{{ number_format($product->price) }} <small class="fs-13 fw-normal">MMK</small></span>
                        <span class="fs-14 fw-bold">{{ number_format($product->price - $product->discount) }} <small class="fs-13 fw-normal">MMK</small></span>
                    @else
                        <span class="fs-14 fw-bold">{{ number_format($product->price) }} <small class="fs-13 fw-normal">MMK</small></span>
                    @endif
                </div>
            </div><!-- /.txt-blk -->

            <div class="link-blk px-2">
                <div class="row align-items-center">
                    <div class="col-md-6 pt-3 cart_quantity_button d-flex justify-content-center align-items-center">
                        <a class="text-decoration-none cart_quantity_down update-cart" href="javascript:;">
                            <i class="ri-subtract-fill"></i>
                        </a>
                        <input class="cart_quantity_input qty text-center mx-2 rounded-0 border item_qty" type="text"
                        name="quantity" value="1" autocomplete="off" size="2" style="width: 80px;">
                        <a class="text-decoration-none cart_quantity_up update-cart" href="javascript:;">
                            <i class="ri-add-fill"></i>
                        </a>
                    </div>

                    <div class="col-md-6 text-end pt-3">
                        <div class="btn-group w-100" role="group" aria-label="Basic outlined example">
                            <a herf="javascript:;" class="btn btn-sm btn-dark add-to-cart"
                                data-id="{{ $product->id }}">
                                <i class="ri-shopping-cart-line"></i>
                            </a>
                            @auth
                                <form action="{{ route('wishlist.submit') }}" method="POST"
                                    id="wishlistForm{{ $product->id }}" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                </form>
                                <button type="button" class="btn btn-sm btn-outline-danger"
                                    onclick="document.getElementById('wishlistForm{{ $product->id }}').submit()">
                                    <i class="{{ $product->isWishlistProduct(auth()->id(), $product->id) }}"></i>
                                </button>
                            @else
                                <a href="javascript:;" class="btn btn-sm btn-outline-dark"
                                    onclick="toastr.info('You Need to Login First &nbsp;<i class=\'fa fa-unlock-alt\'></i>', 'INFO', {
                                    closeButton: true,
                                    progressBar: true,
                                    positionClass: 'toast-bottom-right'
                                });">
                                    <i class="ri-heart-3-line"></i>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div><!-- /.link-blk -->
        </div>

    </div><!-- /.product-blk -->
</div>

<div class="modal fade" tabindex="-1" id="product_detail{{ $product->id }}">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body row px-5">
                <div class="col-lg-5">
                    <img class="img-fluid" src='{{ asset("/uploads/products/$product->image") }}' alt="{{$product->name}}">
                </div>

                <div class="col-lg-7 pb-5 px-0 px-lg-5">
                    <h5 class="text-warning pt-2 mb-3">{{ $product->category->name }}</h5>

                    <h1 class="fw-bold fs-4 mb-3">{{ $product->name }}</h1>

                    <h4 class="fw-bold fs-6 mb-5">
                        {{ number_format($product->price) }} MMK
                    </h4>

                    <div class="txt-blk mb-4">
                        <b>Summary</b>
                        <hr class="mt-1">
                        <p class="mb-1 fs-14">
                            <span class="fs-13">{!! $product->summary !!}</span>
                        </p>
                    </div>

                    <div class="txt-blk mb-4">
                        <b>Description</b>
                        <hr class="mt-1">
                        <p class="mb-1 fs-14" style="text-align: justify;">
                            <span class="fs-13">{!! $product->description !!}</span>
                        </p>
                    </div>
                    <div class="link-blk mb-4">
                        <div class="row align-items-center">
                            <div
                                class="col-sm-5 pt-3 cart_quantity_button d-flex justify-content-center align-items-center">
                                <a class="text-decoration-none cart_quantity_down update-cart" href="javascript:;">
                                    <i class="ri-subtract-fill"></i>
                                </a>
                                <input class="cart_quantity_input qty text-center mx-2 rounded-0 border item_qty"
                                    type="text" name="quantity" value="1" autocomplete="off" size="2"
                                    style="width: 120px;">
                                <a class="text-decoration-none cart_quantity_up update-cart" href="javascript:;">
                                    <i class="ri-add-fill"></i>
                                </a>
                            </div>

                            <div class="col-sm-5 text-end pt-3">
                                <div class="btn-group w-100" role="group" aria-label="Basic outlined example">
                                    <a herf="javascript:;" class="btn btn-sm btn-dark add-to-cart"
                                        data-id="{{ $product->id }}">
                                        <i class="ri-shopping-cart-line"></i>&nbsp;
                                        Add to Cart
                                    </a>
                                    @auth
                                        <form action="{{ route('wishlist.submit') }}" method="POST"
                                            id="wishlistForm{{ $product->id }}" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        </form>
                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                            onclick="document.getElementById('wishlistForm{{ $product->id }}').submit()">
                                            <i class="{{ $product->isWishlistProduct(auth()->id(), $product->id) }}"></i>
                                        </button>
                                    @else
                                        <a href="javascript:;" class="btn btn-sm btn-outline-dark"
                                            onclick="toastr.info('You Need to Login First &nbsp;<i class=\'fa fa-unlock-alt\'></i>', 'INFO', {
                                            closeButton: true,
                                            progressBar: true,
                                            positionClass: 'toast-bottom-right'
                                        });">
                                            <i class="ri-heart-3-line"></i>
                                        </a>
                                    @endauth
                                </div>
                            </div>

                            <div class="col-sm-2 d-flex pt-4">
                                     @php
                                        $shareButtons = \Share::page(route('product.share', $product->id))
                                        ->whatsapp()
                                        ->facebook();

                                    @endphp
                                    {!! $shareButtons !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
