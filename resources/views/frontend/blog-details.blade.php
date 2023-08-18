@extends('layouts.frontend.master')

@section('title', 'Blog')

@section('content')
<div class="sec-about py-5">
    <div class="container">
        <div class="row g-4 my-2">
            <h2 class="cmn-ttl text-uppercase mb-4">
                {{ $blog->title }}
            </h2>

            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-body fs-14" style="text-align: justify;">
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
