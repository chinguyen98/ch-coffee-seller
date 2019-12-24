const cartComponent = document.querySelector('#cart-component');
const totalPrice = document.querySelector('.total-price');
const showNoCart = document.querySelector('.showNoCart');
const cartContainer = document.querySelector('.cart-container');
const totalSumContainer = document.querySelector('.total-sum-container');

const getCartItem = async () => {
    const cart = Object.keys(localStorage).join(',');
    if (localStorage.length == 0) {
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
    showNoCart.innerHTML = "";
    await fetch(`http://127.0.0.1:8000/api/carts/${cart}`)
        .then(res => {
            return res.json();
        }).then(cartAsJson => {
            let cartList = cartAsJson;
            renderCart(cartList);
            renderPriceSum(cartList);
        }).catch(err => {
            console.log('Error when get API');
        });
}

function renderCart(cartList) {
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
                    <input data-price="${item.price}" data-val="${item.id}" onBlur="valCartQuantity(${item.id})" style="width:3em" class="text-center" type="text" name="quantity" class="quantity" value="${localStorage.getItem(item.id)}" />
                    <span data-inc="${item.id}" onclick="incCartQuantity(${item.id})" class="quantity-updown text-center">+</span>
                </div>
            </div>
        </div>
    `).join('');
    cartComponent.innerHTML = html;
}

function renderPriceSum(cartList) {
    let sum = cartList.reduce((total, item) => {
        return total + parseInt(localStorage.getItem(item.id)) * item.price;
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
    localStorage.removeItem(id);
    getCartItem();
    quantityOfCart.innerHTML = localStorage.length;
}

function desCartQuantity(id) {
    let getQuantity = parseInt(localStorage.getItem(id));
    let valueInput = document.querySelector(`input[data-val="${id}"]`);
    getQuantity = getQuantity - 1;
    if (getQuantity <= 0)
        getQuantity = 1;
    localStorage.setItem(id, getQuantity);
    valueInput.value = getQuantity;
    changeToTalPrice(id);
}

function valCartQuantity(id) {

    let valueInput = document.querySelector(`input[data-val="${id}"]`);
    if (isNaN(valueInput.value)) {
        valueInput.value = 1;
    }
    if (valueInput.value <= 0)
        valueInput.value = 1;
    localStorage.setItem(id, valueInput.value);
    changeToTalPrice(id);
}

function incCartQuantity(id) {
    let getQuantity = parseInt(localStorage.getItem(id));
    let valueInput = document.querySelector(`input[data-val="${id}"]`);
    getQuantity = getQuantity + 1;
    localStorage.setItem(id, getQuantity);
    valueInput.value = getQuantity;
    changeToTalPrice(id);
}

window.addEventListener('load', getCartItem);
