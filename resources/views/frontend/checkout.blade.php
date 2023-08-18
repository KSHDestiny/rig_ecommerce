@extends('layouts.frontend.master')

@section('title', 'Checkout')

@section('css')
<style>
    #checkoutForm label {
        font-size: 0.875rem;
    }

    #checkoutForm input,
    textarea {
        font-size: 0.813rem !important;
    }

    #checkoutForm .form-floating>label {
        left: 12px;
    }

    textarea {
        height: 100px !important;
        resize: none;
    }
</style>
@endsection

@section('content')
<div class="sec-auth py-5">
    <div class="container">
        <form action="{{ route('checkout.submit') }}" method="POST" id="checkoutForm">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <h2 class="cmn-ttl text-uppercase mb-5">
                            Shopper Information
                        </h2>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-0" id="name"
                            name="name" placeholder="Enter Your Name" value="{{ auth()->user()->name ?? '' }}">
                            <label for="floatingInput">Username <b class="text-danger">*</b></label>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-0" id="email"
                            name="email" placeholder="Enter Your Email Address" value="{{ auth()->user()->email ?? '' }}">
                            <label for="floatingInput">Email Address <b class="text-danger">*</b></label>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-0" id="phone"
                            name="phone" placeholder="Enter Your Phone Number"
                            value="{{ auth()->user()->phone ?? '' }}">
                            <label for="floatingInput">Phone <b class="text-danger">*</b></label>
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control rounded-0" placeholder="Enter Your Address" id="address" name="address">{{ auth()->user()->address ?? '' }}</textarea>
                            <label for="address">Address <b class="text-danger">*</b></label>
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>

                    </div>
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                    <div class="row">
                        <h2 class="cmn-ttl text-uppercase mb-5">
                            Review Your Order
                        </h2>

                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="text-center align-middle">
                                        <th width="20%">ITEM</th>
                                        <th>PRICE</th>
                                        <th>QTY</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total_amt = 0 @endphp
                                    @foreach($cartList as $key => $item)
                                    @php $total_amt += $item['price'] * $item['qty'] @endphp
                                    <tr class="text-center align-middle">
                                        <input type="hidden" class="product_id" value="{{ $item['id'] }}">

                                        <td>
                                            <img src="{{ asset('uploads/products/'.$item['image']) }}" width="80">
                                            <p class="my-2">{{ $item['name'] }}</p>
                                        </td>

                                        <td>
                                            <span>{{ number_format($item['price']) }}</span>
                                            <small>MMK</small>
                                        </td>

                                        <td>
                                            {{ $item['qty'] }}
                                        </td>

                                        <td>
                                            {{ number_format($item['qty'] * $item['price']) }}
                                            <small>MMK</small>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    @if($coupon)
                                        <tr class="text-center align-middle">
                                            <td class="py-4" colspan="2"></td>
                                            <td class="py-4 text-uppercase">Coupon Discount</td>
                                            <td class="py-4">- {{ $coupon->discount}} <small>{{ $coupon->type == "amount" ? "MMK" : "%"}}</small></td>
                                        </tr>
                                        @php
                                            if($coupon->type == "percent"){
                                                $discount = $total_amt * $coupon->discount / 100;
                                                $total_amt = $total_amt - $discount;
                                            }else{
                                                $total_amt = $total_amt - $coupon->discount;
                                            }
                                        @endphp
                                    @endif
                                    <tr class="text-center align-middle">
                                        <th class="py-4" colspan="2"></th>
                                        <th class="py-4 text-uppercase">Grand Total</th>
                                        <th class="py-4">{{ number_format($total_amt) }} <small>MMK</small></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <a href="{{ route('frontend.product-list') }}" class="btn btn-outline-dark rounded-0  custom-py-12 text-uppercase fs-13 fw-bold">
                                &xlarr;&nbsp;
                                Continue Shopping
                            </a>
                            <button type="submit" class="btn btn-dark rounded-0 custom-py-12 text-uppercase fs-13 fw-bold">
                                <input type="hidden" name="total_amt" value="{{ $total_amt }}">
                                <input type="hidden" name="coupon_code" value="{{ $coupon->coupon_code ?? '' }}">
                                Checkout&nbsp;&xrarr;
                            </button>
                        </div>
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </form>
    </div><!-- /.container -->
</div><!-- /.sec-product-list -->
@endsection
