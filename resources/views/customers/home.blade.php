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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Chúc mừng {{ Auth::user()->name }} đã đăng nhập thành công!!!!!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
