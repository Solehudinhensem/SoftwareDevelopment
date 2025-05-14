const urlParams = new URLSearchParams(window.location.search);
const totalPrice = urlParams.get('total');
const productNamesString = urlParams.get('productNames');

        // Split the product names string into an array
const productNames = productNamesString.split(',');

        // Get the element where you want to display the total price
const totalPriceElement = document.getElementById('totalPrice');

        // Display the total price
totalPriceElement.textContent = totalPrice;

        // Display the product names
const productListElement = document.getElementById('productList');
productListElement.textContent = productNamesString;

        // Function to redirect to invoice page with total price appended to the URL
function redirectToInvoice() {
window.location.href = `invoice.html?total=${totalPrice}`;
    }
    

    