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
    $newFileName = $ProductName . '.' . $ext;
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
            $GroupStorage->GroupStorageName = $db->getRow("SELECT GroupStorageName FROM groups WHERE ID=?", [$GroupID]);
            echo " <script>alert('" . $GroupStorage->GroupStorageName->GroupStorageName . "')</script>";
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
                                    \'<img src="\' + imgPage + \'" alt="menu">\' +
                                    \'<div class="content">\' +
                                    \'<h3>\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-name") + \'&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">x</span><span id="miktar" style="color: red;font-size:medium">&nbsp;\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number") + \'</span> </h3>\' +
                                    \'<div class="price">\' + localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price") + \'₺</div>\' +
                                    \'</div>\' +
                                    \'</div>\';
                                localStorage.setItem("total-' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price", localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-price") * localStorage.getItem("' . $GroupStorage->GroupStorageName . '-' . $ProductStorageName . '-number"));
                                price_print_' . $GroupStorage->GroupStorageName . '_' . $ProductStorageName . '();
                            } ';



                            $file = fopen("deneme.js", 'w'); //dosya oluşturma işlemi
                            $write = $script; //dosya içine ne yazma işlemi
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
    $query = $db->getRows("SELECT products.ProductAutoID, products.ProductID, products.ProductName, products.ProductPrice, products.ProductDiscountPrice, products.ProductStorageName, products.ProductPicture, groups.GroupName FROM products INNER JOIN groups ON products.ProductID=groups.ID ORDER BY products.ProductAutoID DESC");
    $records = $db->getColumn("SELECT COUNT(ProductID) FROM products");
    if ($records < 1) {
        $recorsValue = 'Kayıtlı Ürün Yok';
    } else {
        $records = 'Mevcut gruplarınız - ' . $records . ' adet';
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
