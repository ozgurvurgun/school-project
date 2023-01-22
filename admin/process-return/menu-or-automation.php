<?php
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
@$operation = $_GET["data"];
switch ($operation) {
    case 'true':
        $process = $db->update('UPDATE menuOrAutomation SET selectValue=?', [1]);
        
        echo "Otomasyon";
        break;
    case 'false':
        $process = $db->update('UPDATE menuOrAutomation SET selectValue=?', [0]);
        echo "Menü";
        break;
    default:

        break;
}
