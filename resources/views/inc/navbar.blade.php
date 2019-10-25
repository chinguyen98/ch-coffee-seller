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
        <li class="nav-item {{$coffeeactive ?? ""}}"><a href="/coffees" class="nav-link">Sản phẩm</a></li>
        <li class="nav-item {{$newsactive ?? ""}}"><a href="/news" class="nav-link">Tin tức</a></li>
        <li class="nav-item {{$contactactive ?? ""}}"><a href="/contacts" class="nav-link">Liên hệ</a></li>
        <li class="nav-item {{$accountactive ?? ""}}"><a href="about.html" class="nav-link">Tài khoản</a></li>
        <li class="nav-item cart"><a href="cart.html" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>0</small></span></a></li>
      </ul>
    </div>
  </div>
</nav>
