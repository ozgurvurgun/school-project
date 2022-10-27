const order = document.querySelector("#order");

order.addEventListener("click", orderNow);
function orderNow() {
    if (localStorage.getItem("totalAdet") >= 1) {
        alert("Siparişini aldık en kısa sürede masanız da olacak :)");
        localStorage.clear();
        topFiyatTopAdet();
    }
    else{
        alert("Boş sepetle sipariş vermeye çalışıyorsun önce ürün seçmelisin :)");
    }
}


