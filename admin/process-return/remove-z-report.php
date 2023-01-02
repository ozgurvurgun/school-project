<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
    $deletePrintZ = $db->delete("DELETE FROM orderTableLog");
    if ($deletePrintZ) {
        $message = "Log Kayıtları Temizlendi İyi Çalışmalar Dileriz.:::";
    } else {
        $message = "Log Kayıtları Zaten Temiz.:::";
    }
$query = $db->getRows("SELECT * FROM orderTableLog ORDER BY tableNo DESC , orderTableLogID DESC");
foreach ($query as $items) {
    $message .= '<tr>
        <th scope="row">' . $items->tableNo . '</th>
        <td>' . $items->orderContents . '</td>
        <td>' . $items->orderAmount . '</td>
        <td>' . $items->orderDate . '</td>
    </tr>
';
}
echo $message;
