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
                        <span class="mr-2"><a href="/">Trang chủ</a></span> /
                        <span class="mr-2"><a href="/orders">Theo dõi đơn hàng</a></span> /
                        <span>Trạng thái đơn hàng</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container text-center">
    @if($status==null)

    <h1>Đéo có đơn hàng</h1>

    @else

    <div id="{{$status->id_status}}" class="progress my-5" style="height:3em">
        <div class="progress-bar bg-success phase-1 border" role="progressbar" style="width: 35%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Đang chờ duyệt</div>
        <div class="progress-bar bg-dark phase-2 border" role="progressbar" style="width: 35%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Đã duyệt</div>
        <div class="progress-bar bg-dark phase-3 border" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Hoàn thành</div>
    </div>

    @if($status->id_status==1)

    <h1>Đơn hàng của bạn đang chờ duyệt.</h1>
    <h3>Vui lòng đợi nhân viên của chúng tôi liên hệ</h3>

    @elseif($status->id_status==2)

    <h1>Đã duyệt đơn hàng của bạn!</h1>
    <h3>Kiện hàng đang được được giao cho đơn vị vận chuyển.</h3>

    @else

    <h1>Đơn hàng này đã hoàn thành</h1>

    @endif

    <script>
        const idStatus = document.querySelector('.progress').id;
        const phase1 = document.querySelector('.phase-1');
        const phase2 = document.querySelector('.phase-2');
        const phase3 = document.querySelector('.phase-3')
        if (idStatus == 2) {
            phase2.classList.add('bg-success');
            phase2.classList.remove('bg-dark');
        }
        if (idStatus == 3) {
            phase3.classList.add('bg-success');
            phase3.classList.remove('bg-dark');
        }
    </script>

    @endif
</div>

@endsection