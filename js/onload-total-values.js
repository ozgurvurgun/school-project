//////////////////////////////////TOPLAM FİYAT VE ÜRÜN ADEDİ
function topFiyatTopAdet() {
    localStorage.setItem("totalFiyat", (Number(localStorage.getItem("totalSeftaliFiyat")) + Number(localStorage.getItem("totalVisneFiyat")) + Number(localStorage.getItem("totalCappucinoFiyat")) + Number(localStorage.getItem("totalalfakherUzumFiyat")) + Number(localStorage.getItem("totalalfakherKavunFiyat")) + Number(localStorage.getItem("totalalfakherCelmaFiyat"))));
    localStorage.setItem("totalAdet", (Number(localStorage.getItem("seftaliAdet")) + Number(localStorage.getItem("visneAdet")) + Number(localStorage.getItem("cappucinoAdet")) + Number(localStorage.getItem("alfakherUzumAdet")) + Number(localStorage.getItem("alfakherKavunAdet")) + Number(localStorage.getItem("alfakherCelmaAdet"))));
    document.querySelector("#item-count").innerHTML = localStorage.getItem("totalAdet");
    document.querySelector("#total").innerHTML = localStorage.getItem("totalFiyat");
}
window.onload = function () { fiyatPrintAll() }
function fiyatPrintAll() {
    if (localStorage.getItem("visneAdet") > 0) {
        document.getElementById("shop-kapsayici-nakhla-visne").innerHTML =
            '<div class="cart-item">' +
            '<button  type="button" class="fas fa-times" onclick="decreaseVisne();"></button>' +
            '<img src="' + imgPage + '" alt="menu">' +
            '<div class="content">' +
            '<h3>' + localStorage.getItem("visneName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("visneAdet") + '</span> </h3>' +
            '<div class="price">' + localStorage.getItem("visneFiyat") + '₺</div>' +
            '</div>' +
            '</div>';
        topFiyatTopAdet();
    }
    if (localStorage.getItem("seftaliAdet") > 0) {
        document.getElementById("shop-kapsayici-nakhla-seftali").innerHTML =
            '<div  class="cart-item">' +
            '<button type="button" class="fas fa-times" onclick="decreaseSeftali();"></button>' +
            '<img src="' + imgPage + '" alt="menu">' +
            '<div class="content">' +
            '<h3>' + localStorage.getItem("seftaliName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("seftaliAdet") + '</span> </h3>' +
            '<div" class="price">' + localStorage.getItem("seftaliFiyat") + '₺</div>' +
            '</div>' +
            '</div>';
        topFiyatTopAdet();
    }
    if (localStorage.getItem("cappucinoAdet") > 0) {
        document.getElementById("shop-kapsayici-nakhla-cappucino").innerHTML =
            '<div class="cart-item">' +
            '<button  type="button" class="fas fa-times" onclick="decreaseCappucino();"></button>' +
            '<img src="' + imgPage + '" alt="menu">' +
            '<div class="content">' +
            '<h3>' + localStorage.getItem("cappucinoName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("cappucinoAdet") + '</span> </h3>' +
            '<div class="price">' + localStorage.getItem("cappucinoFiyat") + '₺</div>' +
            '</div>' +
            '</div>';
        topFiyatTopAdet();
    }
    if (localStorage.getItem("alfakherUzumAdet") > 0) {
        document.getElementById("shop-kapsayici-alfakher-uzum").innerHTML =
            '<div class="cart-item">' +
            '<button  type="button" class="fas fa-times" onclick="decreaseAlfakherUzum();"></button>' +
            '<img src="' + imgPage + '" alt="menu">' +
            '<div class="content">' +
            '<h3>' + localStorage.getItem("alfakherUzumName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("alfakherUzumAdet") + '</span> </h3>' +
            '<div class="price">' + localStorage.getItem("alfakherUzumFiyat") + '₺</div>' +
            '</div>' +
            '</div>';
        topFiyatTopAdet();
    }
    if (localStorage.getItem("alfakherKavunAdet") > 0) {
        document.getElementById("shop-kapsayici-alfakher-kavun").innerHTML =
            '<div class="cart-item">' +
            '<button  type="button" class="fas fa-times" onclick="decreaseAlfakherKavun();"></button>' +
            '<img src="' + imgPage + '" alt="menu">' +
            '<div class="content">' +
            '<h3>' + localStorage.getItem("alfakherKavunName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("alfakherKavunAdet") + '</span> </h3>' +
            '<div class="price">' + localStorage.getItem("alfakherKavunFiyat") + '₺</div>' +
            '</div>' +
            '</div>';
        topFiyatTopAdet();
    }
    if (localStorage.getItem("alfakherCelmaAdet") > 0) {
        document.getElementById("shop-kapsayici-alfakher-ciftelma").innerHTML =
            '<div class="cart-item">' +
            '<button  type="button" class="fas fa-times" onclick="decreaseAlfakherCelma();"></button>' +
            '<img src="' + imgPage + '" alt="menu">' +
            '<div class="content">' +
            '<h3>' + localStorage.getItem("alfakherCelmaName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("alfakherCelmaAdet") + '</span> </h3>' +
            '<div class="price">' + localStorage.getItem("alfakherCelmaFiyat") + '₺</div>' +
            '</div>' +
            '</div>';
        topFiyatTopAdet();
    }
}