//responsive navbar start
//classes
"use strict";
const cartItem = document.querySelector(".cart-items-container");
const navbar = document.querySelector(".navbar");
//buttons
const cartbtn = document.querySelector("#cart-btn");
const menuBtn = document.querySelector("#menu-btn");

cartbtn.addEventListener("click", function () {
    cartItem.classList.toggle("active");
    document.addEventListener("click", function (e) {
        if (!e.composedPath().includes(cartbtn) && !e.composedPath().includes(cartItem)) {
            cartItem.classList.remove("active");
        }
    })
});
menuBtn.addEventListener("click", function () {
    navbar.classList.toggle("active");
    document.addEventListener("click", function (e) {
        if (!e.composedPath().includes(menuBtn) && !e.composedPath().includes(navbar)) {
            navbar.classList.remove("active");
        }
    })
});
//responsive navbar end

//nakhla.php //visne  start
const visne = document.querySelector("#visne_add");
const visneFiyat = Number(document.querySelector("#visne_fiyat").innerHTML);
var visneAdet;
visne.addEventListener("click", toListVisne);
function toListVisne(par) {
    document.getElementById("shop-kapsayici-visne").style.display = "block";
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
    document.getElementById("shop-kapsayici-visne").innerHTML =
        '<div class="cart-item">' +
        '<button  type="button" class="fas fa-times" onclick="decrease();"></button>' +
        '<img src="../images/nargilejpg.jpg" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("visneName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("visneAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("visneFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    localStorage.setItem("totalVisneFiyat", localStorage.getItem("visneFiyat") * localStorage.getItem("visneAdet"));
    fiyatPrintVisne();
};
function fiyatPrintVisne() {   //bu fonksiyonu neden yazdığımı hatırlamıyorum. kaldırdığım da sepet güncellenmiyor. şu anlık buna kafa yormayacağım
    document.getElementById("shop-kapsayici-visne").innerHTML =
        '<div class="cart-item">' +
        '<button  type="button" class="fas fa-times" onclick="decreaseVisne();"></button>' +
        '<img src="../images/nargilejpg.jpg" alt="menu">' +
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
        const list = document.getElementById("shop-kapsayici-visne");
        list.removeChild(list.firstElementChild);
    }
    else {
        localStorage.setItem("visneAdet", localStorage.getItem("visneAdet") - 1);
        toListVisne("azalt"); //toListVisne fonksiyonuna "azalt" adında bir buyruk gönderiyorum. giden "azalt" değerini yakalayıp ürün azaltma işlemini yapıyorum.
        if (localStorage.getItem("visneAdet") < 1) {
            document.getElementById("shop-kapsayici-visne").style.display = "none";
        }
    }
}
//nakhla.php //visne  end

//nakhla.php //seftali  start
const seftali = document.querySelector("#seftali_add");
const seftaliFiyat = Number(document.querySelector("#seftali_fiyat").innerHTML);
var seftaliAdet;
seftali.addEventListener("click", toListSeftali);
function toListSeftali(par) {
    document.getElementById("shop-kapsayici-seftali").style.display = "block";
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
    document.getElementById("shop-kapsayici-seftali").innerHTML =
        '<div class="cart-item">' +
        '<button type="button" class="fas fa-times" onclick="decreaseSeftali();"></button>' +
        '<img src="../images/nargilejpg.jpg" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("seftaliName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("seftaliAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("seftaliFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    localStorage.setItem("totalSeftaliFiyat", localStorage.getItem("seftaliFiyat") * localStorage.getItem("seftaliAdet"));
    fiyatPrintSeftali();
};
function fiyatPrintSeftali() {
    document.getElementById("shop-kapsayici-seftali").innerHTML =
        '<div class="cart-item">' +
        '<button  type="button" class="fas fa-times" onclick="decreaseSeftali();"></button>' +
        '<img src="../images/nargilejpg.jpg" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("seftaliName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("seftaliAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("seftaliFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    topFiyatTopAdet();
}
// window.onload = function () { fiyatPrintAll() }
// function fiyatPrintAll() {
//     if (localStorage.getItem("visneAdet") > 0) {
//         document.getElementById("shop-kapsayici-visne").innerHTML =
//             '<div class="cart-item">' +
//             '<button  type="button" class="fas fa-times" onclick="decreaseVisne();"></button>' +
//             '<img src="../images/nargilejpg.jpg" alt="menu">' +
//             '<div class="content">' +
//             '<h3>' + localStorage.getItem("visneName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("visneAdet") + '</span> </h3>' +
//             '<div class="price">' + localStorage.getItem("visneFiyat") + '₺</div>' +
//             '</div>' +
//             '</div>';
//         topFiyatTopAdet();
//     }
//     if (localStorage.getItem("seftaliAdet") > 0) {
//         document.getElementById("shop-kapsayici-seftali").innerHTML =
//             '<div  class="cart-item">' +
//             '<button type="button" class="fas fa-times" onclick="decreaseSeftali();"></button>' +
//             '<img src="../images/nargilejpg.jpg" alt="menu">' +
//             '<div class="content">' +
//             '<h3>' + localStorage.getItem("seftaliName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("seftaliAdet") + '</span> </h3>' +
//             '<div" class="price">' + localStorage.getItem("seftaliFiyat") + '₺</div>' +
//             '</div>' +
//             '</div>';
//         topFiyatTopAdet();
//     }
// }
function decreaseSeftali() {
    if (localStorage.getItem("seftaliAdet") < 1) {
        const list = document.getElementById("shop-kapsayici-seftali");
        list.removeChild(list.firstElementChild);
    }
    else {
        localStorage.setItem("seftaliAdet", localStorage.getItem("seftaliAdet") - 1);
        toListSeftali("azalt");
        if (localStorage.getItem("seftaliAdet") < 1) {
            document.getElementById("shop-kapsayici-seftali").style.display = "none";
        }
    }
}
//nakhla.php //seftali end



