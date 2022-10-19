"use strict";
let urlPath = window.location.pathname;
let imgPage;
if (urlPath === "/dejavu_hookah/" || urlPath === "/dejavu_hookah/index.php") {
    imgPage = "images/nargilejpg.jpg";
}
else {
    imgPage = "../images/nargilejpg.jpg";
}
var url;
url = window.location.pathname;
if (url === "/dejavu_hookah/pages/nakhla.php") {
    //alert(window.location.pathname)
}

//////////////NAKHLA.PHP VISNE START
const visne = document.querySelector("#visne_add");
const visneFiyat = Number(document.querySelector("#visne_fiyat").innerHTML);
var visneAdet;
visne.addEventListener("click", toListVisne);
function toListVisne(par) {
    document.getElementById("shop-kapsayici-nakhla-visne").style.display = "block";
    if (par == "azalt") { //parametreye "azalt" stringine eşit ise vişne ürününü bir azalt
        visneAdet--;
        // localStorage.setItem("visneAdet", 0);  // değer çok büyürse sıfırlamak için
    }
    if (localStorage.getItem("visneAdet") == "null" || localStorage.getItem("visneAdet") == "undefined" || localStorage.getItem("visneAdet") == "NaN") {
        localStorage.setItem("visneAdet", 0);
        visneAdet = localStorage.getItem("visneAdet");
    }
    visneAdet = localStorage.getItem("visneAdet");
    if (par != "azalt") { // parametre "azalt" stringine eşit değilse click olayında vişne ürün sayısı bir art
        visneAdet++;
    }
    localStorage.setItem("visneName", "vişne");
    localStorage.setItem("visneFiyat", visneFiyat);
    localStorage.setItem("visneAdet", visneAdet);
    document.getElementById("shop-kapsayici-nakhla-visne").innerHTML =
        '<div class="cart-item">' +
        '<button  type="button" class="fas fa-times" onclick="decrease();"></button>' +
        '<img src="' + imgPage + '" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("visneName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("visneAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("visneFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    localStorage.setItem("totalVisneFiyat", localStorage.getItem("visneFiyat") * localStorage.getItem("visneAdet"));
    fiyatPrintVisne();
};
function fiyatPrintVisne() {   //bu fonksiyonu neden yazdığımı hatırlamıyorum. kaldırdığım da sepet güncellenmiyor. şu anlık buna kafa yormayacağım
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
//ürün silme
function decreaseVisne() {
    if (localStorage.getItem("visneAdet") < 1) {
        const list = document.getElementById("shop-kapsayici-nakhla-visne");
        list.removeChild(list.firstElementChild);
    }
    else {
        localStorage.setItem("visneAdet", localStorage.getItem("visneAdet") - 1);
        toListVisne("azalt"); //toListVisne fonksiyonuna "azalt" adında bir buyruk gönderiyorum. giden "azalt" değerini yakalayıp ürün azaltma işlemini yapıyorum.
        if (localStorage.getItem("visneAdet") < 1) {
            document.getElementById("shop-kapsayici-nakhla-visne").style.display = "none";
        }
    }
}
//////////////NAKHLA.PHP VISNE END

//////////////NAKHLA.PHP SEFTALI START
const seftali = document.querySelector("#seftali_add");
const seftaliFiyat = Number(document.querySelector("#seftali_fiyat").innerHTML);
var seftaliAdet;
seftali.addEventListener("click", toListSeftali);
function toListSeftali(par) {
    document.getElementById("shop-kapsayici-nakhla-seftali").style.display = "block";
    if (par == "azalt") {
        seftaliAdet--;
        // localStorage.setItem("visneAdet", 0);  // değer çok büyürse sıfırlamak için
    }
    if (localStorage.getItem("seftaliAdet") == "null" || localStorage.getItem("seftaliAdet") == "undefined" || localStorage.getItem("seftaliAdet") == "NaN") {
        localStorage.setItem("seftaliAdet", 0);
        seftaliAdet = localStorage.getItem("seftaliAdet");
    }
    seftaliAdet = localStorage.getItem("seftaliAdet");
    if (par != "azalt") {
        seftaliAdet++;
    }
    localStorage.setItem("seftaliName", "şeftali");
    localStorage.setItem("seftaliFiyat", seftaliFiyat);
    localStorage.setItem("seftaliAdet", seftaliAdet);
    document.getElementById("shop-kapsayici-nakhla-seftali").innerHTML =
        '<div class="cart-item">' +
        '<button type="button" class="fas fa-times" onclick="decreaseSeftali();"></button>' +
        '<img src="' + imgPage + '" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("seftaliName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("seftaliAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("seftaliFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    localStorage.setItem("totalSeftaliFiyat", localStorage.getItem("seftaliFiyat") * localStorage.getItem("seftaliAdet"));
    fiyatPrintSeftali();
};
function fiyatPrintSeftali() {
    document.getElementById("shop-kapsayici-nakhla-seftali").innerHTML =
        '<div class="cart-item">' +
        '<button  type="button" class="fas fa-times" onclick="decreaseSeftali();"></button>' +
        '<img src="' + imgPage + '" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("seftaliName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("seftaliAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("seftaliFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    topFiyatTopAdet();
}
function decreaseSeftali() {
    if (localStorage.getItem("seftaliAdet") < 1) {
        const list = document.getElementById("shop-kapsayici-nakhla-seftali");
        list.removeChild(list.firstElementChild);
    }
    else {
        localStorage.setItem("seftaliAdet", localStorage.getItem("seftaliAdet") - 1);
        toListSeftali("azalt");
        if (localStorage.getItem("seftaliAdet") < 1) {
            document.getElementById("shop-kapsayici-nakhla-seftali").style.display = "none";
        }
    }
}
//////////////NAKHLA.PHP SEFTALI END



//////////////NAKHLA.PHP CAPPUCINO START
const cappucino = document.querySelector("#cappucino_add");
const cappucinoFiyat = Number(document.querySelector("#cappucino_fiyat").innerHTML);
var cappucinoAdet;
cappucino.addEventListener("click", toListCappucino);
function toListCappucino(par) {
    document.getElementById("shop-kapsayici-nakhla-cappucino").style.display = "block";
    if (par == "azalt") {
        cappucinoAdet--;
        // localStorage.setItem("visneAdet", 0);  // değer çok büyürse sıfırlamak için
    }
    if (localStorage.getItem("cappucinoAdet") == "null" || localStorage.getItem("cappucinoiAdet") == "undefined" || localStorage.getItem("cappucinoAdet") == "NaN") {
        localStorage.setItem("cappucinoAdet", 0);
        cappucinoAdet = localStorage.getItem("cappucinoiAdet");
    }
    cappucinoAdet = localStorage.getItem("cappucinoAdet");
    if (par != "azalt") {
        cappucinoAdet++;
    }
    localStorage.setItem("cappucinoName", "cappucino");
    localStorage.setItem("cappucinoFiyat", cappucinoFiyat);
    localStorage.setItem("cappucinoAdet", cappucinoAdet);
    document.getElementById("shop-kapsayici-nakhla-cappucino").innerHTML =
        '<div class="cart-item">' +
        '<button type="button" class="fas fa-times" onclick="decreaseCappucino();"></button>' +
        '<img src="' + imgPage + '" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("cappucinoName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("cappucinoAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("cappucinoFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    localStorage.setItem("totalCappucinoFiyat", localStorage.getItem("cappucinoFiyat") * localStorage.getItem("cappucinoAdet"));
    fiyatPrintCappucino();
};
function fiyatPrintCappucino() {
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
function decreaseCappucino() {
    if (localStorage.getItem("cappucinoAdet") < 1) {
        const list = document.getElementById("shop-kapsayici-nakhla-cappucino");
        list.removeChild(list.firstElementChild);
    }
    else {
        localStorage.setItem("cappucinoAdet", localStorage.getItem("cappucinoAdet") - 1);
        toListCappucino("azalt");
        if (localStorage.getItem("cappucinoAdet") < 1) {
            document.getElementById("shop-kapsayici-nakhla-cappucino").style.display = "none";
        }
    }
}
//////////////NAKHLA.PHP CAPPUCINO END



//////////////ALFAKHER.PHP UZUM START
const alfakherUzum = document.querySelector("#alfakher-uzum-add");
const alfakherUzumFiyat = Number(document.querySelector("#alfakher-uzum-fiyat").innerHTML);
var alfakherUzumAdet;
alfakherUzum.addEventListener("click", toListAlfakherUzum);
function toListAlfakherUzum(par) {
    document.getElementById("shop-kapsayici-alfakher-uzum").style.display = "block";
    if (par == "azalt") {
        alfakherUzumAdet--;
        // localStorage.setItem("visneAdet", 0);  // değer çok büyürse sıfırlamak için
    }
    if (localStorage.getItem("alfakherUzumAdet") == "null" || localStorage.getItem("alfakherUzumAdet") == "undefined" || localStorage.getItem("alfakherUzumAdet") == "NaN") {
        localStorage.setItem("alfakherUzumAdet", 0);
        alfakherUzumAdet = localStorage.getItem("alfakherUzumAdet");
    }
    alfakherUzumAdet = localStorage.getItem("alfakherUzumAdet");
    if (par != "azalt") {
        alfakherUzumAdet++;
    }
    localStorage.setItem("alfakherUzumName", "üzüm");
    localStorage.setItem("alfakherUzumFiyat", alfakherUzumFiyat);
    localStorage.setItem("alfakherUzumAdet", alfakherUzumAdet);
    document.getElementById("shop-kapsayici-alfakher-uzum").innerHTML =
        '<div class="cart-item">' +
        '<button type="button" class="fas fa-times" onclick="decreaseAlfakherUzum();"></button>' +
        '<img src="' + imgPage + '" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("alfakherUzumName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("alfakherUzumAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("alfakherUzumFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    localStorage.setItem("totalalfakherUzumFiyat", localStorage.getItem("alfakherUzumFiyat") * localStorage.getItem("alfakherUzumAdet"));
    fiyatPrintAlfakherUzum();
};
function fiyatPrintAlfakherUzum() {
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
function decreaseAlfakherUzum() {
    if (localStorage.getItem("alfakherUzumAdet") < 1) {
        const listAlfakher = document.getElementById("shop-kapsayici-alfakher-uzum");
        listAlfakher.removeChild(list.firstElementChild);
    }
    else {
        localStorage.setItem("alfakherUzumAdet", localStorage.getItem("alfakherUzumAdet") - 1);
        toListAlfakherUzum("azalt");
        if (localStorage.getItem("alfakherUzumAdet") < 1) {
            document.getElementById("shop-kapsayici-alfakher-uzum").style.display = "none";
        }
    }
}
//////////////ALFAKHER.PHP UZUM END




//////////////ALFAKHER.PHP KAVUN START
const alfakherKavun = document.querySelector("#alfakher-kavun-add");
const alfakherKavunFiyat = Number(document.querySelector("#alfakher-kavun-fiyat").innerHTML);
var alfakherKavunAdet;
alfakherKavun.addEventListener("click", toListAlfakherKavun);
function toListAlfakherKavun(par) {
    document.getElementById("shop-kapsayici-alfakher-kavun").style.display = "block";
    if (par == "azalt") {
        alfakherKavunAdet--;
        // localStorage.setItem("visneAdet", 0);  // değer çok büyürse sıfırlamak için
    }
    if (localStorage.getItem("alfakherKavunAdet") == "null" || localStorage.getItem("alfakherKavunAdet") == "undefined" || localStorage.getItem("alfakherKavunAdet") == "NaN") {
        localStorage.setItem("alfakherKavunAdet", 0);
        alfakherKavunAdet = localStorage.getItem("alfakherKavunAdet");
    }
    alfakherKavunAdet = localStorage.getItem("alfakherKavunAdet");
    if (par != "azalt") {
        alfakherKavunAdet++;
    }
    localStorage.setItem("alfakherKavunName", "Kavun");
    localStorage.setItem("alfakherKavunFiyat", alfakherKavunFiyat);
    localStorage.setItem("alfakherKavunAdet", alfakherKavunAdet);
    document.getElementById("shop-kapsayici-alfakher-kavun").innerHTML =
        '<div class="cart-item">' +
        '<button type="button" class="fas fa-times" onclick="decreaseAlfakherKavun();"></button>' +
        '<img src="' + imgPage + '" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("alfakherKavunName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("alfakherKavunAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("alfakherKavunFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    localStorage.setItem("totalalfakherKavunFiyat", localStorage.getItem("alfakherKavunFiyat") * localStorage.getItem("alfakherKavunAdet"));
    fiyatPrintAlfakherKavun();
};
function fiyatPrintAlfakherKavun() {
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
function decreaseAlfakherKavun() {
    if (localStorage.getItem("alfakherKavunAdet") < 1) {
        const listAlfakher = document.getElementById("shop-kapsayici-alfakher-kavun");
        listAlfakher.removeChild(list.firstElementChild);
    }
    else {
        localStorage.setItem("alfakherKavunAdet", localStorage.getItem("alfakherKavunAdet") - 1);
        toListAlfakherKavun("azalt");
        if (localStorage.getItem("alfakherKavunAdet") < 1) {
            document.getElementById("shop-kapsayici-alfakher-kavun").style.display = "none";
        }
    }
}
//////////////ALFAKHER.PHP KAVUN END



//////////////ALFAKHER.PHP CIFT ELMA START
const alfakherCelma = document.querySelector("#alfakher-ciftelma-add");
const alfakherCelmaFiyat = Number(document.querySelector("#alfakher-ciftelma-fiyat").innerHTML);
var alfakherCelmaAdet;
alfakherCelma.addEventListener("click", toListAlfakherCelma);
function toListAlfakherCelma(par) {
    document.getElementById("shop-kapsayici-alfakher-ciftelma").style.display = "block";
    if (par == "azalt") {
        alfakherCelmaAdet--;
        // localStorage.setItem("visneAdet", 0);  // değer çok büyürse sıfırlamak için
    }
    if (localStorage.getItem("alfakherCelmaAdet") == "null" || localStorage.getItem("alfakherCelmaAdet") == "undefined" || localStorage.getItem("alfakherCelmaAdet") == "NaN") {
        localStorage.setItem("alfakherCelmaAdet", 0);
        alfakherCelmaAdet = localStorage.getItem("alfakherCelmaAdet");
    }
    alfakherCelmaAdet = localStorage.getItem("alfakherCelmaAdet");
    if (par != "azalt") {
        alfakherCelmaAdet++;
    }
    localStorage.setItem("alfakherCelmaName", "çift elma");
    localStorage.setItem("alfakherCelmaFiyat", alfakherCelmaFiyat);
    localStorage.setItem("alfakherCelmaAdet", alfakherCelmaAdet);
    document.getElementById("shop-kapsayici-alfakher-ciftelma").innerHTML =
        '<div class="cart-item">' +
        '<button type="button" class="fas fa-times" onclick="decreaseAlfakherCelma();"></button>' +
        '<img src="' + imgPage + '" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("alfakherCelmaName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("alfakherCelmaAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("alfakherCelmaFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    localStorage.setItem("totalalfakherCelmaFiyat", localStorage.getItem("alfakherCelmaFiyat") * localStorage.getItem("alfakherCelmaAdet"));
    fiyatPrintAlfakherCelma();
};
function fiyatPrintAlfakherCelma() {
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
function decreaseAlfakherCelma() {
    if (localStorage.getItem("alfakherCelmaAdet") < 1) {
        const listAlfakher = document.getElementById("shop-kapsayici-alfakher-ciftelma");
        listAlfakher.removeChild(list.firstElementChild);
    }
    else {
        localStorage.setItem("alfakherCelmaAdet", localStorage.getItem("alfakherCelmaAdet") - 1);
        toListAlfakherCelma("azalt");
        if (localStorage.getItem("alfakherCelmaAdet") < 1) {
            document.getElementById("shop-kapsayici-alfakher-ciftelma").style.display = "none";
        }
    }
}
//////////////ALFAKHER.PHP CIFT ELMA END







