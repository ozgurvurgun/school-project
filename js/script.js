"use strict";
                            let imgPage;
                            imgPage = "../images/product-images/";
                            if (window.location.pathname == "/dejavu_hookah/index.php" || window.location.pathname == "/dejavu_hookah/") {
                            imgPage = "images/product-images/";
                            }
                            const adalya_nane= document.querySelector("#adalya-nane-add");
                            const adalya_nane_price = Number(document.querySelector("#adalya-nane-price").innerHTML);
                            var adalya_nane_number;
                            adalya_nane.addEventListener("click", tolist_adalya_nane);
                            function tolist_adalya_nane(par) {
                                document.getElementById("shop-container-adalya-nane").style.display = "block";
                                if (par == "azalt") {
                                    adalya_nane_number--;
                                }
                                if (localStorage.getItem("adalya-nane-number") == "null" || localStorage.getItem("adalya-nane-number") == "undefined" || localStorage.getItem("adalya-nane-number") == "NaN") {
                                    localStorage.setItem("adalya-nane-number", 0);
                                    adalya_nane_number = localStorage.getItem("adalya-nane-number");
                                }
                                adalya_nane_number = localStorage.getItem("adalya-nane-number");
                                if (par != "azalt") { // parametre "azalt" stringine eşit değilse ürün sayısı bir art
                                    adalya_nane_number++;
                                }
                                localStorage.setItem("adalya-nane-name", "nane");
                                localStorage.setItem("adalya-nane-price", adalya_nane_price);
                                localStorage.setItem("adalya-nane-number", adalya_nane_number);
                                document.getElementById("shop-container-adalya-nane").innerHTML =
                                    '<div class="cart-item">' +
                                    '<button  type="button" class="fas fa-times" onclick="decrease_adalya_nane();"></button>' +
                                    '<img src="' + imgPage + 'nane.jpg" alt="menu">' +
                                    '<div class="content">' +
                                    '<h3>' + localStorage.getItem("adalya-nane-name") + '&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;' + localStorage.getItem("adalya-nane-number") + '</span> </h3>' +
                                    '<div class="price">' + localStorage.getItem("adalya-nane-price") + '₺</div>' +
                                    '</div>' +
                                    '</div>';
                                localStorage.setItem("total-adalya-nane-price", localStorage.getItem("adalya-nane-price") * localStorage.getItem("adalya-nane-number"));
                                price_print_adalya_nane();
                            } 
                            function price_print_adalya_nane() {
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
                            } 
                            function decrease_adalya_nane() {
                                if (localStorage.getItem("adalya-nane-number") < 1) {
                                    const list = document.getElementById("shop-container-adalya-nane");
                                    list.removeChild(list.firstElementChild);
                                }
                                else {
                                    localStorage.setItem("adalya-nane-number", localStorage.getItem("adalya-nane-number") - 1);
                                    tolist_adalya_nane("azalt");
                                    if (localStorage.getItem("adalya-nane-number") < 1) {
                                        document.getElementById("shop-container-adalya-nane").style.display = "none";
                                    }
                                }
                            } 