const order = document.querySelector("#order");
order.addEventListener("click", orderNow);
function orderNow() {
    if (localStorage.getItem("totalNumber") >= 1) {
        alert("Siparişini aldık en kısa sürede masanız da olacak :)");
        localStorage.clear();
        sessionStorage.clear();
        total_price_total_number();
    }
    else {
        alert("Boş sepetle sipariş vermeye çalışıyorsun önce ürün seçmelisin :)");
        localStorage.clear();
        sessionStorage.clear();
    }
}