//responsive navbar start
//classes
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
alert(localStorage.getItem("visneAdet"));

const visne = document.querySelector("#visne_add");
const visneFiyat = Number(document.querySelector("#visne_fiyat").innerHTML);
var totalFiyat;
var visneAdet
visne.addEventListener("click", toList);
function toList(par) {
    if (localStorage.getItem("visneAdet") == "null" || localStorage.getItem("visneAdet") == "undefined" || localStorage.getItem("visneAdet") == "NaN") {
        alert("ozgururur")
        localStorage.setItem("visneAdet", 0);
        visneAdet = localStorage.getItem("visneAdet");
    }
    visneAdet = localStorage.getItem("visneAdet");
    visneAdet++;
    localStorage.setItem("visneName", "vişne");
    localStorage.setItem("visneFiyat", visneFiyat);
    localStorage.setItem("totalFiyat", localStorage.getItem("visneFiyat"));
    localStorage.setItem("visneAdet", visneAdet);
    localStorage.setItem("totalAdet", localStorage.getItem("visneAdet"));
    document.getElementById("shop-kapsayici").firstElementChild.innerHTML =
        '<div id="remove" class="cart-item">' +
        '<button id="remove2" type="button" class="fas fa-times" onclick="decrease();"></button>' +
        '<img id="remove3" class="delete" src="../images/nargilejpg.jpg" alt="menu">' +
        '<div id="kapsayici" class="content">' +
        '<h3 id="cesit">' + localStorage.getItem("visneName") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("visneAdet") + '</span> </h3>' +
        '<div id="fiyat" class="price">' + localStorage.getItem("visneFiyat") + '₺</div>' +
        '</div>' +
        '</div>';
    document.querySelector("#item-count").innerHTML = localStorage.getItem("totalAdet");
    totalFiyat = localStorage.getItem("totalFiyat") * localStorage.getItem("totalAdet");
    document.querySelector("#total").innerHTML = totalFiyat;
};
//nakhla.php //visne  end
//nakhla.php //decrease start
function decrease() {
    if (localStorage.getItem("visneAdet") < 1) {
        const list = document.getElementById("shop-kapsayici2");
        list.removeChild(list.firstElementChild);
        const list2 = document.getElementById("remove2");
        list.removeChild(list.firstElementChild);
        const list3 = document.getElementById("remove3");
        list.removeChild(list.firstElementChild);
        const list4 = document.getElementById("kapsayici");
        list.removeChild(list.firstElementChild);
        const list5 = document.getElementById("cesit");
        list.removeChild(list.firstElementChild);
        const list6 = document.getElementById("miktar");
        list.removeChild(list.firstElementChild);
        const list7 = document.getElementById("fiyat");
        list.removeChild(list.firstElementChild);

    }
    else {
        localStorage.setItem("visneAdet", localStorage.getItem("visneAdet") - 1);
        toList();
    }
}

//nakhla.php //decrease end




