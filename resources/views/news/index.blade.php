@extends('layouts/app')

<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(images/bgnews.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading aquarelleFont">Tin Tức & Thế Giới </span>
					<h1 class="mb-4">Văn Hóa - Sức Khỏe - Cộng Đồng - Ẩm Thực</h1>
					<p class="mb-4 mb-md-5 slogan">Cho dù vẫn tiếp tục phải uống cà phê đắng nhưng <br />Tôi vẫn không nản lòng vì dư vị ngọt ngào của nó</p>
					<p><a href="/" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">VỀ TRANG CHỦ</a></p>
				</div>

			</div>
		</div>
	</div>
</section>
</br>

@foreach($qe as $new)
	<div class="d-flex flex-row">
		<div class="col col-md-3 "><a href="/news/{{$new->id}}"><img class="newsimage" src="{{asset('images/news/' . $new->image)}}" alt="" srcset=""></div></a>
		<div class="col col-md-8" >
			<div class="title-news">
				<a href="/news/{{$new->id}}"><h3>{{$new->title}}</h3></a>
			</div>
			<div class="review-news">
				<p>{{$new->review}}</p>
			</div>
		</div>
	</div>
@endforeach
