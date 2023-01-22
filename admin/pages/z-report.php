<?php
session_start();
if ($_SESSION['user'] == null) {
    header('Location:https://ozgurvurgun.com/dejavu_hookah/admin/index.php');
}
if ($_SESSION['authority'] == "3") {
} else {
    die("yetkisiz erişim bu sayfaya sadece admin yetkisine sahip kullanıcılar erişebilir.");
}
if ($_SESSION['authority'] == "1") {
    $authorityOne = "disabled";
} elseif ($_SESSION['authority'] == "2") {
    $authorityTwo = "disabled";
}
require_once '../../DB/database.php';
require_once '../admin-security/admin-security.php';

use dejavu_hookah\db\Database as db;

$db = new db;
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/logo-images/icons/person-gear.svg" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title id="title">Admin Panel</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light fs-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                </svg>
            </a>
            <a class="navbar-brand" href="../panel.php">Sipariş Paneli</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menü
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="add-group.php">Grup Ekle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="add-product.php">Ürün Ekle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="product-process.php">Ürün İşlemleri</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="group-process.php">Grup İşlemleri</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-warning " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Finans
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-warning <?= $authorityTwo ?>" href="z-report.php">Z Raporu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="security.php">Güvenlik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $authorityTwo ?>" aria-current="page" href="user-operations.php">Kullanıcı İşlemleri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="message.php">Gelen Kutusu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border rounded" aria-current="page" href="javascript:void(0);">
                            <div class="form-check form-switch">
                                <input class="form-check-input" onchange="switchChange();" type="checkbox" role="switch" id="switchChecked">
                                <label class="form-check-label" id="switch-result"></label>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right me-2">
                    <div class="btn-group">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-warning"><?= $_SESSION['user'] ?></span> hoşgeldin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                <li><a class="dropdown-item" href="../process-return/session-destroy.php">Çıkış Yap</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item <?= $authorityOne ?><?= $authorityTwo ?>" href="interface-customize.php">Özelleştir</a></li>
                            </ul>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>





    <div class="container p-5 fs-6">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table id="printZtable" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Masa No</th>
                                <th scope="col">Sipariş</th>
                                <th scope="col">Tutar</th>
                                <th scope="col">Teslim Zamanı</th>
                            </tr>
                        </thead>
                        <tbody id="printZtableResult">
                            <?php
                            $query = $db->getRows("SELECT * FROM orderTableLog ORDER BY tableNo DESC , orderTableLogID DESC");
                            foreach ($query as $items) { ?>
                                <tr>
                                    <th scope="row"><?= $items->tableNo ?></th>
                                    <td><?= $items->orderContents ?></td>
                                    <td><?= $items->orderAmount ?></td>
                                    <td><?= $items->orderDate ?></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">
                                    <h3>Z Raporu</h3>
                                </th>
                                <th scope="col">
                                    <h4>Toplam</h4>
                                </th>
                                <th scope="col">
                                    <h4>Rapor Oluşturulma Tarihi</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <h5>
                                        <?php
                                        $query = $db->getRow('SELECT CompanyName FROM interfaceData WHERE interfaceDataID=?', [1]);
                                        echo $query->CompanyName;
                                        ?>
                                    </h5>
                                </td>
                                <td>
                                    <?php $priceSum = $db->getColumn("SELECT SUM(orderAmount) FROM orderTableLog"); ?>
                                    <h5><?= $priceSum ?></h5>
                                </td>
                                <td><?php date_default_timezone_set('Europe/Istanbul');
                                    echo "<h5>" . date('d.m.Y H:i:s') . "</h5>"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="mb-3 row">
                    <svg id="printZbutton" style="cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="mt-4 bi bi-printer text-danger" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                    </svg>
                </div>
            </div>
            <div class="col-md-1 mx-auto mt-3">
                <form id="printZdeleteTable" method="POST">
                    <div class="mb-3 row">
                        <button onclick="printZprocess();" id="printZdeleteButton" name="printZdeleteButton" type="button" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="mt-4 bi bi-trash text-danger" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function printZprocess() {
            if (confirm('Log Kayıtlarını Silmek Üzeresiniz, Son Onayı Verin.')) {
                $.ajax({
                    type: 'POST',
                    url: '../process-return/remove-z-report.php',
                    success: function(data) {
                        data = data.split(":::", 2);
                        let message = data[0];
                        let message2 = data[1];
                        alert(message);
                        $('#printZtableResult').html(message2);
                    }
                });
            }
        }
    </script>




    <div class="container mt-5"></div>
    <div id="toastOrder" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <div id="toast" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <script src="../../assets/jquery-3-5-1.js"></script>
    <script src="../../assets/print/printThis.js"></script>
    <script>
        $(document).ready(function() {
            $("#printZbutton").on('click', function() {
                $('#printZtable').printThis();
            });
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        document.getElementById('title').innerHTML = "<?= date('d-m-Y') ?>-Z";
        <?php
        $queryAutomation = $db->getRow('SELECT selectValue FROM menuOrAutomation');
        ?>
        if (<?= $queryAutomation->selectValue ?> == 1) {
            document.getElementById('switchChecked').checked = true;
            document.getElementById('switch-result').innerHTML = 'Otomasyon';
        } else {
            document.getElementById('switchChecked').checked = false;
            document.getElementById('switch-result').innerHTML = 'Menü';
        }

        function switchChange() {
            let x, check;
            x = document.getElementById('switchChecked');
            check = x.checked;
            $.ajax({
                type: 'POST',
                url: '../process-return/menu-or-automation.php?data=' + check,
                success: function(data) {
                    document.getElementById('switch-result').innerHTML = data;
                }
            });
        }
    </script>
    <?php require_once '../js/global-message-notification.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>