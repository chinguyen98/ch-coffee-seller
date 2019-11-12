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
        <li class="menu_account_container nav-item dropdown">
          @guest
          <a class="nav-link dropdown-toggle" href="/login" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="/login">Đăng nhập</a>
            @if (Route::has('register'))
            <a class="dropdown-item" href="/register">Tạo tài khoản</a>
            @endif
          </div>
          @else
          <a class="nav-link dropdown-toggle" href="/home" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="/home">Xem tài khoản</a>
            <a class="dropdown-item" href="/register" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
          @endguest
        </li>
        <li class="nav-item"><a class="nav-link"><i id="btn-find" class="fas fa-search fa-2x"></i></a></li>
        <li class="nav-item cart"><a href="cart.html" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>0</small></span></a></li>
      </ul>
    </div>
  </div>
</nav>