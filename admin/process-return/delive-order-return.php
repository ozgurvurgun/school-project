<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
@$operation = $_GET["process"];
switch ($operation) {
    case 'deliveOrder':
        $ID = $_GET["ID"];
        $query = $db->getRow("SELECT orderContents,tableNo,orderAmount FROM orderTable WHERE orderID=?", [$ID]);
        $deleteOrder = $db->delete("DELETE FROM orderTable WHERE orderID=?", [$ID]);
        $add = $db->insert('INSERT INTO orderTableLog(orderContents,tableNo,orderAmount)
        VALUES (?,?,?)
        ', [$query->orderContents, $query->tableNo, $query->orderAmount]);
        if ($deleteOrder && $add) {
            $message = "Sipariş başarı ile teslim edildi.:::success";
        } else {
            $message = "Sipariş teslim edilemedi. Hata tekrar ederse hizmet sağlayıcı ile iletişime geçiniz.:::danger";
        }
        echo $message;
        break;

    default:
        # code...
        break;
}
