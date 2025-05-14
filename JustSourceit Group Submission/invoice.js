function printInvoice(){
    window.print();
}
function logout(){
      window.location.href = 'index.php';
 }
const urlParams = new URLSearchParams(window.location.search);
const totalPrice = urlParams.get('total');


const invoiceTotalPriceElement = document.getElementById('invoiceTotalPrice');

invoiceTotalPriceElement.textContent = totalPrice;