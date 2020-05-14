const quantityOfCart = document.querySelector('#cartNum');
const cartNotify = document.querySelector('.cartNotify');
const cartNotifyClose = document.querySelector('.cartNotify__close');
const cartNotifyCoffee = document.querySelector('.cartNotify__coffee');

const cartStorage = JSON.parse(localStorage.getItem('cart'));
if (cartStorage === null || cartStorage.length === 0) {
    quantityOfCart.innerHTML = 0;
} else {
    quantityOfCart.innerHTML = cartStorage.length;
}

function closeCartNotify(e) {
    cartNotify.classList.remove('cartNotify-show');
}

cartNotifyClose.addEventListener('click', closeCartNotify);