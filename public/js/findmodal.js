const btn_find_modal = document.querySelector('#btn-find');
const find_modal_container = document.querySelector('.find-modal-container');
const find_model_close = document.querySelector('.find-model__close')
const txt_find_modal = document.querySelector('#txt-find-modal');
const matchCoffees = document.querySelector('.matchCoffees');
const find_model_button = document.querySelector('.find-model__button');
const matchCount = document.querySelector('.matchCount');

function toggleFindModal(e) {
    e.preventDefault();
    if (!find_modal_container.classList.contains('active-modal')) {
        find_modal_container.classList.add('active-modal');
    } else {
        find_modal_container.classList.remove('active-modal');
    }
}

const getCoffees = async searchText => {
    await fetch(`http://127.0.0.1:8000/api/coffees/${searchText}`)
        .then(res => {
            return res.json();
        }).then(resAsJSON => {
            let coffees = resAsJSON;
            if (searchText.length === 0) {
                coffees = [];
                matchCoffees.innerHTML = '';
            };
            outputMatchCoffees(coffees);
        }).catch(err => {
            console.log('Error when get API');
        });
};

function outputMatchCoffees(coffees) {
    if (coffees.length > 0) {
        const html = coffees.map(coffee =>
            `
            <div class="col col-md-2 col-sm-6">
                <a href="/coffees/${coffee.id}"><img src="images/coffees/${coffee.image}" alt=""></a>
                <a href="/coffees/${coffee.id}"><h5>${coffee.name}</h5></a>
                <p>${String(coffee.price).replace(/(.)(?=(\d{3})+$)/g, '$1,')} VND</p>
		    </div>
            `
        ).join('');
        txt_find_modal.value = "";
        matchCount.innerHTML = `<h1>Đã tìm thấy ${coffees.length} sản phẩm</h1>`;
        matchCoffees.innerHTML = html;
    } else {
        matchCount.innerHTML = `<h1>Không tìm thấy sản phẩm nào!</h1>`;
        matchCoffees.innerHTML = "";
    }
}

function entertoSearch(e) {
    if (e.keyCode == 13) {
        getCoffees(this.value);
    }
}

btn_find_modal.addEventListener('click', toggleFindModal);
find_model_close.addEventListener('click', toggleFindModal);
find_model_button.addEventListener('click', () => getCoffees(txt_find_modal.value));
txt_find_modal.addEventListener('keypress', entertoSearch);