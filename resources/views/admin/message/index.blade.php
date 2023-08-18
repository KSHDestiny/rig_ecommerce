@extends('layouts.backend.master')

@section('message-active', 'sidebar-active')

@section('title', 'Message List')

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
        <h6 class="h6 mb-0">Message Management</h1>

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

    <div class="row mb-5" id="messageListRow">
        <div class="table-responsive">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <p class="mb-0 py-1 card-ttl">
                                Message List
                                <span>
                                    <a href="javascript:;">
                                        ( <i class="fas fa-database mr-1"></i>{{ $messages->total() }} )
                                    </a>
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="card-body" id="messageList">
                        <ul class="list-unstyled">
                            @foreach($messages as $message)
                            <li class="media p-3 border mb-3 d-flex align-items-center shadow-sm rounded-0">
                                <div class="media-body px-2 py-1">
                                    <h6 class="my-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="left-col">
                                                <p class="text-muted mb-0 custom-fs-13">
                                                    {{ $message->email }}
                                                    <span class="text-danger custom-fs-12">
                                                        ( {{ $message->username }} )
                                                    </span>
                                                </p>
                                            </div>

                                            <div class="right-col">
                                                <small class="mr-2">
                                                    {{ $message->created_at->toFormattedDateString() }},
                                                    {{ $message->created_at->format('H:i A') }}
                                                </small>
                                                <a href="javascript:;" class="text-danger del-msg-btn" data-id="{{ $message->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <hr class="mt-2">

                                        <p class="custom-fs-12 text-justify" style="line-height: 2;">
                                            {{ $message->message }}
                                        </p>
                                    </h6>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</div>
@endsection

@section('js')
<script src="{{ asset('backend/js/message.js') }}"></script>
@endsection
