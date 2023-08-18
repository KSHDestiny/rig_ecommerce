@extends('layouts.backend.master')

@section('order-active', 'sidebar-active')

@section('css')
<style>
    span {
        -webkit-print-color-adjust: exact !important;
    }
</style>
@endsection

@section('title', 'Order List')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
        <h6 class="h6 mb-0">Order Management</h1>
    </div>

    <div class="row mb-5">
        <div class="table-responsive">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <p class="mb-0 py-1 card-ttl fw-bold">
                                Order Details
                            </p>
                        </div>
                    </div>
                    <div class="card-body printContent">
                        <div class="row justify-content-between align-items-center mb-4">
                            <div class="col-md-6 d-flex">
                                <span class="h6">
                                    <img src="{{asset('frontend/img/common/img_rig_logo.jpeg')}}" alt="RIG Logo" style="width:50px;">
                                    RIG ECOMMERCE
                                    <span class="d-block mt-2" style="font-size: 0.75rem; font-weight: 400;">
                                        Connecting Customers, Creating Happiness
                                    </span>
                                </span>
                            </div>

                            <div class="mr-3" style="margin-left: 30px;">
                                @if ($order->order_status == 0)
                                    <span class="border-0 badge badge-pill badge-warning py-2 px-2 text-uppercase" style="font-size: 0.75rem;">
                                        <i class="fas fa-spinner"></i>&nbsp;
                                        {{ $orderStatus[0] }}
                                    </span>
                                @elseif ($order->order_status == 1)
                                    <span class="border-0 badge badge-pill badge-primary py-2 px-2 text-uppercase" style="font-size: 0.75rem;">
                                        <i class="fas fa-spinner"></i>&nbsp;
                                        {{ $orderStatus[1] }}
                                    </span>
                                @elseif ($order->order_status == 2)
                                    <span class="border-0 badge badge-pill badge-success py-2 px-2 text-uppercase" style="font-size: 0.75rem;">
                                        {{ $orderStatus[2] }}
                                    </span>
                                @else
                                    <span class="border-0 badge badge-pill badge-danger py-2 px-2 text-uppercase" style="font-size: 0.75rem;">
                                        {{ $orderStatus[3] }}
                                    </span>
                                @endif
                            </div>
                        </div><!-- End of 1st row -->

                        <div class="row justify-content-between mb-4">
                            <div class="col-6">
                                From
                                <address class="mb-3">
                                    <strong>RIG Ecommerce</strong><br>
                                    No. 801, Kan Yeik Mon Condo, Hlaing Township, Yangon, Myanmar<br>
                                    Phone: +95 9 953 933826<br>
                                    Email: services@rig-info.com
                                </address>
                                <span class="bg-warning rounded-0 py-2 px-2 mt-3">
                                    {{ $order->order_code }}
                                </span>
                            </div>

                            <div class="col-6 text-right">
                                <span>To</span>
                                <address class="mb-3">
                                    <strong>{{ $order->user->name }}</strong><br>
                                    {{ $order->user->address }}<br>
                                    Phone: {{ $order->user->phone }}<br>
                                    Email: {{ $order->user->email }}
                                </address>
                                <span class="bg-warning rounded-0 py-2 px-2 border-0">
                                    <i class="far fa-credit-card mr-2"></i>
                                    {{ $order->payment ?? 'Cash On Delivery' }}
                                </span>
                            </div>
                        </div><!-- End of 2nd Row -->

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
                        <a href="{{ route('admin.order.index') }}" class="btn btn-sm btn-outline-primary rounded-5">
                            <i class="fa fa-arrow-circle-left"></i>&nbsp;
                            B A C K
                        </a>
                        <a href="javascript:;" class="btn btn-primary rounded-5 float-right px-4" id="printBtn">
                            <i class="fas fa-print"></i>&nbsp;
                            Print
                        </a>
                    </div><!-- End of card-footer -->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#printBtn').click(function(){
            var printContent    = $('.printContent').html();
            var originalContent = $('body').html();

            $('body').empty().html(printContent);
            window.print();

            $('body').html(originalContent);
        })
    })
</script>
@endsection
