<?php





    $script = 'const ' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '= document.querySelector("#' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-add");
const ' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '_price = Number(document.querySelector("#' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price").innerHTML);
var ' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '_number;
' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '.addEventListener("click", tolist_' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . ');
function tolist_' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '(par) {
    document.getElementById("shop-container-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '").style.display = "block";
    if (par == "azalt") {
        ' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '_number--;
    }
    if (localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") == "null" || localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") == "undefined" || localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") == "NaN") {
        localStorage.setItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number", 0);
        ' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '_number = localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number");
    }
    ' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '_number = localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number");
    if (par != "azalt") { // parametre "azalt" stringine eşit değilse ürün sayısı bir art
        ' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '_number++;
    }
    localStorage.setItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-name", "' . $ProductName . '");
    localStorage.setItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price", ' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '_price);
    localStorage.setItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number", ' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '_number);
    document.getElementById("shop-container-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '").innerHTML =
        \'<div class="cart-item">\' +
        \'<button  type="button" class="fas fa-times" onclick="decrease_' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '();"></button>\' +
        \'<img src="\' + imgPage + \'' . $newFileName . '" alt="menu">\' +
        \'<div class="content">\' +
        \'<h3>\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-name") + \'&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") + \'</span> </h3>\' +
        \'<div class="price">\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price") + \'₺</div>\' +
        \'</div>\' +
        \'</div>\';
    localStorage.setItem("total-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price", localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price") * localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number"));
    price_print_' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '();
} ';

    $script .= '
function price_print_' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '() {
    document.getElementById("shop-container-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '").innerHTML =
        \'<div class="cart-item">\' +
        \'<button  type="button" class="fas fa-times" onclick="decrease_' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '();"></button>\' +
        \'<img src="\' + imgPage + \'' . $newFileName . '" alt="menu">\' +
        \'<div class="content">\' +
        \'<h3>\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-name") + \'&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") + \'</span> </h3>\' +
        \'<div class="price">\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price") + \'₺</div>\' +
        \'</div>\' +
        \'</div>\';
    total_price_total_number();
} ';

    $script .= '
function decrease_' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '() {
    if (localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") < 1) {
        const list = document.getElementById("shop-container-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '");
        list.removeChild(list.firstElementChild);
    }
    else {
        localStorage.setItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number", localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") - 1);
        tolist_' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '("azalt");
        if (localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") < 1) {
            document.getElementById("shop-container-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '").style.display = "none";
        }
    }
} ';

    $onloadGetValue = '
if (localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") > 0) {
    document.getElementById("shop-container-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '").innerHTML =
        \'<div class="cart-item">\' +
        \'<button  type="button" class="fas fa-times" onclick="decrease_' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '();"></button>\' +
        \'<img src="\' + imgPage + \'' . $newFileName . '" alt="menu">\' +
        \'<div class="content">\' +
        \'<h3>\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-name") + \'&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") + \'</span> </h3>\' +
        \'<div class="price">\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price") + \'₺</div>\' +
        \'</div>\' +
        \'</div>\';
        total_price_total_number();
} ';

    $totalStoragePrice = '+ Number(localStorage.getItem("total-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price"))';
    $totalStorageNumber = '+ Number(localStorage.getItem("total-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number"))';
    $basketContainer = '<div id="shop-container-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '"></div>';
    $globalID = '
<div id="' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price">' . $ProductPrice . '</div>
<div id="' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-add"></div>
';
    $db->insert('INSERT INTO scripts(ProductID,MainScript,OnloadGetValue,TotalStoragePrice,TotalStorageNumber,BasketContainerDiv,GlobalDivID)
VALUES (?,?,?,?,?,?,?)
', [$GroupID, $script, $onloadGetValue, $totalStoragePrice, $totalStorageNumber, $basketContainer, $globalID]);

    /////main js code file write
    unlink("../../js/script.js");
    $file = fopen("../../js/script.js", 'w'); //dosya oluşturma işlemi
    $query = $db->getRows("SELECT MainScript FROM scripts ORDER BY ProductAutoID DESC");
    $write = "\"use strict\";
";
    foreach ($query as $items) {
        $write .= $items->MainScript; //dosya içine ne yazma işlemi
    }
    fwrite($file, $write);
    fclose($file);

    /////onload get value write
    unlink("../../js/onloadGetValue.js");
    $file = fopen("../../js/onloadGetValue.js", 'w'); //dosya oluşturma işlemi
    $query = $db->getRows("SELECT OnloadGetValue FROM scripts ORDER BY ProductAutoID DESC");
    $write = "\"use strict\";
let imgPage;
imgPage = \"../images/product-images/\";
if (window.location.pathname == \"/dejavu_hookah/index.php\" || window.location.pathname == \"/dejavu_hookah/\") {
imgPage = \"images/product-images/\";
}
window.onload = function () { price_print_all() } 
function price_print_all() {
";
    foreach ($query as $items) {
        $write .= $items->OnloadGetValue; //dosya içine ne yazma işlemi
    }
    $write .= "}";
    fwrite($file, $write);
    fclose($file);

    /////total price total number
    unlink("../../js/total-price-number.js");
    $file = fopen("../../js/total-price-number.js", 'w'); //dosya oluşturma işlemi
    $query = $db->getRows("SELECT TotalStoragePrice,TotalStorageNumber FROM scripts ORDER BY ProductAutoID DESC");
    $write = "\"use strict\";
function total_price_total_number() {
    localStorage.setItem(\"totalPrice\",( 0 ";
    foreach ($query as $items) {
        $write .= $items->TotalStoragePrice; //dosya içine ne yazma işlemi
    }
    $write .= "));";
    $write .= "localStorage.setItem(\"totalNumber\", ( 0 ";
    foreach ($query as $items) {
        $write .= $items->TotalStorageNumber; //dosya içine ne yazma işlemi
    }
    $write .= "));";
    $write .= 'document.querySelector("#item-count").innerHTML = localStorage.getItem("totalNumber"); 
document.querySelector("#total").innerHTML = localStorage.getItem("totalPrice");
}';
    fwrite($file, $write);
    fclose($file);

    /////container div write
    unlink("../../pages/container.php");
    $file = fopen("../../pages/container.php", 'w'); //dosya oluşturma işlemi
    $query = $db->getRows("SELECT BasketContainerDiv FROM scripts ORDER BY ProductAutoID DESC");
    $write = "";
    foreach ($query as $items) {
        $write .= $items->BasketContainerDiv;
    }
    fwrite($file, $write);
    fclose($file);

    /////global div write
    unlink("../../pages/globalValue.php");
    $file = fopen("../../pages/globalValue.php", 'w'); //dosya oluşturma işlemi
    $query = $db->getRows("SELECT GlobalDivID FROM scripts ORDER BY ProductAutoID DESC");
    $write = "";
    foreach ($query as $items) {
        $write .= $items->GlobalDivID; //dosya içine ne yazma işlemi
    }
    fwrite($file, $write);
    fclose($file);
