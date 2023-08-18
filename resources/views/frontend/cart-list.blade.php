@extends('layouts.frontend.master')

@section('title', 'Cart')

@section('css')
<style>
    .cmn-ttl:before {
        left: 0;
    }
</style>
@endsection

@section('content')
<div class="sec-product-list py-5">
    <div class="container">
        <div class="row g-4 py-4">
            <div class="d-flex justify-content-between mb-4">
                <h2 class="cmn-ttl text-uppercase">
                    @guest
                        Cart List
                    @else
                        {{Auth::user()->name}}'s Cart List
                    @endguest
                </h2>
                @auth
                <a href="{{ route('frontend.order-history')}}" class="btn btn-info my-2 rounded-0">
                    <i class="ri-map-pin-time-line"></i>
                    &nbsp;Order Histories
                </a>
                @endauth
            </div>

            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
                <table class="table mb-5" id="cartListTable">
                    <thead>
                        <tr class="text-center align-middle">
                            <th>#</th>
                            <th>Product</th>
                            <th>Unit Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>
                                {{-- <a href="" class="btn btn-sm btn-danger rounded-0 disabled" > --}}
                                Delete Cart
                                {{-- </a> --}}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $total_amt = 0 @endphp

                    @if(session()->has('cart'))
                        {{-- @php dd(session()->all()) @endphp --}}
                        @forelse($cartList as $key => $item)
                        @php $total_amt += $item['price'] * $item['qty'] @endphp
                        <tr class="text-center align-middle">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <img src="{{ asset('uploads/products/'.$item['image']) }}" width="80" class="img-fluid">
                                <p class="mt-3 mb-0">
                                    <input type="hidden" name="product_ids[]" value="{{ $item['id'] }}">
                                    {{ $item['name'] }}
                                </p>
                            </td>

                                    <td>
                                        {{ number_format($item['price']) }} <small>MMK</small>
                                    </td>
                                    <td class="cart_quantity_button">
                                        <a class="text-decoration-none cart_quantity_down update-cart"
                                            href="javascript:;">
                                            <i class="ri-subtract-fill"></i>
                                        </a>
                                        <input
                                            class="cart_quantity_input qty text-center mx-2 rounded-0 border item_qty"
                                            type="text" name="qty[]" value="{{ $item['qty'] }}" autocomplete="off"
                                            size="2" style="width: 65px;">
                                        <a class="text-decoration-none cart_quantity_up update-cart"
                                            href="javascript:;">
                                            <i class="ri-add-fill"></i>
                                        </a>
                                    </td>
                                    <td>{{ number_format($item['qty'] * $item['price']) }} <small>MMK</small></td>
                                    <td>
                                        <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-sm btn-danger"
                                            title="Cancel">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center align-middle">
                                    <td class="fw-bold text-danger text-center py-5" colspan="6">EMPTY CART</td>
                                </tr>
                            @endforelse
                        @else
                            <tr class="text-center align-middle">
                                <td class="fw-bold text-danger text-center py-5" colspan="6">EMPTY CART</td>
                            </tr>
                        @endif
                    </tbody>

                    <tfoot>
                        <tr class="text-center align-middle">
                            <td colspan="5"></td>
                            <td>
                                <button type="submit"
                                    class="btn btn-outline-dark rounded-0 fs-13 py-2 fw-bold text-uppercase">
                                    Update Cart
                                </button>
                            </td>
                        </tr>
                    </tfoot>
                </table><!-- /#cartListTable -->
            </form>

            <div class="col-md-6 mb-5">
                <form action="{{ route('cart.list') }}" method="GET">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="coupon" type="text" class="form-control fs-14 border-warning"
                            placeholder="Enter Coupon Code . . .">
                        <button type="submit" class="btn btn-warning fs-14 custom-py-14 fw-bold">
                            <i class="ri-gift-line"></i>
                            &nbsp;Apply Coupon
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-6 mb-5 text-start text-md-end">
                <table class="table table-borderless">
                    <tr class="fw-bold fs-6">
                        <td>Total</td>
                        <td>{{ number_format($total_amt) }} <small>MMK</small></td>
                    </tr>
                    @if ($coupon)
                        <tr class="fw-bold fs-6">
                            <td>Discount</td>
                            <td>- {{ $coupon->discount }} <small>{{ $coupon->type == 'amount' ? 'MMK' : '%' }}</small>
                            </td>
                        </tr>
                    @endif


                    <tr class="fw-bold fs-6 border-top">
                        <td>Grand Total</td>
                        @if ($coupon)
                            @php
                                if ($coupon->type == 'percent') {
                                    $discount = ($total_amt * $coupon->discount) / 100;
                                    $grand_total = $total_amt - $discount;
                                } else {
                                    $grand_total = $total_amt - $coupon->discount;
                                }
                            @endphp
                            <td>{{ number_format($grand_total) }} <small>MMK</small></td>
                        @else
                            <td>{{ number_format($total_amt) }} <small>MMK</small></td>
                        @endif
                    </tr>
                </table>
            </div>

            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <a href="{{ route('frontend.product-list') }}"
                    class="btn btn-outline-dark rounded-0 fs-14 fw-bold text-uppercase custom-py-12 text-uppercase fs-13 fw-bold">
                    <i class="ri-arrow-left-double-fill ri-lg"></i>
                    &nbsp;Continue Shopping
                </a>

                <a class="btn btn-dark rounded-0 custom-py-12 text-uppercase fs-13 fw-bold"
                    href="@guest {{ route('login') }} @else {{ route('checkout.show') }} @endguest">
                    Proceed to Checkout&nbsp;
                    <i class="ri-arrow-right-double-fill ri-lg"></i>
                </a>
            </div>
        </div><!-- /.row -->
    </div>
</div>
@endsection
