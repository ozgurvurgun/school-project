<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;


if (isset($_POST['orderContents'])) {
    $orderContents = security('orderContents');
    $tableNo = security('tableNo');
    $orderAmount =  security('orderAmount');
    $IP =  security('IP');
    $orderMessage =  security('orderMessage');
    $blockedIP = $db->getRow("SELECT blockedIp FROM blockIP WHERE blockedIp=?", [$IP]);
    if ($blockedIP) {
        die("IP adresiniz engellenmiş görünüyor. Lütfen işletme ile iletişime geçiniz.");
    }
    $query = $db->insert("INSERT INTO orderTable(orderContents,tableNo,orderAmount,IP,orderMessage) 
     VALUES (?,?,?,?,?)
     ", [$orderContents, $tableNo, $orderAmount, $IP, $orderMessage]);
    if ($query) {
        echo "Siparişiniz başarı ile alındı. En kısa zamanda masanızada olacak.";
    } else {
        echo "Sipariş verilirken bir hata oluştu. Tekrar deneyin, hata devam ederse işletme ile iletişime geçin !";
    }
}
