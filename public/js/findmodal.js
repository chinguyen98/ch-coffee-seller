const btn_find_modal = document.querySelector('#btn-find');
const find_modal_container = document.querySelector('.find-modal-container');
const find_model_close = document.querySelector('.find-model__close')
const txt_find_modal = document.querySelector('#txt-find-modal');

function toggleFindModal(e) {
    e.preventDefault();
    if (!find_modal_container.classList.contains('active-modal')) {
        find_modal_container.classList.add('active-modal');
    } else {
        find_modal_container.classList.remove('active-modal');
    }
}

function getCoffees(e) {
    e.preventDefault();
    console.log(this.value);
}

btn_find_modal.addEventListener('click', toggleFindModal);
find_model_close.addEventListener('click', toggleFindModal);
txt_find_modal.addEventListener('input', getCoffees);