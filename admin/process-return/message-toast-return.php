<?php
session_start();
if ($_SESSION['user'] == null) {
    header('Location:https://ozgurvurgun.com/dejavu_hookah/admin/panel.php');
}
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
$records = $db->getColumn("SELECT COUNT(ContactID) FROM contact");
$query = $db->getRows("SELECT * FROM contact ORDER BY ContactID DESC");
$message = "";
foreach ($query as $items) {
    $message .= '  <tr id="' . $items->ContactID . '">
            <th scope="row">' . $items->ContactID . '</th>
            <td>' . $items->ContactName . '</td>
            <td>' . $items->ContactPhone . '</td>
            <td>' . $items->ContactMail . '</td>
            <td>' . $items->ContactMessage . '</td>
            <td>' . $items->ContactDate . '</td>
            <td>' . $items->ContactIP . '</td>
            <td>
                <a href="javascript:void(0)" onclick="RemoveAll(\'DeleteMessage\',' . $items->ContactID . ')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                </a>
            </td>
        </tr>
    ';
}
$message .= ':::<div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
<div class="toast-header">
    <strong class="me-auto">Yeni Mesajınız Var</strong>
    <!--<small>11 mins ago</small>-->
    <button onclik="messageOkey()" type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
</div>
<div class="toast-body">
<a style="text-decoration:none"; href="https://ozgurvurgun.com/dejavu_hookah/admin/pages/message.php">Gelen Kutusuna Git</a>
</div>
</div><div id="notificationMusic"><embed style="display: none;" src="../../assets/mp3/iphone_alarm.mp3" volume="100" loop="true" autostart="true">
<audio style="display: none;" id="audio" controls loop autoplay src="../../assets/mp3/iphone_alarm.mp3"></audio></div>:::' . $records . '';

echo $message;
