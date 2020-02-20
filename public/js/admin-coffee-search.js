const coffeeNameField = document.querySelector('#coffee-name');
const coffeesContainer = document.querySelector('#coffees-container');
const coffeeNameList = Array.from(document.querySelectorAll('.coffee-name'));

function getCoffees(searchText) {
    const html = coffeeNameList.filter(coffee => {
        return coffee.textContent.toLowerCase().includes(searchText.toLowerCase());
    }).map(coffee =>
        `
        <tr>
            <th scope="row">${coffee.dataset.id}</th>
            <div>
                <td><a class="coffee-name" data-id="${coffee.dataset.id}" href="/admins/coffees/${coffee.dataset.id}">${coffee.textContent}</a></td>
            </div>
            
        </tr>
        `
    ).join('');
    coffeesContainer.innerHTML = html;
}

coffeeNameField.addEventListener('input', () => getCoffees(coffeeNameField.value));