//nakhla.php //cappucino start
const cappucino = document.querySelector("#cappucino_add");
const cappucinoFiyat = Number(document.querySelector("#cappucino_fiyat").innerHTML);
var cappucinoAdet;
cappucino.addEventListener("click", toListCappucino);
function toListCappucino(par) {
    document.getElementById("shop-kapsayici-cappucino").style.display = "block";
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
    document.getElementById("shop-kapsayici-cappucino").innerHTML =
        '<div class="cart-item">' +
        '<button type="button" class="fas fa-times" onclick="decreaseCappucino();"></button>' +
        '<img src="../images/nargilejpg.jpg" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("cappucinoName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("cappucinoAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("cappucinoFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    localStorage.setItem("totalCappucinoFiyat", localStorage.getItem("cappucinoFiyat") * localStorage.getItem("cappucinoAdet"));
    fiyatPrintCappucino();
};
function fiyatPrintCappucino() {
    document.getElementById("shop-kapsayici-cappucino").innerHTML =
        '<div class="cart-item">' +
        '<button  type="button" class="fas fa-times" onclick="decreaseCappucino();"></button>' +
        '<img src="../images/nargilejpg.jpg" alt="menu">' +
        '<div class="content">' +
        '<h3>' + localStorage.getItem("cappucinoName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("cappucinoAdet") + '</span> </h3>' +
        '<div class="price">' + localStorage.getItem("cappucinoFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    topFiyatTopAdet();
}




window.onload = function () { fiyatPrintAll() } //sayfa yüklenirken sepet içeriğini koruyan fonksiyon
function fiyatPrintAll() {    
    if (localStorage.getItem("visneAdet") > 0) {
        document.getElementById("shop-kapsayici-visne").innerHTML =
            '<div class="cart-item">' +
            '<button  type="button" class="fas fa-times" onclick="decreaseVisne();"></button>' +
            '<img src="../images/nargilejpg.jpg" alt="menu">' +
            '<div class="content">' +
            '<h3>' + localStorage.getItem("visneName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("visneAdet") + '</span> </h3>' +
            '<div class="price">' + localStorage.getItem("visneFiyat") + '₺</div>' +
            '</div>' +
            '</div>';
        topFiyatTopAdet();
    }
    if (localStorage.getItem("seftaliAdet") > 0) {
        document.getElementById("shop-kapsayici-seftali").innerHTML =
            '<div  class="cart-item">' +
            '<button type="button" class="fas fa-times" onclick="decreaseSeftali();"></button>' +
            '<img src="../images/nargilejpg.jpg" alt="menu">' +
            '<div class="content">' +
            '<h3>' + localStorage.getItem("seftaliName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("seftaliAdet") + '</span> </h3>' +
            '<div" class="price">' + localStorage.getItem("seftaliFiyat") + '₺</div>' +
            '</div>' +
            '</div>';
        topFiyatTopAdet();
    }

    if (localStorage.getItem("cappucinoAdet") > 0) {
        document.getElementById("shop-kapsayici-cappucino").innerHTML =
            '<div class="cart-item">' +
            '<button  type="button" class="fas fa-times" onclick="decreaseCappucino();"></button>' +
            '<img src="../images/nargilejpg.jpg" alt="menu">' +
            '<div class="content">' +
            '<h3>' + localStorage.getItem("cappucinoName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("cappucinoAdet") + '</span> </h3>' +
            '<div class="price">' + localStorage.getItem("cappucinoFiyat") + '₺</div>' +
            '</div>' +
            '</div>';
        topFiyatTopAdet();
    }

}
//nakhla.php //decrease start
function decreaseCappucino() {
    if (localStorage.getItem("cappucinoAdet") < 1) {
        const list = document.getElementById("shop-kapsayici-cappucino");
        list.removeChild(list.firstElementChild);
    }
    else {
        localStorage.setItem("cappucinoAdet", localStorage.getItem("cappucinoAdet") - 1);
        toListCappucino("azalt");
        if (localStorage.getItem("cappucinoAdet") < 1) {
            document.getElementById("shop-kapsayici-cappucino").style.display = "none";
        }
    }
}
//nakhla.php //cappucino end


//nakhla php sayfasının toplam ürün adedi ve sayısını hesaplama
function topFiyatTopAdet() {
    localStorage.setItem("totalFiyat", (Number(localStorage.getItem("totalSeftaliFiyat")) + Number(localStorage.getItem("totalVisneFiyat")) + Number(localStorage.getItem("totalCappucinoFiyat"))));
    localStorage.setItem("totalAdet", (Number(localStorage.getItem("seftaliAdet")) + Number(localStorage.getItem("visneAdet")) + Number(localStorage.getItem("cappucinoAdet"))));
    document.querySelector("#item-count").innerHTML = localStorage.getItem("totalAdet");
    document.querySelector("#total").innerHTML = localStorage.getItem("totalFiyat");
}






