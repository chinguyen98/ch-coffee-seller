const coffeeNameField = document.querySelector('#coffee-name');
const coffeesContainer = document.querySelector('#coffees-container');

const getCoffees = async searchText => {
    let fetchAPIString = (searchText === '') ? `http://127.0.0.1:8000/api/coffees` : `http://127.0.0.1:8000/api/coffees/${searchText}`;
    await fetch(fetchAPIString)
        .then(res => {
            return res.json();
        }).then(resAsJSON => {
            let coffees = resAsJSON;
            outputMatchCoffees(coffees);
        }).catch(err => {
            console.log('Error when get API');
        });
};

function outputMatchCoffees(coffees) {
    if (coffees.length > 0) {
        const html = coffees.map(coffee=>
            `
            <tr>
                <th scope="row">${coffee.id}</th>
                <td>${coffee.name}</td>
                <td>
                    <div>
                        <a class="btn btn-secondary" href="/admins/coffees/${coffee.id}">Xem thông tin</a>
                        <a class="btn btn-danger" href="#">Xoá</a>
                    </div>
                </td>
            </tr>
            `
        ).join('');
        coffeesContainer.innerHTML = html;
    }
}

coffeeNameField.addEventListener('input', () => getCoffees(coffeeNameField.value))