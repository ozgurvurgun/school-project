<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
if (isset($_POST['GroupName'])) {
    $groupName = security('GroupName');
    $GroupStorageName = security('GroupStorageName');
    $TopDescription = security('TopDescription');
    $SubDescription =  security('SubDescription');
    $PriceRange =  security('PriceRange');
    $fileName = $_FILES['GroupPhoto']['name'];
    $fileTMP = $_FILES['GroupPhoto']['tmp_name'];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = $groupName . '.' . $ext;
    $path = '../../images/group-images/' . $newFileName;

    if (empty($groupName) or empty($PriceRange) or empty($GroupStorageName)) {
        $result = '<div class="alert alert-warning mt-2 mb-3 text-center" role="alert">
        <div style="font-size: 20px;">Lütfen Gerekli Alanları Doldurun</div>
        </div>:::';
    } else {
        if ($_FILES["GroupPhoto"]["name"] == '') {
            $result = '<div class="alert alert-warning mt-2 mb-3 text-center" role="alert">
            <div style="font-size: 20px;">Lütfen Resim Seçin</div>
            </div>:::';
        } else {
            $isGroupStorageName =   $db->getRows("SELECT GroupStorageName FROM groups WHERE GroupStorageName=?", [$GroupStorageName]);
            $isGroup = $db->getColumn("SELECT ID FROM groups WHERE GroupName=?", [$groupName]);
            if ($isGroup) {
                $result = '<div class="alert alert-danger mt-2 mb-3 text-center" role="alert">
              <div style="font-size: 20px;">Bu Grup Sistemde Zaten Kayıtlı</div>
               </div>:::';
            } else {
                if ($isGroupStorageName) {
                    $result = '<div class="alert alert-danger mt-2 mb-3 text-center" role="alert">
                  <div style="font-size: 20px;">Bu 2. Grup adı, Sistem de Zaten Kayıtlı</div>
                   </div>:::';
                } else {
                    if (move_uploaded_file($fileTMP, $path)) {
                        $add = $db->insert('INSERT INTO groups(GroupName,GroupStorageName,TopDescription,SubDescription,PriceRange,GroupPhoto)
                VALUES (?,?,?,?,?,?)
                ', [$groupName, $GroupStorageName, $TopDescription, $SubDescription, $PriceRange, $newFileName]);
                        if ($add) {
                            $result = '<div class="alert alert-success mt-2 mb-3 text-center" role="alert">
                <div style="font-size: 20px;">' . $groupName . ' Grubu Başarı İle Eklendi.</div>
                </div>:::';
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
    $query = $db->getRows('SELECT * FROM groups ORDER BY ID DESC');
    $records = $db->getColumn("SELECT COUNT(ID) FROM groups");
    if ($records < 1) {
        $records = 'Kayıtlı Grup Yok';
    } else {
        $records = 'Mevcut gruplarınız - ' . $records . ' adet';
    }
    foreach ($query as $items) {
        $result .= '<div class="box dark-bg mb-3">
            <div class="box-head">
                <span class="title">' . $items->TopDescription . '</span>
                <p class="name">' . $items->GroupName . '</p>
            </div>
            <div class="image">
                <img src="../../images/group-images/' . $items->GroupPhoto . '" alt="' . $items->GroupName . '" />
            </div>
            <div class="box-bottom">
                <div class="info">
                    <b class="price">' . $items->PriceRange . '<span>₺</span></b>
                    <span class="amoumt">' . $items->SubDescription . '</span>
                </div>
                <div class="product-btn">
                    <a>
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    ';
    }
    $result .= ':::' . $records . '';
    echo $result;
}
