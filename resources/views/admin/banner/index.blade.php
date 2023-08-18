@extends('layouts.backend.master')

@section('banner-active', 'sidebar-active')

@section('title', 'Banner List')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
            <h6 class="h6 mb-0">Web Banner Slide</h1>

            {{-- <form action="{{ route('admin.banner.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="search-input form-control" placeholder="Search"
                        style="width: 300px" name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> --}}
        </div>

        <div class="row">
            <div class="table-responsive mb-5" id="bannerListTable">
                <div class="col-md-12">
                    <div class="card"  style="border-radius:10px;">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl fw-bold">
                                    Banner Image List Table
                                    <a href="#" class="ml-1">
                                        ( <i class="fa fa-database"></i> <span class="count">{{ $banners->total() }}</span>
                                        )
                                    </a>
                                </p>
                                <a href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-primary rounded-5">
                                    Add New&nbsp;
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered" id="bannerListTable">
                                <thead>
                                    <tr class="text-center">
                                        <th class="no-search no-sort">#</th>
                                        <th>Image</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th class="no-search no-sort">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($banners as $banner)
                                        <tr class="text-center align-middle">
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src='{{ asset("uploads/banners/$banner->image") }}' alt=""
                                                    height="100">
                                            </td>
                                            <td>{{ $banner->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $banner->updated_at->toFormattedDateString() }}</td>
                                            <td>
                                                <a href="{{ route('admin.banner.edit', $banner->id) }}"
                                                    class="btn btn-sm btn-warning rounded">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="javascript:;"
                                                    class="btn btn-sm btn-danger rounded del-banner-btn"
                                                    data-id="{{ $banner->id }}">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center align-middle text-uppercase text-danger fw-bold">
                                            <td colspan="4">There is No Data !</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                {{ $banners->links() }}
                            </div>
                        </div><!-- /.card-footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/js/banner.js') }}"></script>
@endsection
