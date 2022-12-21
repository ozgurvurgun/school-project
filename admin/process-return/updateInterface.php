<?php
require_once '../../DB/database.php';

use dejavu_hookah\db\Database as db;
$db = new db;

/////main js code file write
$file = fopen("../../js/script.js", 'w'); //dosya oluşturma işlemi
$query = $db->getRows("SELECT scripts.MainScript, products.ProductActivity FROM scripts INNER JOIN products ON products.ProductAutoID=scripts.ProductAutoID  WHERE products.ProductActivity=?",["A"]);
$write = "\"use strict\";
let imgPage;
imgPage = \"../images/product-images/\";
if (window.location.pathname == \"/dejavu_hookah/index.php\" || window.location.pathname == \"/dejavu_hookah/\") {
imgPage = \"images/product-images/\";
}
";
foreach ($query as $items) {
    $write .= $items->MainScript; //dosya içine ne yazma işlemi
}
fwrite($file, $write);
fclose($file);


/////onload get value and price,number write
$file = fopen("../../js/onloadGetValue.js", 'w'); //dosya oluşturma işlemi
$query = $db->getRows("SELECT scripts.TotalStoragePrice, scripts.TotalStorageNumber, products.ProductActivity FROM scripts INNER JOIN products ON products.ProductAutoID=scripts.ProductAutoID  WHERE products.ProductActivity=?",["A"]);
$write = "
function total_price_total_number() {
localStorage.setItem(\"totalPrice\", (Number(localStorage.getItem(\"oncu\")) ";
foreach ($query as $items) {
    $write .= $items->TotalStoragePrice; //dosya içine ne yazma işlemi
}
$write .= "));";
$write .= "localStorage.setItem(\"totalNumber\", (Number(localStorage.getItem(\"oncu\")) ";
foreach ($query as $items) {
    $write .= $items->TotalStorageNumber; //dosya içine ne yazma işlemi
}
$write .= "));";
$write .= 'document.querySelector("#item-count").innerHTML = localStorage.getItem("totalNumber"); 
document.querySelector("#total").innerHTML = localStorage.getItem("totalPrice");
}';
$write .= "
window.onload = function () { price_print_all() } 
function price_print_all() {
";
$query = $db->getRows("SELECT scripts.OnloadGetValue, products.ProductActivity FROM scripts INNER JOIN products ON products.ProductAutoID=scripts.ProductAutoID  WHERE products.ProductActivity=?",["A"]);
foreach ($query as $items) {
    $write .= $items->OnloadGetValue; //dosya içine ne yazma işlemi
}
$write .= "}";
fwrite($file, $write);
fclose($file);

/////container div write
$file = fopen("../../pages/container.php", 'w'); //dosya oluşturma işlemi
$query = $db->getRows("SELECT scripts.BasketContainerDiv, products.ProductActivity FROM scripts INNER JOIN products ON products.ProductAutoID=scripts.ProductAutoID  WHERE products.ProductActivity=?",["A"]);
$write = "";
foreach ($query as $items) {
    $write .= $items->BasketContainerDiv;
}
fwrite($file, $write);
fclose($file);

/////global div write
$file = fopen("../../pages/globalValue.php", 'w'); //dosya oluşturma işlemi
$query = $db->getRows("SELECT scripts.GlobalDivID, products.ProductActivity FROM scripts INNER JOIN products ON products.ProductAutoID=scripts.ProductAutoID  WHERE products.ProductActivity=?",["A"]);
$write = "";
foreach ($query as $items) {
    $write .= $items->GlobalDivID; //dosya içine ne yazma işlemi
}
fwrite($file, $write);
fclose($file);

