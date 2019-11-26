@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url({{ asset('images/introbanner.jpg') }})" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">
				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Giỏ hàng</h1>
					<p class="breadcrumbs">
						<span class="mr-2"><a href="/">Trang chủ</a> /
							<span class="mr-2"><a href="/carts">Giỏ hàng</a></span>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<h1 class="mt-5 ml-5">Giỏ hàng</h1>
<div class="showNoCart text-center">

</div>
<div class="ml-5 my-2 d-flex flex-sm-column flex-md-row justify-content-center">
	<div class="row">
		<div class=" cart-container col col-md-8">
			<div id="cart-component" class="col col-md-10 d-flex flex-column border">

			</div>
		</div>
		<div class=" total-sum-container col col-md-4 text-center d-flex flex-column justify-content-center align-items-center">
			<h2>Thành tiền: </h2>
			<h1 class="total-price text-danger border p-3">0 VND</h1>
			<a class="btn btn-danger" href="#"><span class="btnDatHang">Tiến hành đặt hàng</span></a>
		</div>
	</div>

</div>

<script src="{{asset('js/renderCartList.js')}}"></script>

@endsection