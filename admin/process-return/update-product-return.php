<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;
use LDAP\Result;

$db = new db;
@$operation = $_GET["process"];
switch ($operation) {
    case 'DeleteProduct':
        $ID = $_GET["ID"];
        $deleteProduct = $db->delete("DELETE FROM products WHERE ProductAutoID=?", [$ID]);
        $deleteScript = $db->delete("DELETE FROM scripts WHERE ProductAutoID=?", [$ID]);
        $countQuery = $db->getColumn("SELECT COUNT(ProductAutoID) FROM products");
        if ($countQuery >= 1) {
            if ($deleteScript && $deleteProduct) {
                $message = "Kayıt silindi.:::success";
            } else {
                $message = "Kayıt silinemedi.:::danger";
            }
        } else {
            $message = 'Kayıt silindi:::warning';
        }
        echo $message;
        break;

    case 'priceUpdate':

        if (isset($_POST["ProductID"])) {
            $ProductID = security('ProductID');
            $GroupStorageName = security('GroupStorageName');
            $ProductStorageName = security('ProductStorageName');
            $ProductPicture = security('ProductPicture');
            $ProductPrice =  security('ProductPrice');
            $ProductDiscountPrice =  security('ProductDiscountPrice');
            $ProductActivity = security('ProductActivity');
            $fileName = $_FILES['ProductPhoto']['name'];
            $fileTMP = $_FILES['ProductPhoto']['tmp_name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = $ProductStorageName . '.' . $ext;
            $path = '../../images/product-images/' . $newFileName;

            $GlobalDivIDNewValue = '
            <div id="' . $GroupStorageName . '-' . $ProductStorageName . '-price">' . $ProductPrice . '</div>
            <div id="' . $GroupStorageName . '-' . $ProductStorageName . '-add"></div>
            ';
            $db->update('UPDATE scripts SET GlobalDivID=? WHERE ProductAutoID=?', [$GlobalDivIDNewValue, $ProductID]);
            if ($_FILES["ProductPhoto"]["name"] == '') {
                $newFileName = $ProductPicture;
            } else {
                move_uploaded_file($fileTMP, $path);
            }
            if (empty($ProductPrice) or empty($ProductDiscountPrice) or empty($ProductActivity)) {
                $result = '<div class="alert alert-warning">Lütfen boş alanları doldurun.</div>:::';
            } else {
                $updateProducts = $db->update('UPDATE products SET ProductPrice=?, ProductDiscountPrice=?, ProductPicture=?, ProductActivity=? WHERE ProductAutoID=?
                ', [$ProductPrice, $ProductDiscountPrice, $newFileName, $ProductActivity, $ProductID]);
                if ($updateProducts) {
                    $result = '<div class="alert alert-success mt-2 mb-3 text-center" role="alert">
                                           <div style="font-size: 20px;">Kayıt başarı ile güncellendi</div>
                                           </div>:::';
                } else {
                    $result = '<div class="alert alert-warning mt-2 mb-3 text-center" role="alert">
                            <div style="font-size: 20px;">Aynı verileri giriyorsunuz</div>
                            </div>:::';
                }
            }

            $query = $db->getRows("SELECT products.ProductPicture, products.ProductActivity, products.ProductAutoID, products.ProductID, products.ProductName, products.ProductPrice, products.ProductDiscountPrice, products.ProductStorageName, products.ProductPicture, groups.GroupName, groups.ID FROM products INNER JOIN groups ON products.ProductID=groups.ID ORDER BY products.ProductID DESC , products.ProductAutoID DESC");
            //$countQuery = $db->getColumn("SELECT COUNT(ProductAutoID) FROM products");
            foreach ($query as $items) {
                $result .=  ' <div id="GroupID' . $items->ProductAutoID . '" style="display: none;">' . $items->ID . '</div>
                <div id="ProductPicture' . $items->ProductAutoID . '" style="display: none;">' . $items->ProductPicture . '</div>
                <tr id="' . $items->ProductAutoID . '">
                    <th scope="row"><img width="70px" height="70px" src="../../images/product-images/' . $items->ProductPicture . '" alt="' . $items->ProductPicture . '"></th>
                    <td id="GroupName' . $items->ProductAutoID . '">' . $items->GroupName . '</td>
                    <td id="ProductName' . $items->ProductAutoID . '">' . $items->ProductName . '</td>
                    <td id="ProductStorageName' . $items->ProductAutoID . '">' . $items->ProductStorageName . '</td>
                    <td id="ProductPrice' . $items->ProductAutoID . '">' . $items->ProductPrice . '</td>
                    <td id="ProductDiscountPrice' . $items->ProductAutoID . '">' . $items->ProductDiscountPrice . '</td>
                    ';
                if ($items->ProductActivity == "A") {
                    $result .= "<td style=\"color:green;font-size:20px;\" id=\"ProductActivity$items->ProductAutoID\">Aktif</td>";
                } else {
                    $result .= "<td style=\"color:red;font-size:20px;\" id=\"ProductActivity$items->ProductAutoID\">Pasif</td>";
                }
                $result .= '
                    <td>
                       <button onclick="UpdateProduct(' . $items->ProductAutoID . ');" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </button>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="RemoveProduct(\'DeleteProduct\',' . $items->ProductAutoID . ')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </a>
                    </td>
                </tr>';
            }
            echo $result;
        }
        break;

    default:

        break;
}
