@extends('layouts/app')

<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(images/introbanner.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">
				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Sản phẩm</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="/">Trang chủ</a></span>&nbsp; / &nbsp; <span>Sản phẩm</span></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-about d-md-flex">
	<div class="one-half img" style="background-image: url(images/about.jpg);"></div>
	<div class="one-half ftco-animate">
		<div class="overlap">
			<div class="heading-section ftco-animate ">
				<span class="subheading aquarelleFont">Danh mục</span>
				<h2 class="my-4">SẢN PHẨM</h2>
			</div>
			<div>
				<div id="accordion">

					@foreach($brands as $brand)

					<div class="card">
						<div class="dmsp-container text-center card-header " id="{{$brand->id}}">
							<h5 class="mb-0">
								<button class="dmsp-container__btn btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$brand->id}}" aria-expanded="false" aria-controls="collapseThree">
									<h4>{{$brand->name}}</h4>
								</button>
							</h5>
						</div>
						<div id="collapse{{$brand->id}}" class="collapse" aria-labelledby="{{$brand->id}}" data-parent="#accordion">
							<div class="lstdmsp card-body">
								<div>
									<div class="list-group">

										@foreach($coffee_types[$brand->id] as $coffee_type)

										<a href="/brandandtype?brand={{$brand->id}}&type={{$coffee_type->id}}" class="list-group-item list-group-item-action">
											<p>{{$coffee_type->name}}</p>
										</a>

										@endforeach

									</div>
								</div>
							</div>
						</div>
					</div>

					@endforeach

				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-menu">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">CH Coffee</span>
				<h2 class="mb-4 mt-2">Danh mục sản phẩm</h2>
				<div class="slogan sloganknst">
					<p>Đàn ông rất giống cà phê <br> bởi nếu là loại ngon sẽ làm bạn mất ngủ!</p>
				</div>
			</div>
		</div>

		@foreach($menu_types as $type)
		<div class="dmsp-main-container mt-3">
			<div class="dmsp-main-container__name">
				<a href="/coffeesbytype?type={{$type->id}}">
					<h2>{{$type->name}}</h2>
				</a>
			</div>
			<div class="pt-3 dmsp-main-container__list d-lg-flex flex-wrap">
				@foreach($type->coffees as $key=>$coffee)

				@if($key===8)

				@break

				@else

				<div class="dmsp-main-container__item col-sm-12 col col-md-3 pt-3 text-center  d-sm-flex d-lg-flex flex-column justify-content-center align-items-center">
					<a href="/coffees/{{$coffee->id}}"><img src="images/coffees/{{$coffee->image}}" alt=""></a>
					<a href="/coffees/{{$coffee->id}}">
						<h5 class="mt-3">{{$coffee->name}}</h5>
					</a>
					<span>{{number_format($coffee->price)}} VND</span>
					<p><a href="#" class="btn btn-primary btn-outline-primary">THÊM VÀO GIỎ</a></p>
				</div>

				@endif

				@endforeach
			</div>
		</div>
		@endforeach
		<!--
		<div class="dmsp-main-container">
			<h1>Cà phê hoà tan</h1>
			<div class="pt-3 dmsp-main-container__list d-lg-flex">
				<div class="dmsp-main-container__item col-sm-12 col col-md-3 m-1 p-1 d-sm-flex d-lg-flex flex-column justify-content-center align-items-center">
					<a href="http://"><img src="images/menu-1.jpg" alt=""></a>
					<h4 class="mt-3">Ca phe</h4>
				</div>
				<div class="dmsp-main-container__item col col-md-3 m-1 p-1 d-lg-flex flex-column justify-content-center align-items-center">
					<a href="http://"><img src="images/menu-1.jpg" alt=""></a>
					<h4 class="mt-3">Ca phe</h4>
				</div>
				<div class="dmsp-main-container__item col col-md-3 m-1 p-1 d-lg-flex flex-column justify-content-center align-items-center">
					<a href="http://"><img src="images/menu-1.jpg" alt=""></a>
					<h4 class="mt-3">Ca phe</h4>
				</div>
				<div class="dmsp-main-container__item col col-md-3 m-1 p-1 d-lg-flex flex-column justify-content-center align-items-center">
					<a href="http://"><img src="images/menu-1.jpg" alt=""></a>
					<h4 class="mt-3">Ca phe</h4>
				</div>
			</div>
		</div>
-->
	</div>
</section>