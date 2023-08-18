@extends('layouts.backend.master')

@section('order-active', 'sidebar-active')

@section('title', 'Order List')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
        <h6 class="h6 mb-0">Order Management</h1>

        {{--
        <form action="{{ route('admin.category.index') }}" method="GET">
            <div class="input-group">
                <p class="mb-0 me-2" style="margin-top: 5px;">
                    Search Key : <span class="text-danger">{{ request('search') }}</span>&nbsp;
                </p>
                <input type="text" class="search-input form-control form-control-sm rounded-0 border-dark"
                placeholder="Search by Category Name . . ."
                style="width: 300px" name="search" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-dark btn-sm rounded-0" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        --}}
    </div>

    <div class="row">
        <div class="w-100 mb-5">
            <div class="col-md-12">
                <div class="card" style="border-radius:10px;">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 py-1 card-ttl fw-bold">
                                Order List Table
                                <a href="#" class="ml-1">
                                    ( <i class="fa fa-database"></i> <span class="count">{{ $orders->total() }}</span> )
                                </a>
                            </p>
                        </div>
                    </div><!-- /.card-header -->

                    <div class="card-body">
                        <table class="table table-bordered" id="orderListTable">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Ordered Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($orders as $order)
                                <tr class="text-center align-middle">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $order->order_code }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->user->phone }}</td>
                                    <td>{{ number_format($order->total_amt) }} <small>MMK</small></td>
                                    <td>
                                        <div class="btn-group" data-id="{{$order->id}}">
                                            <button type="button" class="btn btn-sm {{$order->checkOrderStatus()}} rounded-0 dropdown-toggle text-uppercase"
                                            data-toggle="dropdown" id="dropdown_toggle{{$order->id}}">
                                                @if($order->order_status == 0)
                                                    {{ $orderStatus[0] }}
                                                @elseif($order->order_status == 1)
                                                    {{ $orderStatus[1] }}
                                                @elseif($order->order_status == 2)
                                                    {{ $orderStatus[2] }}
                                                @else
                                                    {{ $orderStatus[3] }}
                                                @endif
                                            </button>
                                            <div class="dropdown-menu text-uppercase">
                                                <a class="dropdown-item" style="font-size: 13px;" href="javascript:;" data-status="0">
                                                    Pending
                                                </a>
                                                <a class="dropdown-item" style="font-size: 13px;" href="javascript:;" data-status="1">
                                                    Processing
                                                </a>
                                                <a class="dropdown-item" style="font-size: 13px;" href="javascript:;" data-status="2">
                                                    Completed
                                                </a>
                                                <a class="dropdown-item" style="font-size: 13px;" href="javascript:;" data-status="3">
                                                    Canceled
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-sm btn-warning rounded" title="Invoice">
                                            <i class="fa fa-list"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-sm btn-danger rounded del-order-btn" data-id="{{$order->id}}" title="Delete">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center align-middle text-uppercase text-danger fw-bold">
                                    <td colspan="9">There is No Data !</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            {{ $orders->links() }}
                        </div>
                    </div><!-- /.card-footer -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/js/order.js') }}"></script>
<script>
$('.dropdown-item').on('click', function(){
    let data = {
        'order_id' : $(this).parents('.dropdown-menu').closest('.btn-group').data('id'),
        'status'   : $(this).data('status'),
    }

    let dropdown_toggle = $(`#dropdown_toggle${data.order_id}`);

    $.ajax({
        type: 'POST',
        url : '/admin/update-order-status',
        data: data,

        success: function(response){
            if (response.message) {
                dropdown_toggle.removeClass('btn-warning btn-primary btn-success btn-danger');
                if (data.status == 0) {
                    dropdown_toggle.addClass('btn-warning');
                    dropdown_toggle.text(' Pending ');
                } else if (data.status == 1) {
                    dropdown_toggle.addClass('btn-primary');
                    dropdown_toggle.text(' Processing ');
                } else if (data.status == 2) {
                    dropdown_toggle.addClass('btn-success');
                    dropdown_toggle.text(' Completed ');
                } else if (data.status == 3) {
                    dropdown_toggle.addClass('btn-danger');
                    dropdown_toggle.text(' Canceled ');
                }

                toastr.success('Order Status Updated Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS', {
                    closeButton: true,
                    progressBar: true,
                    positionClass: "toast-bottom-right",
                    preventDuplicates: true,
                });
            }
        }
    })
});
</script>
@endsection
