@extends('layouts.backend.master')

@section('brand-active', 'sidebar-active')

@section('title') {{ isset($brand) ? 'Edit Brand' : 'Create Brand' }} @endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h6>Brand Management</h6>
        </div>

        <form action="{{ isset($brand) ? route('admin.brand.update', $brand->id) : route('admin.brand.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @isset($brand)
                @method('PATCH')
            @endisset

            <div class="row">
                <div class="col-md-12 mb-5">

                    <div class="card" style="border-radius:10px;">
                        <div class="card-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl">
                                    @isset($brand)
                                        Edit Brand Form
                                    @else
                                        Create Brand Form
                                    @endisset
                                </p>
                            </div>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12 mt-4">
                                    <label>Brand Name <b class="text-danger">*</b></label>
                                    <input type="text"
                                        class="form-control form-control-sm rounded @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ isset($brand) ? @old('name', $brand->name) : @old('name') }}">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div>
                                    <label>Brand Logo</label>
                                    <input type="file" class="dropify" name="image"
                                    @if (isset($brand) && $brand->image) data-default-file="{{ asset('uploads/brands/' . $brand->image) }}" @endif>
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
                                @isset($brand)
                                    Update
                                @else
                                    Create
                                @endisset
                            </button>
                        </div><!-- /.card-footer -->
                    </div>

                </div>
            </div>
    </div>
    </form>
@endsection
