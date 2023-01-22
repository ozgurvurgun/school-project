
function total_price_total_number() {
    localStorage.setItem("totalPrice", (Number(localStorage.getItem("oncu")) + Number(localStorage.getItem("total-adalya-deneme-price")))); localStorage.setItem("totalNumber", (Number(localStorage.getItem("oncu")) + Number(localStorage.getItem("adalya-deneme-number")))); document.querySelector("#item-count").innerHTML = localStorage.getItem("totalNumber");
    document.querySelector("#total").innerHTML = localStorage.getItem("totalPrice");
}
window.onload = function () { price_print_all() }
function price_print_all() {

    if (localStorage.getItem("adalya-deneme-number") > 0) {
        document.getElementById("shop-container-adalya-deneme").innerHTML =
            '<div class="cart-item">' +
            '<button  type="button" class="fas fa-times" onclick="decrease_adalya_deneme();"></button>' +
            '<img src="' + imgPage + 'deneme.jpg" alt="menu">' +
            '<div class="content">' +
            '<h3>' + localStorage.getItem("adalya-deneme-name") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("adalya-deneme-number") + '</span> </h3>' +
            '<div class="price">' + localStorage.getItem("adalya-deneme-price") + '₺</div>' +
            '</div>' +
            '</div>';
        total_price_total_number();
    }
}