<script>sessionStorage.clear();</script>
<?php
session_start();
session_destroy();
header('Location:https://ozgurvurgun.com/dejavu_hookah/admin/index.php');
