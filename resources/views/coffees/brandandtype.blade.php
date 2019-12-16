@extends('layouts/app')

<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(images/introbanner.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">
				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">{{$coffee_type->name}} {{$brand->name}}</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="/">Trang chủ</a></span> / <span class="mr-2"><a href="/coffees">Sản phẩm</a></span> / <span>{{$coffee_type->name}} {{$brand->name}}</span></p>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="dmsp-main-container mt-3">
	<div class="pt-3 dmsp-main-container__list d-lg-flex flex-wrap">
		@foreach($coffees as $coffee)

		<div class="dmsp-main-container__item col-sm-12 col col-md-3 pt-3 text-center  d-sm-flex d-lg-flex flex-column justify-content-center align-items-center">
			<a href="/coffees/{{$coffee->id}}"><img src="images/coffees/{{$coffee->image}}" alt=""></a>
			<a href="/coffees/{{$coffee->id}}">
				<h5 class="mt-3">{{$coffee->name}}</h5>
			</a>
			<span>{{number_format($coffee->price)}} VND</span>
			<p><a href="/coffees/{{$coffee->id}}" class="btn btn-primary btn-outline-primary">XEM SẢN PHẨM</a></p>
		</div>

		@endforeach
	</div>
</div>