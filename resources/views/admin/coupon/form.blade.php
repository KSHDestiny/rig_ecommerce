@extends('layouts.backend.master')

@section('coupon-active', 'sidebar-active')

@section('title', isset($coupon) ? 'Edit coupon' : 'Create coupon')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h6>Coupon Code</h6>
        </div>

        <form action="{{ isset($coupon) ? route('admin.coupon.update', $coupon->id) : route('admin.coupon.store') }}"
            method="POST">
            @csrf

            @isset($coupon)
                @method('PATCH')
            @endisset

            <div class="row">
                <div class="col-md-12 mb-5">

                    <div class="card" style="border-radius:10px;">
                        <div class="card-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <p class="mb-0 py-1 card-ttl">
                                    {{ isset($coupon) ? 'Edit' : 'Create' }} Coupon Code
                                </p>
                            </div>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group input-group col-md-6">
                                    <label>Coupon Code <b class="text-danger">*</b></label>

                                    <div class="input-group mb-3">
                                        <input type="text" name="coupon_code" id="coupon_code"
                                            placeholder="Type Custom Code or Generate"
                                            class="form-control @error('coupon_code') is-invalid @enderror"
                                            value="{{ isset($coupon) ? @old('coupon_code', $coupon->coupon_code) : @old('coupon_code') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-dark" type="button"
                                                id="generate_btn">Generate</button>
                                        </div>
                                    </div>

                                    <small class="text-danger">{{ $errors->first('coupon_code') }}</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Expiration Date <b class="text-danger">*</b></label>
                                    <input type="date" name="exp_date"
                                        class="form-control @error('exp_date') is-invalid @enderror"
                                        value="{{ isset($coupon) ? @old('exp_date', $coupon->exp_date) : @old('exp_date') }}">
                                    <small class="text-danger">{{ $errors->first('exp_date') }}</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Discount <b class="text-danger">*</b></label>
                                    <input type="text" name="discount" placeholder="Discount Amount or Percent"
                                        class="form-control @error('discount') is-invalid @enderror"
                                        value="{{ isset($coupon) ? @old('discount', $coupon->discount) : @old('discount') }}">
                                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Discount Type <b class="text-danger">*</b></label>
                                    <select name="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="amount"
                                            @if (isset($coupon)) {{ $coupon->type === 'amount' ? 'selected' : '' }} @else selected @endif>
                                            Fixed Amount (MMK)</option>
                                        <option value="percent"
                                            @if (isset($coupon)) {{ $coupon->type === 'percent' ? 'selected' : '' }} @endif>
                                            Percentage (%)</option>
                                    </select>
                                    <small class="text-danger">{{ $errors->first('type') }}</small>
                                </div>

                            </div>
                        </div><!-- /.card-body -->

                        <div class="card-footer">
                            <a href="javascript:;" class="btn btn-outline-primary" onclick="history.back()">
                                <i class="fas fa-arrow-circle-left"></i>&nbsp;
                                B A C K
                            </a>
                            <button type="submit" class="btn btn-primary float-right">
                                <i class="fa fa-edit"></i>&nbsp;
                                {{ isset($coupon) ? 'Edit' : 'Create' }}
                            </button>
                        </div><!-- /.card-footer -->
                    </div>

                </div>
            </div>

        </form>
    </div>
@endsection
@section('js')
    <script>
        function randCode(len) {
            char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            rand = '';

            for (var i = 0; i < len; i++) {
                idx = Math.floor(Math.random() * char.length);
                rand += char.charAt(idx);
            }

            return rand;
        }

        $(document).ready(function() {
            $('#generate_btn').click(function() {
                $('#coupon_code').val(randCode(10))
            })
        });
    </script>
@endsection
