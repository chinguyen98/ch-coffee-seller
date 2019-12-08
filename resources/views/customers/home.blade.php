@extends('layouts.app')

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('images/introbanner.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Chào mừng {{ Auth::user()->name }}</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Trang chủ</a> /
                            <span>Tài khoản</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<br>

@section('content')

@if ( Session::has('update_notify') )

<div class="userNotify text-center">
    <h1 class="text-danger">Thông báo:</h1>
    <p>{{Session::get('update_notify')}}</p>
</div>

@endif

<div class="container text-center">
    <div class="row justify-content-center">
        <div class="card-body">
            @if ( Session::has('update_notify') )

            <h1 class="text-danger my-3">{{Session::get('update_notify')}}</h1>

            @endif
            <h1>Thông tin tài khoản</h1>
            <form method="POST" onclick="return checkValid()" action="/updateCustomer">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Tên: </label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Địa chỉ email:</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" disabled autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            Địa chỉ email này đã được dùng!
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Địa chỉ: </label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{Auth::user()->address}}" required autocomplete="address" autofocus>

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Số điện thoại: </label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{Auth::user()->phone_number}}" required autocomplete="phone_number" autofocus>

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong class="phone_err">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <strong class="phone_err"></strong>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-3 mt-3">
                        <button type="submit" class="btn btn-primary">
                            Cập nhật
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const phoneInput = document.querySelector('input[name="phone_number"]');
    const phoneerr = document.querySelector('.phone_err');

    function checkValid() {
        if (isNaN(phoneInput.value)) {
            phoneerr.innerHTML = "Số điện thoại không hợp lệ!";
            return false;
        }
        return true;
    }
</script>

@endsection