@extends('layouts.backend.master')

@section('coupon-active', 'sidebar-active')

@section('title', 'Coupon Codes')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
            <h6 class="h6 mb-0">Coupon Codes</h1>

                <form action="{{ route('admin.coupon.index') }}" method="GET">
                    <div class="input-group">
                        {{-- <p class="mb-0 me-2" style="margin-top: 5px;">
                            Search Key : <span class="text-danger">{{ request('search') }}</span>&nbsp;
                        </p> --}}
                        <input type="text" class="search-input form-control" placeholder="Search by Couopon Code . . ."
                            style="width: 300px" name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
        </div>

        <div class="row">
            <div class="table-responsive mb-5">
                <div class="col-md-12">
                    <div class="card" style="border-radius:10px;">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl fw-bold">
                                    Coupon Code Table
                                    <a href="#" class="ml-1">
                                        ( <i class="fa fa-database"></i> <span class="count">{{ $coupons->total() }}</span>
                                        )
                                    </a>
                                </p>
                                <a href="{{ route('admin.coupon.create') }}" class="btn btn-sm btn-primary">
                                    Add New&nbsp;
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered" id="couponCodeTable">
                                <thead>
                                    <tr class="text-center">
                                        <th class="no-search no-sort">#</th>
                                        <th>Code</th>
                                        <th>Discount</th>
                                        <th>Expiration Date</th>
                                        <th class="no-search no-sort">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($coupons as $coupon)
                                        <tr class="text-center align-middle">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $coupon->coupon_code }}</td>
                                            <td>{{ $coupon->discount . ($coupon->type == 'amount' ? ' mmk' : ' %') }}</td>
                                            <td>{{ (new DateTime($coupon->exp_date))->format('d / M / Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.coupon.edit', $coupon->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="javascript:;" class="btn btn-sm btn-danger del-coupon-btn"
                                                    data-id="{{ $coupon->id }}" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center align-middle text-uppercase text-danger fw-bold">
                                            <td colspan="5">There is No Data !</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                {{ $coupons->links() }}
                            </div>
                        </div><!-- /.card-footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/js/coupon.js') }}"></script>
@endsection
