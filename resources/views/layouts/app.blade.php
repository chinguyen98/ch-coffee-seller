	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>{{$title??'CH-Coffee'}}</title>
		<base href="{{asset('')}}">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
		<script src="https://kit.fontawesome.com/b0106ee4d5.js"></script>

		<link rel="stylesheet" href="css/preloader.css">
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
		<link rel="stylesheet" href="css/owner.css">



	</head>

	<body>
		<div class="loading">Loading&#8230;</div>

		<div id="main">
			@include('inc.navbar')

			@yield('content')

			@include('inc.footer')

			@include('inc.findmodal')

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
			<script src="js/main.js"></script>
			<script src="js/findmodal.js"></script>
			<script>
				const quantityOfCart = document.querySelector('#cartNum');
				const cartNotify = document.querySelector('.cartNotify');
				const closeCartBtn = document.querySelector('.closeCart');

				quantityOfCart.innerHTML = localStorage.length;

				function closeCartNotify(e) {
					cartNotify.classList.remove('cartNotify-show');
				}

				closeCartBtn.addEventListener('click', closeCartNotify);
			</script>
		</div>

		<script language="javascript" type="text/javascript">
			$(window).load(function() {
				$('.loading').hide();
			});
		</script>
	</body>

	</html>