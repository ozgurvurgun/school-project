
function total_price_total_number() {
localStorage.setItem("totalPrice", (Number(localStorage.getItem("oncu")) ));localStorage.setItem("totalNumber", (Number(localStorage.getItem("oncu")) ));document.querySelector("#item-count").innerHTML = localStorage.getItem("totalNumber"); 
document.querySelector("#total").innerHTML = localStorage.getItem("totalPrice");
}
window.onload = function () { price_print_all() } 
function price_print_all() {
}