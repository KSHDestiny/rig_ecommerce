@extends('layouts.backend.master')

@section('user-active', 'sidebar-active')

@section('title', 'User List')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
            <h6 class="h6 mb-0">User Management</h1>

            <form action="{{ route('admin.user.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="search-input form-control form-control-sm rounded-0 border-dark"
                        placeholder="Search by Username . . ." style="width: 300px" name="search"
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-dark btn-sm rounded-0" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="table-responsive mb-5">
                <div class="col-md-12">
                    <div class="card"  style="border-radius:10px;">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl fw-bold">
                                    User List Table
                                    <span class="ml-1 text-primary">
                                        ( <i class="fa fa-database"></i> <span class="count">{{ $users->total() }}</span> )
                                    </span>
                                </p>
                                <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary rounded">
                                    Create&nbsp;
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered" id="categoryListTable">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($users as $user)
                                        <tr class="text-center align-middle">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ strtoupper($user->role) }}</td>
                                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                <a href="{{ route('admin.user.edit', $user->id) }}"
                                                    class="btn btn-sm btn-warning rounded">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="javascript:;"
                                                    class="btn btn-sm btn-danger rounded del-user-btn"
                                                    data-id="{{ $user->id }}">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center align-middle text-uppercase text-danger fw-bold">
                                            <td colspan="4">There is No Data !</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                {{ $users->links() }}
                            </div>
                        </div><!-- /.card-footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/js/user.js') }}"></script>
@endsection
