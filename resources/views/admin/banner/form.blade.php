@extends('layouts.backend.master')

@section('banner-active', 'sidebar-active')

@section('title') {{ isset($banner) ? 'Edit banner' : 'Create banner' }} @endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h6>Web Banner Slide</h6>
        </div>

        <form action="{{ isset($banner) ? route('admin.banner.update', $banner->id) : route('admin.banner.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @isset($banner)
                @method('PATCH')
            @endisset

            <div class="row">
                <div class="col-md-12 mb-5">

                    <div class="card" style="border-radius:10px;">
                        <div class="card-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl">
                                    @isset($banner)
                                        Edit banner Form
                                    @else
                                        Create banner Form
                                    @endisset
                                </p>
                            </div>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="form-row">
                                <div>
                                    <label>Web Banner Image</label>
                                    <input type="file" class="dropify" name="image"
                                        @if (isset($banner) && $banner->image) data-default-file="{{ asset('uploads/banners/' . $banner->image) }}" @endif>
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
                                @isset($banner)
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
