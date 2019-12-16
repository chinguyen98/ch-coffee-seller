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

<div class="container">
    <div class=" my-3">
        <h1 class="text-center">ĐƠN HÀNG CỦA BẠN:</h1>
        <div>
            <h2 class="my-5 text-center">Đơn hàng đang chờ duyệt</h2>
            <div>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày mua</th>
                            <th>Sản phẩm</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)

                        @if($order->status->id==1)

                        <tr class="text-left">
                            <td><strong>{{$order->id}}</strong></td>
                            <td>{{$order->created_at}}</td>
                            <td align="left">
                                @foreach($order->order_details as $item)

                                <div class="my-4 text-left"><a href="/coffees/{{$item->coffee->id}}">{{$item->coffee->name}}</a> <span class="text-danger">x{{$item->quantity}}</span></div>

                                @endforeach
                            </td>
                            <td>{{number_format($order->totalPrice)}} VND</td>
                            <td>{{$order->status->name}}</td>
                        </tr>

                        @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <h2 class="my-5 text-center">Đơn hàng đã được duyệt</h2>
            <div>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày mua</th>
                            <th>Sản phẩm</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)

                        @if($order->status->id==2)

                        <tr class="text-left">
                            <td><strong>{{$order->id}}</strong></td>
                            <td>{{$order->created_at}}</td>
                            <td align="left">
                                @foreach($order->order_details as $item)

                                <div class="my-4 text-left"><a href="/coffees/{{$item->coffee->id}}">{{$item->coffee->name}}</a> <span class="text-danger">x{{$item->quantity}}</span></div>

                                @endforeach
                            </td>
                            <td>{{number_format($order->totalPrice)}} VND</td>
                            <td>{{$order->status->name}}</td>
                        </tr>

                        @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-5">
        <div class="card-body border">
            @if ( Session::has('update_notify') )

            <h1 class="text-danger my-3">{{Session::get('update_notify')}}</h1>

            @endif
            <h1 class="text-center">Thông tin tài khoản</h1>
            <form method="POST" onclick="return checkValid()" action="/updateCustomer">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Địa chỉ email:</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="text-danger form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" disabled autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            Địa chỉ email này đã được dùng!
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Tên: </label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Địa chỉ: </label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{Auth::user()->address}}" required autocomplete="address">

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
                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{Auth::user()->phone_number}}" required autocomplete="phone_number">

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong class="phone_err">{{ $message }}</strong>
                        </span>
                        @enderror
                        <strong class="phone_err text-danger"></strong>
                    </div>
                    
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-3 mt-3">
                        <button type="submit" class="btn btn-primary ml-5">
                            Cập nhật
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="border">
        <h1 class="text-center">Đổi mật khẩu</h1>
        <h3 class="text-center text-danger err-password">
            @if(Session::has('err-password'))
            {{Session::get('err-password')}}
            @endif
        </h3>
        <form method="POST" action="/changeCustomerPassword">
            @csrf
            @method('PUT')


            <div class="form-group row">
                <label for="oldPassword" class="col-md-4 col-form-label text-md-right">Mật khẩu cũ: </label>

                <div class="col-md-6">
                    <input id="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" required autocomplete="oldPassword" @if(Session::has('err-password')) autofocus @endif>

                    @error('oldPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu mới: </label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="confirmPassword" class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu mới: </label>

                <div class="col-md-6">
                    <input id="confirmPassword" type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword" required autocomplete="confirmPassword">

                    @error('confirmPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-3 mt-3">
                    <button type="submit" class="btn btn-primary ml-5">
                        Đổi mật khẩu
                    </button>
                </div>
            </div>
        </form>
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