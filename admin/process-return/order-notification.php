<?php
session_start();
if ($_SESSION['user'] == null) {
    header('Location:https://ozgurvurgun.com/dejavu_hookah/admin/panel.php');
}
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
$records = $db->getColumn("SELECT COUNT(orderID) FROM orderTable");
$query = $db->getRows("SELECT * FROM orderTable ORDER BY orderID DESC");

$message = "";
foreach ($query as $items) {
    $message .= '   <div id="orderID' . $items->orderID . '" style="display: none;">' . $items->orderID . '</div>
    <tr id="' . $items->orderID . '">
        <th id="tableNo' . $items->orderID . '" scope="row">' . $items->tableNo . '</th>
        <td id="orderContents' . $items->orderID . '">' . $items->orderContents . '</td>
        <td id="orderAmount' . $items->orderID . '">' . $items->orderAmount . '</td>
        <td id="orderMessage' . $items->orderID . '">' . $items->orderMessage . '</td>
        <td id="IP' . $items->orderID . '">' . $items->IP . '</td>
        <td id="orderDate' . $items->orderID . '">' . $items->orderDate . '</td>
        <td>
            <button onclick="updateOrder(' . $items->orderID . ');" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
            </button>
        </td>
        <td>
            <button onclick="deliveOrder(\'deliveOrder\',' . $items->orderID . ');" type="button" class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-send-check text-success" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z" />
                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z" />
                </svg>
            </button>
        </td>
        <td>
            <button onclick="RemoveOrder(\'DeleteOrder\','. $items->orderID .');" type="button" class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
            </button>
        </td>
    </tr>
    ';
}
$message .= ':::<div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
<div class="toast-header">
    <strong class="me-auto">Yeni Siparişiniz Var</strong>
    <!--<small>11 mins ago</small>-->
    <button onclik="messageOkey()" type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
</div>
<div class="toast-body">
<a style="text-decoration:none"; href="https://ozgurvurgun.com/dejavu_hookah/admin/panel.php">Sipariş Paneline Git</a>
</div>
</div><div id="orderNotification"><embed style="display: none;" src="../../assets/mp3/iphone_alarm.mp3" volume="100" loop="true" autostart="true">
<audio style="display: none;" id="audio" controls loop autoplay src="../../assets/mp3/iphone_alarm.mp3"></audio></div>:::' . $records . '';

echo $message;
