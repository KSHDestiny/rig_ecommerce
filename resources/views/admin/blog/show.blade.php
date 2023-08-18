@extends('layouts.backend.master')

@section('blog-active', 'sidebar-active')

@section('title', 'Blog Details')

@section('css')
<style>
    .card-body p {
        margin-bottom: 0;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 border-bottom">
        <h6 class="h6 my-2">&#10061; {{ $blog->title }}</h1>
    </div>

    <div class="form-row">
        <div class="col-md-12" style="margin-bottom: 10px;">
            <div class="card shadow-sm p-2"  style="border-radius:10px;">
                <div class="card-body">
                    <p class="mb-0" style="text-align: justify;">
                        {!! $blog->content !!}
                    </p>
                </div>

                <div class="card-footer text-right">
                    <a href="javascript:;" class="btn btn-sm btn-outline-primary"
                        onclick="history.back()">
                        <i class="fas fa-arrow-circle-left"></i>&nbsp;
                        B A C K
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
