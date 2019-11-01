const btn_Desc=document.querySelector('#btn-quantity-desc');
const btn_Insc=document.querySelector('#btn-quantity-insc');
const quantityInput=document.querySelector('#quantity');

function increaseQuantity(e){
    e.preventDefault();
    quantityInput.value++;
}

function descreaseQuantity(e){
    e.preventDefault();
    quantityInput.value--;
    if(quantityInput.value<0)
        quantityInput.value=0;
}

btn_Insc.addEventListener('click', increaseQuantity);
btn_Desc.addEventListener('click', descreaseQuantity);