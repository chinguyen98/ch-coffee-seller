@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('images/introbanner.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Thanh toán</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Trang chủ</a> /
                            <span>Thanh toán</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@guest

<div class="notify text-center">
    <h3>Thông báo:</h3>
    <div class="notity__error"></div>
</div>

<div class="checkout-container container text-center mt-3">
    <div class="progress my-3" style="height: 3em;v ">
        <div class="progress-bar border bg-danger progress-phase-1" style="width:50%">
            Nhập thông tin đăng nhập
        </div>
        <div class="progress-bar border bg-dark progress-phase-2" style="width:50%">
            Kiểm tra đơn hàng
        </div>
    </div>

    <div class="phase-1">
        <h1>Thanh toán nhanh chóng không cần đăng nhập!</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card register-form">
                    <div class="card-header text-center">
                        <h4>Vui lòng điền đầy đủ thông tin bên dưới:</h4>
                    </div>
                    
                    <div class="card-body">
                        <form action="/checkout" id="checkoutForm" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Tên: </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="Trần Thanh Hiếu" placeholder="Ví dụ: Nguyễn Bạch Nhật Long" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Địa chỉ email: </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="tth@gmail.com" placeholder="Ví dụ: nbnl@gmail.com" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Số điện thoại: </label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="012345789" value="{{ old('phone_number') }}" placeholder="Ví dụ: 0371234567" required autocomplete="phone_number" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Địa chỉ giao hàng: </label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="2008, Long Thành, Đồng Nai" value="{{ old('address') }}" placeholder="Ví dụ: 2008, Long Thành, Đồng Nai" required autocomplete="address" autofocus>
                                </div>
                            </div>

                            <input type="hidden" name="cart" value="">
                            <input type="hidden" name="shipping_info" value="1">

                        </form>
                        <div id="phase-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-3">Hoặc đăng nhập để nhận ưu đãi</h1>
        <div>Đã có tài khoản: <a class="btn btn-primary mb-3" href="/login">
                <h4>Đăng nhập</h4>
            </a></div>
        <div>Chưa có tài khoản: <a class="btn btn-primary" href="/register">
                <h4>Đăng ký</h4>
            </a></div>
        <button class="pass-phase-2 btn btn-info my-5">
            <h3>Bước kế tiếp</h3>
        </button>
    </div>

    <div class="phase-2 d-none">
        <h1>Kiểm tra đơn hàng của bạn</h1>
        <div class="d-flex flex-row">
            <div class="col col-md-6 ml-3">
                <h3>Giỏ hàng của bạn: </h3>
                <div class="checkout-cart border">

                </div>
                <a class="btn btn-primary mt-2" href="/coffees">
                    <h2>Tiếp tục mua sản phẩm</h2>
                </a>
                <a class="btn btn-info mt-2" href="/carts">
                    <h2>Xem lại chi tiết giỏ hàng</h2>
                </a>
            </div>
            <div class="col col-md-6 ml-3">
                <h3>Thông tin hoá đơn của bạn: </h3>
                <div class="checkout-info border">
                    <h3 class="checkout-info__name text-info">Trần THanh Hiếu</h3>
                    <h5 class="checkout-info__phone text-left ml-2 ">Số điện thoại: 0123456789</h5>
                    <h5 class="checkout-info__address text-left ml-2">Địa chỉ giao hàng: 79 Đường 204 Cao Lỗ, Phường 4, Quận 8, TPHCM
                    </h5>
                    <h5 class="checkout-info__email text-left ml-2 ">Địa chỉ email: tth@gmail.com</h5>
                </div>

                <div class="border text-left mt-3">
                    <h4 class="ml-2">Hình thức thanh toán:</h4>
                    <div>
                        <div class="form-check ml-5">
                            <input class="form-check-input" type="radio" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                <h5>Thanh toán khi nhận hàng</h5>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="border text-left mt-3">
                    <h4 class="ml-2">Hình thức vận chuyển:</h4>
                    <div>

                        @foreach($shipping_infos as $item)

                        @if($loop->index==0)
                        <div class="form-check ml-5">
                            <input class="form-check-input" type="radio" name="shipping_infos" id="{{$item->id}}" value="{{$item->price}}" checked>
                            <label class="form-check-label d-flex flex-row justify-content-between" for="exampleRadios1">
                                <h5>{{$item->name}}</h5>
                                <p class="text-secondary mr-2">{{number_format($item->price)}} VND</p>
                            </label>
                        </div>

                        @else

                        <div class="form-check ml-5">
                            <input class="form-check-input" type="radio" name="shipping_infos" id="{{$item->id}}" value="{{$item->price}}">
                            <label class="form-check-label d-flex flex-row justify-content-between" for="exampleRadios1">
                                <h5>{{$item->name}}</h5>
                                <p class="text-secondary mr-2">{{number_format($item->price)}} VND</p>
                            </label>
                        </div>

                        @endif

                        @endforeach

                    </div>

                </div>
                <div id="phase-2"></div>
                <div class="border text-left mt-3 p-2">
                    <div class="d-flex flex-row justify-content-between">
                        <p>Tạm tính:</p>
                        <p class="checkout-price"></p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <p>Phí vận chuyển:</p>
                        <p class="checkout-shipping"></p>
                    </div>
                    <div class="border"></div>
                    <div class="d-flex flex-row justify-content-between mt-3">
                        <h3>Thành tiền: </h3>
                        <h2 class="checkout-total-price text-danger"></h2>
                    </div>
                </div>

                <button class="btn btn-secondary my-3 pass-phase-1">
                    <h2>Sửa thông tin</h2>
                </button>
            </div>

        </div>


        <input form="checkoutForm" style="width:10em;height:2em;font-size:3em" class="btn btn-danger my-5" type="submit" value="MUA HÀNG">


    </div>
</div>

<script>
    const passPhase2Btn = document.querySelector('.pass-phase-2');
    const passPhase1Btn = document.querySelector('.pass-phase-1');
    const phase1 = document.querySelector('.phase-1');
    const phase2 = document.querySelector('.phase-2');
    const guestNameInput = document.querySelector('input[name="name"]');
    const guestPhoneInput = document.querySelector('input[name="phone_number"]');
    const guestEmailInput = document.querySelector('input[name="email"]');
    const guestAddressInput = document.querySelector('input[name="address"]');
    const checkoutCart = document.querySelector('.checkout-cart');
    const checkoutPriceField = document.querySelector('.checkout-price');
    const checkoutShippingField = document.querySelector('.checkout-shipping');
    const shippingInfoRadioBtn = document.querySelectorAll('input[type="radio"][name="shipping_infos"]');
    const checkoutTotalPrice = document.querySelector('.checkout-total-price');
    const hiddenCartInput = document.querySelector('input[type="hidden"][name="cart"]');
    const hiddenShippingInfoInput = document.querySelector('input[type="hidden"][name="shipping_info"]');

    function changeToPhase2(e) {
        let err = [];
        if (guestNameInput.value === "") {
            err.push('<h5>Vui lòng nhập họ tên của bạn!</h5>');
        }
        if (guestEmailInput.value === "") {
            err.push('<h5>Vui lòng nhập địa chỉ email của bạn!</h5>');
        }

        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(guestEmailInput.value) == false) {
            err.push('<h5>Vui lòng nhập đúng định dạng địa chỉ email!</h5>');
        }
        if (guestPhoneInput.value === "") {
            err.push('<h5>Vui lòng nhập số điện thoại của bạn!</h5>');
        }
        if (isNaN(guestPhoneInput.value)) {
            err.push('<h5>Vui lòng nhập đúng định dạng số điện thoại!</h5>');
        }
        if (guestAddressInput.value === "") {
            err.push('<h5>Vui lòng nhập địa chỉ nhận hàng của bạn!</h5>');
        }

        if (err.length > 0) {
            const errToHTML = err.join('');
            document.querySelector('.notity__error').innerHTML = errToHTML;
            document.querySelector('.notify').classList.add('notify--show');
            setTimeout(() => {
                document.querySelector('.notify').classList.remove('notify--show')
            }, 3000);
            return;
        }
        document.querySelector('.progress-phase-1').classList.replace('bg-danger', 'bg-info');
        document.querySelector('.progress-phase-2').classList.replace('bg-dark', 'bg-danger');
        phase1.classList.add('d-none');
        phase2.classList.remove('d-none');
        document.querySelector('.checkout-info__name').innerHTML = guestNameInput.value;
        document.querySelector('.checkout-info__phone').innerHTML = "Điện thoại: " + guestPhoneInput.value;
        document.querySelector('.checkout-info__address').innerHTML = "Địa chỉ: " + guestAddressInput.value;
        document.querySelector('.checkout-info__email').innerHTML = "Email: " + guestEmailInput.value;

        checkoutPriceField.innerHTML = String(calcCartPrice()).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " VND";
        checkoutShippingField.innerHTML = String(document.querySelector('input[type="radio"][name="shipping_infos"]').value).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " VND";
        checkoutTotalPrice.innerHTML = String(calcCartPrice() + parseInt(document.querySelector('input[type="radio"][name="shipping_infos"]').value)).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " VND";

        document.querySelector('#phase-2').scrollIntoView(false);
    }

    const renderCheckoutCart = async () => {
        const cart = Object.keys(localStorage).join(',');

        if (cart == "") {
            checkoutCart.innerHTML = "Hoá đơn của bạn chưa có đơn hàng nào!";
            document.querySelector('input[type="submit"]').classList.add('d-none');
            return;
        }

        const cartList = await fetch(`http://127.0.0.1:8000/api/carts/${cart}`)
            .then(res => {
                return res.json();
            }).then(cartAsJson => {
                return cartAsJson;
            }).catch(err => {
                console.log('Error when get API');
            });

        const cartListHtml = cartList.map(cart =>
            `
            <div class="d-flex flex-row p-2">
                <span class="mr-3 text-primary">${localStorage.getItem(cart.id)}x</span>
                <span data-id="${cart.id}" data-price="${cart.price}">${cart.name}</span>
            </div>
        `
        ).join('');

        const cartListHiddenValue = cartList.map(cart => {
            let id = cart.id;
            return {
                [cart.id]: localStorage.getItem(cart.id)
            }
        });
        hiddenCartInput.value = JSON.stringify(cartListHiddenValue);

        checkoutCart.innerHTML = cartListHtml;
    }

    function changeToPhase1(e) {
        document.querySelector('.progress-phase-1').classList.replace('bg-info', 'bg-danger');
        document.querySelector('.progress-phase-2').classList.replace('bg-danger', 'bg-dark');
        phase2.classList.add('d-none');
        phase1.classList.remove('d-none');
        document.querySelector('#phase-1').scrollIntoView(false);
    }

    function calcCartPrice() {
        let price = Object.keys(localStorage).reduce((total, item) => {
            let quantity = parseInt(localStorage.getItem(item));
            let price = document.querySelector(`span[data-id="${item}"]`).dataset.price;
            return total + (price * quantity);
        }, 0);
        return price;
    }

    function renderShippingAndTotalPrice(e) {
        checkoutShippingField.innerHTML = String(this.value).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " VND";
        checkoutTotalPrice.innerHTML = String(calcCartPrice() + parseInt(this.value)).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " VND";
        hiddenShippingInfoInput.value = this.id;
    }

    passPhase2Btn.addEventListener('click', changeToPhase2);
    passPhase1Btn.addEventListener('click', changeToPhase1);
    window.addEventListener('load', renderCheckoutCart);
    shippingInfoRadioBtn.forEach(item => {
        item.addEventListener('change', renderShippingAndTotalPrice);
    })
</script>

<!--
<script src="{{asset('js/fetchCityInfo.js')}}"></script>
-->

@else

@endguest

@endsection