	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>{{$title}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
		<script src="https://kit.fontawesome.com/b0106ee4d5.js"></script>

		<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
		<link rel="stylesheet" href="css/animate.css">

		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="css/magnific-popup.css">

		<link rel="stylesheet" href="css/aos.css">

		<link rel="stylesheet" href="css/ionicons.min.css">

		<link rel="stylesheet" href="css/bootstrap-datepicker.css">
		<link rel="stylesheet" href="css/jquery.timepicker.css">


		<link rel="stylesheet" href="css/flaticon.css">
		<link rel="stylesheet" href="css/icomoon.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container">
				<a class="navbar-brand" href="/">CH<small>Coffee</small></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="oi oi-menu"></span> Menu
				</button>
				<div class="collapse navbar-collapse" id="ftco-nav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item {{$homeactive ?? ""}}"><a href="/" class="nav-link">Trang chủ</a></li>
						<li class="nav-item {{$introactive ?? ""}}"><a href="/intros" class="nav-link">Giới thiệu</a></li>
						<li class="nav-item {{$coffeeactive ?? ""}}"><a href="menu.html" class="nav-link">Sản phẩm</a></li>
						<li class="nav-item {{$newsactive ?? ""}}"><a href="blog.html" class="nav-link">Tin tức</a></li>
						<li class="nav-item {{$contactactive ?? ""}}"><a href="about.html" class="nav-link">Liên hệ</a></li>
						<li class="nav-item {{$accountactive ?? ""}}"><a href="about.html" class="nav-link">Tài khoản</a></li>
						<li class="nav-item cart"><a href="cart.html" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>0</small></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END nav -->

		@yield('content')

		<footer class="ftco-footer ftco-section img">
			<div class="overlay"></div>
			<div class="container">
				<div class="row mb-5">
					<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
						<div class="ftco-footer-widget mb-4">
							<h2 class="ftco-heading-2">Về chúng tôi</h2>
							<img class="img-thumbnail" src="images/bocongthuong.png" alt="">
							<p>GPKD số 0314250963 do Phòng đăng ký kinh doanh Sở KH và ĐT Thành Phố Hồ Chí Minh cấp ngày 24/02/2017
								.<br>Giám đốc/Đồng sở hữu website: Nguyễn Đắc Chí - Trần Thanh Hiếu.</p>
							
						</div>
					</div>
					
					<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
						<div class="ftco-footer-widget mb-4">
							<h2 class="ftco-heading-2">Hỗ trợ khách hàng</h2>
							<div class="block-23 mb-3">
								<ul>
									<li><span class="icon icon-map-marker"></span><span class="text">79 Đường 204 Cao Lỗ, Phường 4, Quận 8, TPHCM</span></li>
									<li><a href="#"><span class="icon icon-phone"></span><span class="text">(028) 38 503 717</span></a></li>
									<li><a href="#"><span class="icon icon-envelope"></span><span class="text">chcoffee@gmail.com</span></a></li>
								</ul>
							</div>
							<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
								<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
						</div>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">

						<p>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> - Bản quyền của CH Coffee - 
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
					</div>
				</div>
			</div>
		</footer>



		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
				<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
				<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate-3.0.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/jquery.waypoints.min.js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/aos.js"></script>
		<script src="js/jquery.animateNumber.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/jquery.timepicker.min.js"></script>
		<script src="js/scrollax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="js/google-map.js"></script>
		<script src="js/main.js"></script>

	</body>

	</html>