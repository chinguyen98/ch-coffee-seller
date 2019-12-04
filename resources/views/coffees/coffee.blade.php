@extends('layouts/app')

<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url({{ asset('images/introbanner.jpg') }});" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">
				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">{{$coffee->name}}</h1>
					<p class="breadcrumbs">
						<span class="mr-2"><a href="/">Trang chủ</a> /
							<span class="mr-2"><a href="/coffees">Sản phẩm</a></span> /
							<span class="mr-2"><a href="/brandandtype?brand={{$brand->id}}&type={{$coffee_type->id}}">{{$coffee_type->name}} {{$brand->name}}</a></span>
							<br><br>
							<span>{{$coffee->name}}</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="dmsp-main-container mt-3">
	<div class="main_coffee_detail d-sm-flex flex-sm-column flex-sm-wrap flex-lg-row">
		<div class="col col-sm-6 col-lg-4 ">
			<img class="mt-lg-3" src="{{asset('images/coffees/' . $coffee->image)}}" alt="">
		</div>
		<div class="col col-sm-6 col-lg-4">
			<h3 class="mt-lg-3 text-center">{{$coffee->name}}</h3>
			<p>
				<h5 class="pr-3">Nhà sản xuất: </h5> {{$brand->name}}
			</p>
			<p>
				<h5 class="pr-3">Loại cà phê: </h5>{{$coffee_type->name}}
			</p>
			<p>
				<h5 class="pr-3">Đặc điểm: </h5><br>{{$coffee->specific}}
			</p>
			<p>
				<h5 class="pr-3">Thành phần: </h5>{{$coffee->ingredient}}
			</p>
			<p>
				<h5 class="pr-3">Hạn sử dụng: </h5>{{$coffee->expired}} tháng
			</p>
			<p>
				<h5 class="pr-3">Khối lượng: </h5>{{$unit->name}} {{$coffee->capacity}}{{$unit->dram}}
			</p>
			<p class="price-container"><span class="price-container__label">Giá: </span><span class=" ml-3 price-container__price"> {{number_format($coffee->price)}} VND</span></p>
			<div class="d-flex flex-row align-items-center">
				<h5 class="pr-3 pt-2">Số lượng đặt mua: </h5>
				<span id="btn-quantity-desc" class="quantity-updown text-center">-</span>
				<input type="text" name="quantity" class="quantity" value="1" min="1" />
				<span id="btn-quantity-insc" class="quantity-updown text-center">+</span>
			</div>
			<br>

			<p><a id="btnAddToCart" class="btn btn-lg btn-primary btn-outline-primary">THÊM VÀO GIỎ</a></p>

		</div>
		<div class="col col-sm-6 col-lg-4">
			<h3 class="py-3 text-center">Sản phẩm {{$brand->name}} khác</h3>
			<div class="relatedCoffee-container d-flex flex-column">
				@foreach($relateBrandCoffees as $item)

				<div class="relatedCoffee-container__item pb-3 col col-12 d-flex flex-row">
					<a href="/coffees/{{$item->id}}"><img class="mr-3" src="{{asset('images/coffees/' . $item->image)}}" alt=""></a>
					<div>
						<a href="/coffees/{{$item->id}}">
							<h5>{{$item->name}}</h5>
						</a>
						<p>{{number_format($item->price)}} VND</p>
					</div>
				</div>

				@endforeach
			</div>
		</div>
	</div>
	<div class="px-5 pt-5 main_coffee_info">
		<h2 class="ml-5">Mô tả sản phẩm</h2>
		<p class="mx-5">{{$coffee->info}}</p>
	</div>
</div>

<script src="{{asset('js/owner.js') }}"></script>


<script>
	const btnAddToCart = document.querySelector('#btnAddToCart');
	const quantity = document.querySelector('.quantity');
	const btnquantitydesc = document.querySelector('#btn-quantity-desc');

	function addToCart(e) {
		let inputQuantity = quantity.value;
		if (inputQuantity <= 0) {
			return;
		}
		if (isNaN(inputQuantity)) {
			quantity.value = 1;
		}
		let id = document.URL.split('/').pop();
		if (localStorage.getItem(id) === null) {
			localStorage.setItem(id, inputQuantity);
		} else {
			let getQuantity = parseInt(localStorage.getItem(id));
			getQuantity = getQuantity + parseInt(inputQuantity);
			localStorage.setItem(id, getQuantity);
		}
		cartNotify.classList.add('cartNotify-show');
		quantityOfCart.innerHTML = localStorage.length;
	}

	function resetVal(e) {
		if (isNaN(quantity.value)) {
			quantity.value = 1;
		}
		if (quantity.value <= 0) {
			quantity.value = 1;
		}
	}

	btnAddToCart.addEventListener('click', addToCart);
	quantity.addEventListener('change', resetVal)
	btnquantitydesc.addEventListener('click', resetVal);
</script>