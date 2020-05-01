const cartComponent = document.querySelector('#cart-component');
const totalPrice = document.querySelector('.total-price');
const showNoCart = document.querySelector('.showNoCart');
const cartContainer = document.querySelector('.cart-container');
const totalSumContainer = document.querySelector('.total-sum-container');

const getCartItem = async () => {
    const cartStorage = JSON.parse(localStorage.getItem('cart'));
    if (cartStorage === null || cartStorage.length === 0) {
        cartComponent.innerHTML = "";
        cartComponent.classList.add('cart-close');
        totalSumContainer.classList.add('cart-close');
        const html = `
            <h1 class="text-center">Không có sản phẩm nào trong giỏ hàng</h1>
            <a class="btn btn-primary btn-lg" href="/coffees"><h3 class="d-inline">Tiếp tục mua sắm</h3></a>
        `;
        showNoCart.innerHTML = html;
        return;
    }

    const cartIdList = cartStorage.map(item => item.id).join(',');
    showNoCart.innerHTML = "";
    await fetch(`http://127.0.0.1:8000/api/carts/${cartIdList}`)
        .then(res => {
            return res.json();
        }).then(cartAsJson => {
            let cartList = cartAsJson;
            renderCart(cartList, cartStorage);
            renderPriceSum(cartList, cartStorage);
        }).catch(err => {
            console.log('Error when get API');
        });
}

function renderCart(cartList, cartStorage) {
    const html = cartList.map(item =>
        `
        <div class="col-md-12 my-2 d-flex flex-row justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <div class="cart-image-container mr-4"><a href="/coffees/${item.id}"><img class="cart-image" src="images/coffees/${item.image}"></a></div>
                <div>
                    <a href="/coffees/${item.id}"><h5>${item.name}</h5></a>
                    <button class="btn btn-danger btn-delete-cart-item" onclick="deleteItem(${item.id})">Xoá</button>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div>
                    <h5>Giá: ${String(item.price).replace(/(.)(?=(\d{3})+$)/g, '$1,')}</h5>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <span data-des="${item.id}" onclick="desCartQuantity(${item.id})" class="quantity-updown text-center">-</span>
                    <input data-price="${item.price}" data-val="${item.id}" onChange="valCartQuantity(${item.id})" style="width:3em" class="text-center" type="text" name="quantity" class="quantity" value="${cartStorage.find(el => el.id === item.id).qty}" />
                    <span data-inc="${item.id}" onclick="incCartQuantity(${item.id})" class="quantity-updown text-center">+</span>
                </div>
            </div>
        </div>
    `).join('');
    cartComponent.innerHTML = html;
}

function renderPriceSum(cartList, cartStorage) {
    let sum = cartList.reduce((total, item) => {
        return total + parseInt(cartStorage.find(el => el.id === item.id).qty) * item.price;
    }, 0);
    let price = String(sum).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " VND";
    totalPrice.innerHTML = price;
}

function changeToTalPrice(id) {
    let sum = Array.from(document.querySelectorAll('input[data-val]')).reduce((total, item) => {
        return total + parseInt(item.value) * parseInt(item.dataset.price);
    }, 0);
    let price = String(sum).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " VND";
    totalPrice.innerHTML = price;
}

function deleteItem(id) {
    const cartStorage = JSON.parse(localStorage.getItem('cart'));
    const index = cartStorage.findIndex(item => +item.id === +id);
    cartStorage.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cartStorage));
    getCartItem();
    quantityOfCart.innerHTML = cartStorage.length;
}

function desCartQuantity(id) {
    const cartStorage = JSON.parse(localStorage.getItem('cart'));
    let getQuantity = cartStorage.find(el => el.id === id).qty;
    let valueInput = document.querySelector(`input[data-val="${id}"]`);
    const index = cartStorage.findIndex(item => +item.id === +id);

    getQuantity = getQuantity - 1;
    if (getQuantity <= 0)
        getQuantity = 1;
    cartStorage[index].qty = getQuantity;
    localStorage.setItem('cart', JSON.stringify(cartStorage));

    valueInput.value = getQuantity;
    changeToTalPrice(id);
}

function valCartQuantity(id) {
    const cartStorage = JSON.parse(localStorage.getItem('cart'));
    const index = cartStorage.findIndex(item => +item.id === +id);

    let valueInput = document.querySelector(`input[data-val="${id}"]`);
    if (isNaN(valueInput.value)) {
        valueInput.value = 1;
    }
    if (valueInput.value <= 0)
        valueInput.value = 1;
    cartStorage[index].qty = +valueInput.value;

    localStorage.setItem('cart', JSON.stringify(cartStorage));
    changeToTalPrice(id);
}

function incCartQuantity(id) {
    const cartStorage = JSON.parse(localStorage.getItem('cart'));
    let getQuantity = cartStorage.find(el => el.id === id).qty;
    let valueInput = document.querySelector(`input[data-val="${id}"]`);
    const index = cartStorage.findIndex(item => +item.id === +id);

    getQuantity = getQuantity + 1;

    cartStorage[index].qty = getQuantity;
    localStorage.setItem('cart', JSON.stringify(cartStorage));

    valueInput.value = getQuantity;
    changeToTalPrice(id);
}

window.addEventListener('load', getCartItem);
