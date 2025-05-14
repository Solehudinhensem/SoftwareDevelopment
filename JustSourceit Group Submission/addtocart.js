let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'Skittles',
        image: '1.jpeg',
        price: 4.00
    },
    {
        id: 2,
        name: 'Sugus',
        image: '2.jpeg',
        price: 3.50
    },
    {
        id: 3,
        name: 'Halls',
        image: '3.jpeg',
        price: 3.50
    },
    {
        id: 4,
        name: 'Eclipse',
        image: '4.jpeg',
        price: 5.00
    },
    {
        id: 5,
        name: 'Halss XS',
        image: '5.jpeg',
        price: 4.00
    },
    {
        id: 6,
        name: 'Mentos',
        image: '6.jpeg',
        price: 5.00
    },
    {
        id: 7,
        name: 'Goodday',
        image: '7.jpeg',
        price: 3.50
    },
    {
        id: 8,
        name: 'Seasons Drink',
        image: '8.jpeg',
        price: 2.00
    },
    {
        id: 9,
        name: 'Milo',
        image: '9.jpeg',
        price: 3.00
    },
    {
        id: 10,
        name: 'Chipster',
        image: '10.jpeg',
        price: 3.50
    },
    {
        id: 11,
        name: 'Wonda Mocha',
        image: '11.jpeg',
        price: 4.00
    },
    {
        id: 12,
        name: 'Calpis',
        image: '12.jpeg',
        price: 3.50
    },
    {
        id: 13,
        name: 'F AND N',
        image: '13.jpeg',
        price: 3.00
    },
    {
        id: 14,
        name: 'Ribena',
        image: '14.jpeg',
        price: 5.00
    },
    {
        id: 15,
        name: 'Seasons Ice Lemon Tea',
        image: '15.jpeg',
        price: 4.50
    },
    {
        id: 16,
        name: 'Pepsi',
        image: '16.jpeg',
        price: 3.00
    },
    {
        id: 17,
        name: 'Lipton',
        image: '17.jpeg',
        price: 5.00
    },
    {
        id: 18,
        name: 'Oyoshi',
        image: '18.jpeg',
        price: 2.50
    },
    {
        id: 19,
        name: '100 Plus',
        image: '19.jpeg',
        price: 3.00
    },
     {
        id: 20,
        name: 'Nescafe Tarik',
        image: '20.jpeg',
        price: 4.00
    },
    {
        id: 21,
        name: 'Oreo',
        image: '21.jpeg',
        price: 5.00
    },
    {
        id: 22,
        name: 'Chipsmore',
        image: '22.jpeg',
        price: 4.00
    },
    {
        id: 23,
        name: 'Tiger',
        image: '23.jpeg',
        price: 4.50
    },
    {
        id: 24,
        name: 'Jacker',
        image: '24.jpeg',
        price: 7.00
    },
    {
        id: 25,
        name: 'Mister Potato',
        image: '25.jpeg',
        price: 5.00
    },
    {
        id: 26,
        name: 'Twister',
        image: '26.jpeg',
        price: 3.00
    },
    {
        id: 27,
        name: 'Tao Kae Noi',
        image: '27.jpeg',
        price: 5.00
    },
    {
        id: 28,
        name: 'Tong Garden',
        image: '28.jpeg',
        price: 3.00
    },
    {
        id: 29,
        name: 'Suoer Rings',
        image: '29.jpeg',
        price: 4.00
    },
    {
        id: 30,
        name: 'Zess Biscuits',
        image: '30.jpeg',
        price: 3.00
    },
];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="images/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="images/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}
// Get the search input element
const searchInput = document.getElementById('searchInput');

// Add event listener for input event to detect changes in the search input
searchInput.addEventListener('input', function() {
    // Get the search query
    const query = searchInput.value.toLowerCase();
    
    // Filter products based on the search query
    const filteredProducts = products.filter(product => {
        return product.name.toLowerCase().includes(query);
    });
    
    // Update the UI with filtered products
    updateProductList(filteredProducts);
});

// Function to update the product list with filtered products
function updateProductList(filteredProducts) {
    // Clear the existing product list
    list.innerHTML = '';
    
    // Iterate over filtered products and create new list items
    filteredProducts.forEach((product, index) => {
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="images/${product.image}">
            <div class="title">${product.name}</div>
            <div class="price">${product.price.toLocaleString()}</div>
            <button onclick="addToCard(${index})">Add To Card</button>`;
        list.appendChild(newDiv);
    });
}
document.querySelector('.total').addEventListener('click', () => {
    const totalPrice = total.innerText;
    const encodedTotalPrice = encodeURIComponent(totalPrice);
    
    // Extracting only the product names from listCards
    const productNames = listCards.map(product => product.name);
    
    // Join the product names array into a single string with commas as separators
    const productNamesString = productNames.join(', ');

    // Pass both total price and product names as query parameters
    window.location.href = `checkout.html?total=${encodedTotalPrice}&productNames=${encodeURIComponent(productNamesString)}`;
});

