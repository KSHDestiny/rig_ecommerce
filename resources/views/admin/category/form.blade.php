@extends('layouts.backend.master')

@section('category-active', 'sidebar-active')

@section('title') {{ isset($category) ? 'Edit Category' : 'Create Category' }} @endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h6>Category Management</h6>
        </div>

        <form action="{{ isset($category) ? route('admin.category.update', $category->id) : route('admin.category.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @isset($category)
                @method('PATCH')
            @endisset

            <div class="row">
                <div class="col-md-12 mb-5">

                    <div class="card rounded-5" style="border-radius:10px;">
                        <div class="card-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl">
                                    @isset($category)
                                        Edit Category Form
                                    @else
                                        Create Category Form
                                    @endisset
                                </p>
                            </div>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Category Name <b class="text-danger">*</b></label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ isset($category) ? @old('name', $category->name) : @old('name') }}">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                            </div>
                        </div><!-- /.card-body -->

                        <div class="card-footer">
                            <a href="javascript:;" class="btn btn-sm btn-outline-primary rounded" onclick="history.back()">
                                <i class="fas fa-arrow-circle-left"></i>&nbsp;
                                B A C K
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary float-right rounded">
                                <i class="fa fa-edit"></i>&nbsp;
                                @isset($category)
                                    Update
                                @else
                                    Create
                                @endisset
                            </button>
                        </div><!-- /.card-footer -->
                    </div>

                </div>
            </div>

        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/js/category.js') }}"></script>
@endsection
