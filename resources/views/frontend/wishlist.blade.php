@extends('layouts.frontend.master')

@section('title', 'Wishlist')

@section('content')
<div class="sec-product-list py-5">
    <div class="container py-4">
        <div class="row g-4">
            <h2 class="cmn-ttl text-uppercase mb-5">
                Wishlist
            </h2>

            {{-- <form action="{{ route('cart.update') }}" method="POST">
            @csrf --}}
                <table class="table mb-5" id="cartListTable">
                    <thead>
                        <tr class="text-center align-middle">
                            <th>#</th>
                            <th>Product</th>
                            <th>Unit Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($wishlist as $key => $item)
                            <tr class="text-center align-middle">
                                <td>{{ $loop->index + 1 }}</td>

                                <td>
                                    <img src="{{ asset('uploads/products/'.$item->product->image) }}" width="80" class="img-fluid">
                                    <p class="my-2">
                                        {{ $item->product->name }}
                                    </p>
                                </td>

                                <td>
                                    {{ number_format($item->product->price) }} <small>MMK</small>
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <a herf="javascript:;" class="btn btn-sm btn-dark add-to-cart"
                                        data-id="{{ $item->product->id }}" title="Add to Cart">
                                            <i class="ri-shopping-cart-line"></i>
                                        </a>
                                        <a href="{{ route('wishlist.remove', $item->product->id) }}" class="btn btn-sm btn-outline-danger" title="Remove">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center align-middle">
                                <td class="fw-bold text-danger text-center py-5" colspan="6">EMPTY WISHLIST</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!-- /#cartListTable -->
            {{-- </form> --}}

        </div><!-- /.row -->
    </div>
</div>
@endsection
