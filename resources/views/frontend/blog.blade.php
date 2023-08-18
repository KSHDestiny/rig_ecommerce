@extends('layouts.frontend.master')

@section('title', 'Blog')

@section('content')
<div class="sec-about py-5">
    <div class="container">
        <div class="row g-4 my-2">
            <h2 class="cmn-ttl text-uppercase mb-4">
                Blogs
            </h2>

            @forelse($blogs as $blog)
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header fs-14 fw-bold py-3">
                        &#10061; {{ $blog->title }}
                    </div>

                    <div class="card-body fs-14" style="text-align: justify;">
                        {!! Str::limit($blog->content, 250) !!}

                        <div>
                            <a href="{{ route('frontend.blog-details', $blog->id) }}">Read More &xrarr;</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <p class="text-danger fs-14 py-4 text-center">
                    THERE IS NO BLOGS
                </p>
            </div>
            @endforelse

            <div class="d-flex justify-content-end mt-4">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
