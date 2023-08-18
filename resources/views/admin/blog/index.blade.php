@extends('layouts.backend.master')

@section('blog-active', 'sidebar-active')

@section('title', 'Blog List')

@section('css')
<style>
    .card-body p {
        margin-bottom: 0;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
        <h6 class="h6 mb-0">Blog Management</h1>

        <form action="{{ route('admin.blog.index') }}" method="GET">
            <div class="input-group">
                <input type="text" class="search-input form-control"
                placeholder="Search by Blog Name . . ."
                style="width: 300px" name="search" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.blog.create') }}" class="btn btn-sm btn-primary">
            Add New&nbsp;
            <i class="fa fa-plus"></i>
        </a>
    </div>

    <div class="form-row" id="blogListRow">
        @foreach($blogs as $blog)
        <div class="col-md-6" style="margin-bottom: 10px;">
            <div class="card shadow-sm"  style="border-radius:10px;">
                <div class="card-header">
                    <p class="mb-0" style="font-weight: 600;">&#10061; {{ $blog->title }}</p>
                </div>

                <div class="card-body">
                    <p class="mb-0" style="text-align: justify;">
                        {!! Str::limit($blog->content, 225) !!}
                    </p>
                </div>

                <div class="card-footer text-right">
                    <a href="{{ route('admin.blog.show', $blog->id) }}" class="btn btn-sm btn-success">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="javascript:;" class="btn btn-sm btn-danger del-blog-btn"
                    data-id="{{ $blog->id }}">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-md-12 my-2 d-flex justify-content-end">
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/js/blog.js') }}"></script>
@endsection
