<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
@$operation = $_GET["process"];
switch ($operation) {
    case 'DeleteGroup':
        $ID = $_GET["ID"];
        $oldPhoto = $db->getRow("SELECT GroupPhoto FROM groups WHERE ID=?", [$ID]);
        $deleteGroup = $db->delete("DELETE FROM groups WHERE ID=?", [$ID]);
        $deleteProduct = $db->delete("DELETE FROM products WHERE ProductID=?", [$ID]);
        $deleteScript = $db->delete("DELETE FROM scripts WHERE ProductID=?", [$ID]);
        $countQuery = $db->getColumn("SELECT COUNT(ID) FROM groups");
        if ($countQuery >= 1) {
            if ($deleteGroup) {
                unlink("../../images/group-images/" . $oldPhoto->GroupPhoto . "");
                $message = "Kayıt silindi.:::success";
            } else {
                $message = "Kayıt silinemedi.:::danger";
            }
        } else {
            unlink("../../images/group-images/" . $oldPhoto->GroupPhoto . "");
            $message = 'Kayıt silindi:::warning';
        }
        echo $message;
        break;
    case 'groupUpdate':
        if (isset($_POST["GroupID"])) {
            $GroupID = security('GroupID');
            $GroupStorageName = security('GroupStorageName');
            $GroupPhoto = security('GroupPhoto');
            $TopDescription = security('TopDescription');
            $SubDescription = security('SubDescription');
            $PriceRange =  security('PriceRange');
            $GroupActivity =  security('GroupActivity');
            $fileName = $_FILES['GroupNewPhoto']['name'];
            $fileTMP = $_FILES['GroupNewPhoto']['tmp_name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = rand() . "-" . $GroupStorageName . '.' . $ext;
            $path = '../../images/group-images/' . $newFileName;
            if ($_FILES["GroupNewPhoto"]["name"] == '') {
                $oldPhoto = $db->getRow("SELECT GroupPhoto FROM groups WHERE ID=?", [$GroupID]);
                $newFileName = $oldPhoto->GroupPhoto;
            } else {
                move_uploaded_file($fileTMP, $path);
            }
            if (empty($PriceRange) or empty($GroupActivity)) {
                $result = '<div class="alert alert-warning">Lütfen boş alanları doldurun.</div>:::';
            } else {
                $oldPhoto = $db->getRow("SELECT GroupPhoto FROM groups WHERE ID=?", [$GroupID]);
                $updateGroups = $db->update('UPDATE groups SET TopDescription=?, GroupPhoto=?, PriceRange=?, SubDescription=?, GroupActivity=? WHERE ID=?
                ', [$TopDescription, $newFileName, $PriceRange, $SubDescription, $GroupActivity, $GroupID]);
                if ($updateGroups) {
                    $result = '<div class="alert alert-success mt-2 mb-3 text-center" role="alert">
                                           <div style="font-size: 20px;">Kayıt başarı ile güncellendi</div>
                                           </div>:::';
                    if ($_FILES["GroupNewPhoto"]["name"] != '') {
                        unlink("../../images/group-images/" . $oldPhoto->GroupPhoto . "");
                    }
                } else {
                    $result = '<div class="alert alert-warning mt-2 mb-3 text-center" role="alert">
                            <div style="font-size: 20px;">Aynı verileri giriyorsunuz</div>
                            </div>:::';
                }
            }
            $query = $db->getRows("SELECT * FROM groups ORDER BY ID DESC");
            foreach ($query as $items) {
                $result .=  '       
              <div id="GroupID' . $items->ID . '" style="display: none;">' . $items->ID . '</div>
              <div id="GroupPhoto' . $items->ID . '" style="display: none;">' . $items->GroupPhoto . '</div>
              <div id="GroupStorageName' . $items->GroupStorageName . '" style="display: none;">' . $items->GroupStorageName . '</div>
              <tr id="' . $items->ID . '">
              <th scope="row"><img width="70px" height="70px" src="../../images/group-images/' . $items->GroupPhoto . '" alt="' . $items->GroupPhoto . '"></th>
              <td id="GroupName' . $items->ID . '">' . $items->GroupName . '</td>
              <td id="GroupStorageName' . $items->ID . '">' . $items->GroupStorageName . '</td>
              <td id="PriceRange' . $items->ID . '">' . $items->PriceRange . '</td>
              <td id="TopDescription' . $items->ID . '">' . $items->TopDescription . '</td>
              <td id="SubDescription' . $items->ID . '">' . $items->SubDescription . '</td>';
                if ($items->GroupActivity == "A") {
                    $result .= "<td style=\"color:green;font-size:20px;\" id=\"GroupActivity$items->ID\">Aktif</td>";
                } else {
                    $result .= "<td style=\"color:red;font-size:20px;\" id=\"GroupActivity$items->ID\">Pasif</td>";
                }
                $result .= ' <td>
            <button onclick="UpdateGroup(' . $items->ID . ');" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
            </button>
        </td>
        <td>
            <a href="javascript:void(0)" onclick="RemoveGroup(\'DeleteGroup\',' . $items->ID . ')">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
            </a>
        </td>
    </tr>         
                ';
            }
            echo $result;
        }
        break;
    default:
        break;
}
