<?php
session_start();
if ($_SESSION['user'] == null) {
    header('Location:https://ozgurvurgun.com/dejavu_hookah/admin/index.php');
}
if ($_SESSION['authority'] == "2" || $_SESSION['authority'] == "3") {
} else {
    die("yetkisiz erişim, bu sayfaya 2. derece veya üstü yetki seviyesine sahip kullanıcılar erişebilir.");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Admin Panel</title>
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Finans
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item <?= $authorityTwo ?>" href="z-report.php">Z Raporu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="security.php">Güvenlik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $authorityTwo ?>" aria-current="page" href="user-operations.php">Kullanıcı İşlemleri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning " aria-current="page" href="message.php">Gelen Kutusu</a>
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
    <div class="container-fluid p-5 fs-6">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Mesaj</th>
                                <th scope="col">Tarih</th>
                                <th scope="col">IP Adresi</th>
                                <th scope="col">Sil</th>
                            </tr>
                        </thead>
                        <tbody id="tableResult">
                            <?php
                            $query = $db->getRows("SELECT * FROM contact ORDER BY ContactID DESC");
                            $countQuery = $db->getColumn("SELECT COUNT(ContactID) FROM contact");
                            foreach ($query as $items) { ?>
                                <tr id="<?= $items->ContactID ?>">
                                    <th scope="row"><?= $items->ContactID ?></th>
                                    <td><?= $items->ContactName ?></td>
                                    <td><?= $items->ContactPhone ?></td>
                                    <td><?= $items->ContactMail ?></td>
                                    <td><?= $items->ContactMessage ?></td>
                                    <td><?= $items->ContactDate ?></td>
                                    <td><?= $items->ContactIP ?></td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="RemoveAll('DeleteMessage','<?= $items->ContactID ?>')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                    <div id="countResult"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="toastOrder" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <div id="toast" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <script src="../../assets/jquery-3-5-1.js"></script>
    <?php require_once '../js/message-notification.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>