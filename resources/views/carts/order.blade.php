@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('images/introbanner.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Trạng thái đơn hàng</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Trang chủ</a> /
                            <span>Trạng thái đơn hàng</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@if ( Session::has('order') )

<div class="container text-center my-5">
    @if(Session::get('order')['status']==1)
    <h1>Chúc mừng bạn đã đặt hàng thành công</h1>
    <h4>Vui lòng đợi nhân viên chúng tôi liên hệ với bạn!</h4>
    {{var_dump(Session::get('order'))}}
    @else
    <h1>HELLO XONG RỒI ĐÓ</h1>
    @endif
</div>

@endif

@endsection