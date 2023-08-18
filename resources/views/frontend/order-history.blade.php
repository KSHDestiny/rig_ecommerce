@extends('layouts.frontend.master')

@section('title', "Order History")

@section('css')
<style>
    .cmn-ttl:before {
        left: 0;
    }
</style>
@endsection

@section('content')

<div class="container py-5">
    <h2 class="cmn-ttl text-uppercase my-4 filter-ttl">
        {{Auth::user()->name}}'s Order History
    </h2>
    @if(! empty($order))
    <div class="row">
        <div class="col-lg-3">
            <h6 class="text-secondary text-center">Order Codes</h6>
            <ul class="list-group rounded-0">
                @foreach($orders as $key => $val)
                    @php
                        $active = false;
                        if (!is_null($order)) {
                            $active = $order->id == $val->id;
                        }
                    @endphp
                    <li class="list-group-item p-0 rounded {{ $active ? 'bg-dark' : '' }}">
                        <a href="{{ route('frontend.order-history', $val->order_code)}}" id="{{ $val->id }}"
                            class="order text-decoration-none {{ $active ? 'text-light' : 'text-dark' }} py-2 px-3 d-flex justify-content-between align-items-center">
                            {{ $val->order_code }}
                            <!-- <span class="badge bg-danger rounded-pill">{{ $val->created_at->toFormattedDateString() }}</span> -->
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class=" d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl fw-bold">
                            Order Details
                        </p>
                        <span class="text-secondary">{{ $order->created_at->toFormattedDateString() }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between align-items-center mb-4">
                        <div class="col-md-6 d-flex">
                            <span class="h6">
                                <img src="{{asset('frontend/img/common/img_rig_logo.jpeg')}}" alt="RIG Logo" style="width:50px;">
                                RIG ECOMMERCE
                                <span class="d-block" style="font-size: 0.75rem; font-weight: 400;">
                                    Connecting Customers, Creating Happiness
                                </span>
                            </span>
                        </div>
                        @php
                            $orderStatus = config('helper.order_status');
                        @endphp
                        <div class="d-flex justify-content-end">
                            @if ($order->order_status == 0)
                                <span class="badge rounded-pill text-bg-danger py-2 px-2" style="font-size: 0.75rem;">
                                    <i class="ri-loader-line ri-lg"></i>&nbsp;
                                    {{ $orderStatus[0] }}
                                </span>
                            @elseif ($order->order_status == 1)
                                <span class="badge rounded-pill text-bg-warning py-2 px-2" style="font-size: 0.75rem;">
                                    <i class="ri-loader-2-line ri-lg"></i>&nbsp;
                                    {{ $orderStatus[1] }}
                                </span>
                            @else
                                <span class="badge rounded-pill text-bg-success py-2 px-2" style="font-size: 0.75rem;">
                                    <i class="ri-check-line ri-lg"></i>
                                    {{ $orderStatus[2] }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row justify-content-between mb-4">
                        <div class="col-6">
                            From
                            <address class="mb-2">
                                <strong>RIG Ecommerce Store</strong><br>
                                123 Wakanda City<br>
                                Phone: +959 123123123<br>
                                Email: info@example.com
                            </address>
                            <span class="bg-warning rounded-0 py-2 px-2">
                                {{ $order->order_code }}
                            </span>
                        </div>

                        <div class="col-6 text-end">
                            <span>To</span>
                            <address class="mb-2">
                                <strong>{{ $order->user->name }}</strong><br>
                                {{ $order->user->address }}<br>
                                Phone: {{ $order->user->phone }}<br>
                                Email: {{ $order->user->email }}
                            </address>
                            <span class="bg-warning rounded-0 py-2 px-2">
                                <i class="far fa-credit-card mr-2"></i>
                                {{ $order->payment ?? 'Cash On Delivery' }}
                                </button>
                        </div>
                    </div>

                    <table class="table table-bordereless">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/products/' . $item->product->image) }}"
                                            width="80">
                                    </td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ number_format($item->price) }} MMK</td>
                                    <td>{{ number_format($item->price * $item->qty) }} MMK</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            @if ($order->coupon != null)
                                <tr class="text-center text-danger">
                                    <th colspan="4"></th>
                                    <th>Coupon Discount</th>
                                    <th>{{ $order->coupon->discount . ($order->coupon->type == 'percent' ? '%' : 'mmk') ?? ' ' }}
                                    </th>
                                </tr>
                            @else
                            @endif
                            <tr class="text-center text-danger">
                                <th colspan="4"></th>
                                <th>Grand Total</th>
                                <th>{{ number_format($order->total_amt) }} MMK</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-dark">
                        <i class="ri-arrow-left-double-line ri-lg"></i>&nbsp;
                        B A C K
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-12 text-danger text-uppercase text-center">
            <p class="font-weight-bold py-4"><b>EMPTY ORDER HISTORY</b></p>
        </div>
    </div>
    @endif
</div>

@endsection
