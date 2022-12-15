<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
@$operation = $_GET["page"];
switch ($operation) {
    case 'DeleteMessage':
        $ID = $_GET["ID"];
        $delete = $db->delete("DELETE FROM contact WHERE ContactID=?", [$ID]);
        $countQuery = $db->getColumn("SELECT COUNT(ContactID) FROM contact");
        if ($countQuery >= 1) {
            if ($delete) {
                $message = "Kayıt silindi.:::success";
            } else {
                $message = "Kayıt silinemedi.:::danger";
            }
        } else {
            $message = 'Kayıt silindi:::warning';
        }
        echo $message;
        break;

    default:

        break;
}
