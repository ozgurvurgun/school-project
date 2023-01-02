<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
@$operation = $_GET["process"];
switch ($operation) {
    case 'DeleteOrder':
        $ID = $_GET["ID"];
        $deleteOrder = $db->delete("DELETE FROM orderTable WHERE orderID=?", [$ID]);
        if ($deleteOrder) {
            $message = "Sipariş iptal edildi.:::success";
        } else {
            $message = "Sipariş iptal edilemedi. Hata tekrar ederse hizmet sağlayıcı ile iletişime geçiniz.:::danger";
        }
        echo $message;
        break;

    default:
        # code...
        break;
}
