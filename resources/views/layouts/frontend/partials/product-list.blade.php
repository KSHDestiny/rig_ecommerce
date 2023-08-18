{{-- <div class="col-sm-9 padding-right">
    <div class="features_items">
        <h2 class="title text-center">Latest Products</h2>
        @foreach($products as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        @if($product->image)
                            <img src="{{ asset('storage/product/'.$product->image) }}" alt="{{ $product->name }}" />
                        @else
                            <img src="{{ asset('img/'.Str::slug($product->name).'.png') }}" alt="{{ $product->name }}" />
                        @endif

                        <h4 class="product-price">
                            {{ number_format($product->price) }} MMK
                        </h4>
                        <p>{{ $product->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart">
                            <i class="ri ri-shopping-cart-line"></i>Add to Cart
                        </a>
                        <a href="#" class="btn btn-default add-to-cart">
                            <i class="ri ri-file-info-line"></i>View Details
                        </a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{ $product->price }} MMK</h2>
                            <p>{{ $product->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart" data-id="{{ $product->id }}">
                                <i class="ri ri-shopping-cart-line"></i>
                                Add to Cart
                            </a>
                            <a href="{{ route('product.details', $product->slug) }}" class="btn btn-default view-details" data-id="{{ $product->id }}">
                                <i class="ri ri-file-info-line"></i>&nbsp;
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li>
                            <a class="custom-fs-14" style="cursor: pointer;">
                                <i class="ri ri-add-box-fill"></i>
                                Add to Whistlist
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> --}}
