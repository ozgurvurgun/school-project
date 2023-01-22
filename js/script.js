"use strict";
let imgPage;
imgPage = "../images/product-images/";
if (window.location.pathname == "/dejavu_hookah/index.php" || window.location.pathname == "/dejavu_hookah/") {
    imgPage = "images/product-images/";
}
const adalya_deneme = document.querySelector("#adalya-deneme-add");
const adalya_deneme_price = Number(document.querySelector("#adalya-deneme-price").innerHTML);
var adalya_deneme_number;
adalya_deneme.addEventListener("click", tolist_adalya_deneme);
function tolist_adalya_deneme(par) {
    document.getElementById("shop-container-adalya-deneme").style.display = "block";
    if (par == "azalt") {
        adalya_deneme_number--;
    }
    if (localStorage.getItem("adalya-deneme-number") == "null" || localStorage.getItem("adalya-deneme-number") == "undefined" || localStorage.getItem("adalya-deneme-number") == "NaN") {
        localStorage.setItem("adalya-deneme-number", 0);
        adalya_deneme_number = localStorage.getItem("adalya-deneme-number");
    }
    adalya_deneme_number = localStorage.getItem("adalya-deneme-number");
    if (par != "azalt") { // parametre "azalt" stringine eşit değilse ürün sayısı bir art
        adalya_deneme_number++;
    }
    localStorage.setItem("adalya-deneme-name", "deneme");
    localStorage.setItem("adalya-deneme-price", adalya_deneme_price);
    localStorage.setItem("adalya-deneme-number", adalya_deneme_number);
    document.getElementById("shop-container-adalya-deneme").innerHTML =
        '<div class="cart-item">' +
        '<button  type="button" class="fas fa-times" onclick="decrease_adalya_deneme();"></button>' +
        '<img src="' + imgPage + 'deneme.jpg" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("adalya-deneme-name") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("adalya-deneme-number") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("adalya-deneme-price") + '₺</div>' +
        '</div>' +
        '</div>';
    localStorage.setItem("total-adalya-deneme-price", localStorage.getItem("adalya-deneme-price") * localStorage.getItem("adalya-deneme-number"));
    price_print_adalya_deneme();
}
function price_print_adalya_deneme() {
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
function decrease_adalya_deneme() {
    if (localStorage.getItem("adalya-deneme-number") < 1) {
        const list = document.getElementById("shop-container-adalya-deneme");
        list.removeChild(list.firstElementChild);
        localStorage.removeItem("adalya-deneme-number");
        localStorage.removeItem("adalya-deneme-price");
        localStorage.removeItem("total-adalya-deneme-price");
    }
    else {
        localStorage.setItem("adalya-deneme-number", localStorage.getItem("adalya-deneme-number") - 1);
        tolist_adalya_deneme("azalt");
        if (localStorage.getItem("adalya-deneme-number") < 1) {
            document.getElementById("shop-container-adalya-deneme").style.display = "none";
        }
    }
} 