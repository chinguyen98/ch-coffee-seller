@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('images/introbanner.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Theo dõi đơn hàng</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Trang chủ</a> /
                            <span>Theo dõi đơn hàng</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container text-center my-5">

    @if(Session::has('orderNotify'))

    <h1 class="text-danger">Chúc mừng bạn đã đặt hàng thành công</h1>
    <br>
    <h3>Mã theo dõi đơn hàng của bạn là: <span class="text-danger">{{Session::get('orderNotify')}}</span> </h3>

    @endif

    <h1>Vui lòng nhập mã để theo dõi đơn hàng:</h1>
    <form action="/orderstatus" method="get">
        Mã đơn hàng: <input type="text" name="id_order" class="ml-4">
        <input class="btn btn-primary" type="submit" value="Kiểm tra">
    </form>

</div>

@endsection