@extends('layouts.backend.master')

@section('user-active', 'sidebar-active')

@section('title') {{ isset($user) ? 'Edit User' : 'Create User' }} @endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h6>User Management</h6>
        </div>

        <form action="{{ isset($user) ? route('admin.user.update', $user->id) : route('admin.user.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @isset($user)
                @method('PATCH')
            @endisset

            <div class="row">

                <div class="col-md-8 mb-5">
                    <div class="card" style="border-radius:10px;">

                        <div class="card-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl fw-bold">
                                    @isset($user)
                                        Edit User Form
                                    @else
                                        Create User Form
                                    @endisset
                                </p>
                            </div>
                        </div><!-- End of card-header -->

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Username <b class="text-danger">*</b></label>
                                    <input type="text"
                                        class="form-control form-control-sm rounded @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ isset($user) ? @old('name', $user->name) : @old('name') }}">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email Address <b class="text-danger">*</b></label>
                                    <input type="email"
                                        class="form-control form-control-sm rounded @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ isset($user) ? @old('email', $user->email) : @old('email') }}">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Role <b class="text-danger">*</b></label>
                                    <select name="role"
                                        class="form-control form-control-sm rounded @error('role') is-invalid @enderror">
                                        <option disabled selected>
                                            - Select Role -
                                        </option>
                                        <option value="admin"
                                        @if (isset($user) ? @old('role', 'admin') == $user->role : @old('role') == 'admin') selected @endif>
                                            Admin
                                        </option>
                                        <option value="user"
                                        @if (isset($user) ? @old('role', 'user') == $user->role : @old('role') == 'user') selected @endif>
                                            User
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Phone <b class="text-danger">*</b></label>
                                    <input type="number"
                                        class="form-control form-control-sm rounded @error('phone') is-invalid @enderror"
                                        name="phone"
                                        value="{{ isset($user) ? @old('phone', $user->phone) : @old('phone') }}">
                                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Password <b class="text-danger">*</b></label>
                                    <input type="password"
                                        class="form-control form-control-sm rounded @error('password') is-invalid @enderror"
                                        name="password">
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Address <b class="text-danger">*</b></label>
                                    <textarea name="address" rows="3" class="form-control form-control-sm rounded">{{ isset($user) ? old('address', $user->address) : old('address') }}</textarea>
                                    <small class="text-danger">{{ $errors->first('address') }}</small>
                                </div>
                            </div>
                        </div><!-- End of card-body -->

                        <div class="card-footer">
                            <a href="javascript:;" class="btn btn-sm btn-outline-primary rounded" onclick="history.back()">
                                <i class="fas fa-arrow-circle-left"></i>&nbsp;
                                B A C K
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary float-right rounded">
                                <i class="fa fa-edit"></i>&nbsp;
                                @isset($user)
                                    Update
                                @else
                                    Create
                                @endisset
                            </button>
                        </div>

                    </div>
                </div><!-- /.col-md-8 -->

                <div class="col-md-4 mb-5">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl fw-bold">
                                    User Image <b class="text-danger">*</b>
                                </p>
                            </div>
                        </div>

                        <div class="card-body">
                            <input type="file" class="dropify" name="photo"
                                @if (isset($user) && $user->image) data-default-file="{{ asset('uploads/user/' . $user->photo) }}" @endif>
                        </div>
                    </div>
                </div><!-- /.col-md-4 -->

            </div>

        </form>
    </div>
@endsection
