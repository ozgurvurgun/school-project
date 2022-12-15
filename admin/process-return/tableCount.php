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
echo $records;
