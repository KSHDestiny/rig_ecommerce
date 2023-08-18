@extends('layouts.backend.master')

@section('product-active', 'sidebar-active')

@section('title') {{ isset($product) ? 'Edit Product' : 'Create Product' }} @endsection

@section('content')
<div class="container-lg">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h6>Product Management</h6>
    </div>

    <form action="{{ isset($product) ? route('admin.product.update', $product->id) : route('admin.product.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($product)
            @method('PATCH')
        @endisset

        <div class="row">

            <div class="col-md-8 mb-5">
                <div class="card">

                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <p class="mb-0 py-1 card-ttl">
                                @isset($product)
                                    Edit Product Form
                                @else
                                    Create Product Form
                                @endisset
                            </p>
                        </div>
                    </div><!-- End of card-header -->

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Brand's Name <b class="text-danger">*</b></label>
                                <select name="brand_id"
                                    class="form-control form-control-sm  select2-select-box @error('brand_id') is-invalid @enderror">
                                    <option disabled selected>Select Your Product's Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            @if (isset($product) ? @old('brand_id', $product->brand_id) == $brand->id : @old('brand_id') == $brand->id) selected @endif>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-danger">{{ $errors->first('brand_id') }}</small>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Category's Name <b class="text-danger">*</b></label>
                                <select name="category_id"
                                    class="form-control form-control-sm rounded select2-select-box @error('category_id') is-invalid @enderror">
                                    <option disabled selected>Select Your Product's Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if (isset($product) ? @old('category_id', $product->category_id) == $category->id : @old('category_id') == $category->id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-danger">{{ $errors->first('category_id') }}</small>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Product's Name <b class="text-danger">*</b></label>
                                <input type="text"
                                    class="form-control form-control-sm  @error('name') is-invalid @enderror" name="name"
                                    value="{{ isset($product) ? @old('name', $product->name) : @old('name') }}">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Product's Price <b class="text-danger">*</b></label>
                                <input type="number"
                                    class="form-control form-control-sm @error('price') is-invalid @enderror" name="price"
                                    value="{{ isset($product) ? @old('name', $product->price) : @old('price') }}">
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Product's Discount</label>
                                <input type="number"
                                    class="form-control form-control-sm @error('discount') is-invalid @enderror"
                                    name="discount"
                                    value="{{ isset($product) ? @old('discount', $product->discount) : @old('discount') }}"
                                    placeholder="Fixed Amount (MMK)">
                                <small class="text-danger">{{ $errors->first('discount') }}</small>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Product's Summary <b class="text-danger">*</b></label>
                                <textarea name="summary" rows="5" class="form-control form-control-sm rounded">{{ isset($product) ? old('summary', $product->summary) : old('summary') }}</textarea>
                                <small class="text-danger">{{ $errors->first('summary') }}</small>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Product's Description <b class="text-danger">*</b></label>
                                <textarea name="description" rows="5" class="form-control form-control-sm">{{ isset($product) ? old('description', $product->description) : old('description') }}</textarea>
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            </div>
                        </div>
                    </div><!-- End of card-body -->

                    <div class="card-footer">
                        <a href="javascript:;" class="btn btn-sm btn-outline-primary rounded-0" onclick="history.back()">
                            <i class="fas fa-arrow-circle-left"></i>&nbsp;
                            B A C K
                        </a>
                        <button type="submit" class="btn btn-sm btn-primary rounded-0 float-right">
                            <i class="fa fa-edit"></i>&nbsp;
                            @isset($product)
                                Update
                            @else
                                Create
                            @endisset
                        </button>
                    </div>

                </div>
            </div><!-- /.col-md-8 -->

            <div class="col-md-4 mb-5">
                <div class="card">
                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <p class="mb-0 py-1 card-ttl">
                                Product Image <b class="text-danger">*</b>
                            </p>
                        </div>
                    </div>

                    <div class="card-body">
                        <input type="file" class="dropify" name="image"
                        @if (isset($product) && $product->image) data-default-file="{{ asset('uploads/products/' . $product->image) }}" @endif>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->

        </div>

    </form>
</div>

@endsection
@section('js')
    <script src="{{ asset('backend/js/product.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('summary');
        CKEDITOR.replace('description');
    </script>
@endsection
