@extends('layouts.backend.master')

@section('product-active', 'sidebar-active')

@section('title', 'Product List')

@section('css')
    <style>
        .toggle-on,
        .toggle-off {
            top: .5px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h6>Product Management</h6>
            <form action="{{ route('admin.product.index') }}" method="GET">
                <div class="input-group">

                    <input type="text" class="search-input form-control" placeholder="Search by Product Name . . ."
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
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 py-1 card-ttl fw-bold">
                                Product List Table
                                <span class="ml-1 text-primary">
                                    ( <i class="fa fa-database"></i> <span class="count">{{ $products->total() }}</span> )
                                </span>
                            </p>
                            <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary rounded-0">
                                Create&nbsp;
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div><!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered " id="productListTable">
                                <thead>
                                    <tr class="text-center middle">
                                        <th>#</th>
                                        <th width="15%">Image</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th width="12%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($products as $product)
                                        <tr class="text-center align-middle">
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/products/' . $product->image) }}"
                                                    class="img-fluid" width="100" height="100">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ number_format($product->price) }} <small>MMK</small></td>
                                            <td>{{ number_format($product->discount) }} <small>MMK</small></td>
                                            <td>
                                                <input class="statusToggle ProductStatus" type="checkbox"
                                                    data-style="android" data-onstyle="success" data-offstyle="danger"
                                                    data-size="small" data-on="In Stock" data-off="Sold Out"
                                                    @if ($product->status == '1') checked @endif
                                                    data-id="{{ $product->id }}">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                                    class="btn btn-sm btn-warning rounded-0">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="javascript:;"
                                                    class="btn btn-sm btn-danger rounded-0 del-product-btn"
                                                    data-id="{{ $product->id }}">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center align-middle text-uppercase text-danger fw-bold">
                                            <td colspan="8">There is No Data !</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->

                        <div class="card-footer d-flex justify-content-end">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/js/product.js') }}"></script>
@endsection
