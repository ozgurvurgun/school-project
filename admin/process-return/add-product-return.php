<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
if (isset($_POST['ProductName'])) {
    $GroupID = (int)security('GroupID');
    $ProductName = security('ProductName');
    $ProductStorageName = security('ProductStorageName');
    $ProductPrice =  security('ProductPrice');
    $ProductOldPrice =  security('ProductOldPrice');
    $fileName = $_FILES['ProductPhoto']['name'];
    $fileTMP = $_FILES['ProductPhoto']['tmp_name'];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = $ProductStorageName . '.' . $ext;
    $path = '../../images/product-images/' . $newFileName;
    if (empty($ProductName) or empty($ProductStorageName) or empty($ProductPrice) or empty($ProductOldPrice) or (int)$GroupID == "0") {
        $result = '<div class="alert alert-warning mt-2 mb-3 text-center" role="alert">
        <div style="font-size: 20px;">Lütfen Gerekli Alanları Doldurun</div>
        </div>:::';
    } else {
        if ($_FILES["ProductPhoto"]["name"] == '') {
            $result = '<div class="alert alert-warning mt-2 mb-3 text-center" role="alert">
            <div style="font-size: 20px;">Lütfen Resim Seçin</div>
            </div>:::';
        } else {
            $isProduct =   $db->getRows("SELECT ProductID,ProductName FROM products WHERE ProductID=? AND ProductName=?", [$GroupID, $ProductName]);
            $isProductStorageName =  $db->getRows("SELECT  ProductID,ProductStorageName FROM products WHERE ProductID=? AND ProductStorageName=?", [$GroupID, $ProductStorageName]);
            if ($isProduct) {
                $result = '<div class="alert alert-danger mt-2 mb-3 text-center" role="alert">
               <div style="font-size: 20px;">Bu Ürün, Bu Grupta Zaten Kayıtlı</div>
                </div>:::';
            } else {

                if ($isProductStorageName) {
                    $result = '<div class="alert alert-danger mt-2 mb-3 text-center" role="alert">
                    <div style="font-size: 20px;">Bu 2. Ürün adı, Bu grupta Zaten Kayıtlı</div>
                    </div>:::';
                } else {
                    if (move_uploaded_file($fileTMP, $path)) {
                        $add = $db->insert('INSERT INTO products(ProductID,ProductName,ProductStorageName,ProductPrice,ProductDiscountPrice,ProductPicture)
                         VALUES (?,?,?,?,?,?)
                         ', [$GroupID, $ProductName, $ProductStorageName, $ProductPrice, $ProductOldPrice, $newFileName]);
                        if ($add) {
                            $result = '<div class="alert alert-success mt-2 mb-3 text-center" role="alert">
                            <div style="font-size: 20px;">' . $ProductName . ' Ürünü Başarı İle Eklendi.</div>
                            </div>:::';

                            $GroupStorage = $db->getRow("SELECT GroupStorageName FROM groups WHERE ID=?", [$GroupID]);

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
                                    localStorage.removeItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number");
                                    localStorage.removeItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price");
                                    localStorage.removeItem("total-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price");
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
                            $totalStorageNumber = '+ Number(localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number"))';
                            $basketContainer = '<div id="shop-container-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '"></div>';
                            $globalID = '
                            <div id="' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price">' . $ProductPrice . '</div>
                            <div id="' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-add"></div>
                            ';
                            $ProductScriptsMatching = $db->getColumn("SELECT ProductAutoID FROM products ORDER BY ProductAutoID DESC LIMIT 1");
                            $db->insert('INSERT INTO scripts(ProductAutoID,ProductID,MainScript,OnloadGetValue,TotalStoragePrice,TotalStorageNumber,BasketContainerDiv,GlobalDivID)
                            VALUES (?,?,?,?,?,?,?,?)
                            ', [$ProductScriptsMatching,$GroupID, $script, $onloadGetValue, $totalStoragePrice, $totalStorageNumber, $basketContainer, $globalID]);

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
                        } else {
                            $result = '<div class="alert alert-danger mt-2 mb-3 text-center" role="alert">
                            <div style="font-size: 20px;">Kayıt Başarısız.</div>
                            </div>:::';
                        }
                    }
                }
            }
        }
    }
    $query = $db->getRows("SELECT products.ProductAutoID, products.ProductID, products.ProductName, products.ProductPrice, products.ProductDiscountPrice, products.ProductStorageName, products.ProductPicture, groups.GroupName FROM products INNER JOIN groups ON products.ProductID=groups.ID ORDER BY products.ProductID DESC , products.ProductAutoID DESC");
    $records = $db->getColumn("SELECT COUNT(ProductID) FROM products");                                                                                                                                                                                                                                                                           
    if ($records < 1) {
        $recorsValue = 'Kayıtlı Ürün Yok';
    } else {
        $records = 'Mevcut ürünleriniz - ' . $records . ' adet';
    }
    foreach ($query as $items) {
        $result .= '<tr>
        <th scope="row"><img width="70px" height="70px" src="../../images/product-images/' . $items->ProductPicture . '" alt="' . $items->ProductPicture . '"></th>
        <td>' . $items->GroupName . '</td>
        <td>' . $items->ProductName . '</td>
        <td>' . $items->ProductStorageName . '</td>
        <td>' . $items->ProductPrice . '</td>
        <td>' . $items->ProductDiscountPrice . '</td>
    </tr>
    ';
    }
    $result .= ':::' . $records . '';
    echo $result;
}