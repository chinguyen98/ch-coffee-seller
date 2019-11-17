@extends('layouts/app')

<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url({{ asset('images/bg_newsct.jpg') }});">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<h1 class="mb-4">Tin Tức & Thế Giới</h1>
					<p class="mb-4 mb-md-5 slogan">Cà phê có lẽ là thứ duy nhất đủ giữ chân <br />Người ta lại để mà chờ đợi, để mà suy tư</p>
					<p><a href="/" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">VỀ TRANG CHỦ</a></p>
				</div>

			</div>
		</div>
	</div>
</section>
</br>

<h1>{!!$new->content!!}</h1>
