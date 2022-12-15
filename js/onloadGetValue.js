
                            function total_price_total_number() {
                            localStorage.setItem("totalPrice", (Number(localStorage.getItem("oncu")) + Number(localStorage.getItem("total-adalya-nane-price"))));localStorage.setItem("totalNumber", (Number(localStorage.getItem("oncu"))
                             + Number(localStorage.getItem("total-adalya-nane-number"))));document.querySelector("#item-count").innerHTML = localStorage.getItem("totalNumber"); 
                            document.querySelector("#total").innerHTML = localStorage.getItem("totalPrice");
                            }
                            window.onload = function () { price_print_all() } 
                            function price_print_all() {
                            
                            if (localStorage.getItem("adalya-nane-number") > 0) {
                                document.getElementById("shop-container-adalya-nane").innerHTML =
                                    '<div class="cart-item">' +
                                    '<button  type="button" class="fas fa-times" onclick="decrease_adalya_nane();"></button>' +
                                    '<img src="' + imgPage + 'nane.jpg" alt="menu">' +
                                    '<div class="content">' +
                                    '<h3>' + localStorage.getItem("adalya-nane-name") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("adalya-nane-number") + '</span> </h3>' +
                                    '<div class="price">' + localStorage.getItem("adalya-nane-price") + '₺</div>' +
                                    '</div>' +
                                    '</div>';
                                    total_price_total_number();
                            } }