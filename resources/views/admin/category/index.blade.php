@extends('layouts.backend.master')

@section('category-active', 'sidebar-active')

@section('title', 'Category List')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
            <h6 class="h6 mb-0">Category Management</h1>
            <form action="{{ route('admin.category.index') }}" method="GET">
                <div class="input-group">

                    <input type="text" class="search-input form-control" placeholder="Search by Category Name . . ."
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
                    <div class="card"  style="border-radius:10px;">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl fw-bold">
                                    Category List Table
                                    <a href="#" class="ml-1">
                                        ( <i class="fa fa-database"></i> <span
                                            class="count">{{ $categories->total() }}</span> )
                                    </a>
                                </p>
                                <a href="{{ route('admin.category.create') }}"
                                    class="btn btn-sm btn-primary rounded">
                                    Add New&nbsp;
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered" id="categoryListTable">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($categories as $category)
                                        <tr class="text-center align-middle">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                                    class="btn btn-sm btn-warning rounded">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="javascript:;"
                                                    class="btn btn-sm btn-danger rounded del-category-btn"
                                                    data-id="{{ $category->id }}">
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
                                {{ $categories->links() }}
                            </div>
                        </div><!-- /.card-footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/js/category.js') }}"></script>
@endsection
