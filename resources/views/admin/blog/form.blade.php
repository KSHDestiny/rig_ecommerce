@extends('layouts.backend.master')

@section('blog-active', 'sidebar-active')

@section('title') {{ isset($blog) ? 'Edit Blog' : 'Create Blog' }} @endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h6>Blog Management</h6>
    </div>

    <form action="{{ isset($blog) ? route('admin.blog.update', $blog->id) : route('admin.blog.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @isset($blog)
            @method('PATCH')
        @endisset

        <div class="row">
            <div class="col-md-12 mb-5">

                <div class="card "  style="border-radius:10px;">
                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <p class="mb-0 py-1 card-ttl">
                                @isset($blog)
                                    Edit Blog Form
                                @else
                                    Create Blog Form
                                @endisset
                            </p>
                        </div>
                    </div><!-- /.card-header -->

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Blog Tilte <b class="text-danger">*</b></label>
                                <input type="text"
                                    class="form-control form-control-sm  @error('title') is-invalid @enderror"
                                    name="title"
                                    value="{{ isset($blog) ? @old('title', $blog->title) : @old('title') }}">
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Blog Content <b class="text-danger">*</b></label>
                                <textarea name="content" rows="50" class="form-control form-control-sm rounded">{{ isset($blog) ? old('content', $blog->content) : old('content') }}</textarea>
                                <small class="text-danger">{{ $errors->first('content') }}</small>
                            </div>
                        </div>
                    </div><!-- /.card-body -->

                    <div class="card-footer">
                        <a href="javascript:;" class="btn btn-sm btn-outline-primary"
                            onclick="history.back()">
                            <i class="fas fa-arrow-circle-left"></i>&nbsp;
                            B A C K
                        </a>

                        <button type="submit" class="btn btn-sm btn-primary float-right">
                            <i class="fa fa-edit"></i>&nbsp;
                            @isset($blog)
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
<script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
    CKEDITOR.config.height = '25em';
</script>
@endsection
