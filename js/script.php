<?php
//script.js write
require_once "../DB/database.php";

use \dejavu_hookah\db\Database;

$db = new Database;

$query = $db->getRow("SELECT ScriptJs,OnloadTotalValueJs FROM maintb");
$file = fopen("script.js", 'w'); //dosya oluşturma işlemi
$write = $query->ScriptJs; //dosya içine ne yazma işlemi
fwrite($file, $write);
fclose($file);

//onload-total-value.js write
$file = fopen("onload-total-values.js", 'w'); //dosya oluşturma işlemi
$write = $query->OnloadTotalValueJs; //dosya içine ne yazma işlemi
fwrite($file, $write);
fclose($file);
