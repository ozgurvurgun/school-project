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
                        <a class="nav-link text-warning " href="security.php">Güvenlik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $authorityTwo ?>" aria-current="page" href="user-operations.php">Kullanıcı İşlemleri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="message.php">Gelen Kutusu</a>
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
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="alert alert-warning mt-4 mb-5 text-center" role="alert">
                    <div style="font-size: 20px;">Panelden IP Engelleyebilir. Engellemeleri Kaldırabilirsiniz.</div>
                </div>
                <div class="card mt-3 p-5 bg-light">
                    <form id="blockedIpAddForm" method="POST">
                        <div class="mb-2 row">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="blockedIP" name="blockedIP" placeholder="Engellenecek IP Adresini Girin" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div id="resultAdd"></div>
                        </div>
                        <div class="mb-2 row">
                            <div class="col-md-10 ">
                                <button type="submit" id="blockedIPAdd" name="blockedIPAdd" class="btn btn-success btn-lg mt-3">Kara Listeye Ekle</button>
                            </div>
                        </div>
                    </form>
                    <hr />
                    <form id="blockedIpRemoveForm" method="POST">
                        <div class="mb-2 mt-3 row">
                            <div class="col-sm-10">
                                <select class="form-select" id="RemoveBlockedIpSelect" name="RemoveBlockedIpSelect" aria-label="Default select example">
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div id="resultRemove"></div>
                        </div>
                        <div class="mb-2 row">
                            <div class="col-md-10 ">
                                <button type="submit" id="removeBlockedIP" name="removeBlockedIP" class="btn btn-primary btn-lg mt-3">Kara Listeden Çıkar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="alert alert-primary mt-4 mb-5 text-center" role="alert">
                    <div id="records" style="font-size: 20px;"></div>
                </div>
                <div style="height:399px;overflow-y:auto;" class="card bg-light">
                    <section>
                        <div class="box-container text-center">
                            <div class="container-fluid p-5 fs-6">
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">IP Adresi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="blockedIpResult"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5"></div>
    <div id="toastOrder" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <div id="toast" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <script src="../../assets/jquery-3-5-1.js"></script>
    <?php require_once '../js/global-message-notification.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['blockedIPAdd'])) {
    $blockedIP = security('blockedIP');
    if (empty($blockedIP)) {
        echo "
        <script>
        document.getElementById('resultAdd').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Lütfen Giriş Birimini Doldurun</div></div>';
        function ResultRemove() {
        document.getElementById('resultAdd').innerHTML = '';
        }
        setTimeout(ResultRemove, 6000);
        </script>";
    } else {
        if (!filter_var($blockedIP, FILTER_VALIDATE_IP)) {
            echo "
            <script>
            document.getElementById('resultAdd').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Bu Geçerli bir IP Adresi Değil</div></div>';
            function ResultRemove() {
            document.getElementById('resultAdd').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>
            ";
        } else {
            $isIP = $db->getColumn("SELECT blockedIp FROM blockIP WHERE blockedIp=?", [$blockedIP]);
            if ($isIP) {
                echo "
            <script>
            document.getElementById('resultAdd').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Bu IP Adresi Zaten Kara Listede Kayıtlı</div></div>';
            function ResultRemove() {
            document.getElementById('resultAdd').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>
            ";
            } else {
                $query = $db->insert("INSERT INTO blockIP(blockedIp) VALUES (?)", [$blockedIP]);
                if ($query) {
                    echo "
            <script>
            document.getElementById('resultAdd').innerHTML = '<div class=\"alert alert-success mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">IP Kara Listeye Başarı İle Eklendi</div></div>';
            function ResultRemove() {
            document.getElementById('resultAdd').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
                } else {
                    echo "
            <script>
            document.getElementById('resultAdd').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">IP Kara Listeye Eklenemedi</div></div>';
            function ResultRemove() {
            document.getElementById('resultAdd').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
                }
            }
        }
    }
}





if (isset($_POST['removeBlockedIP'])) {
    $RemoveBlockedIpSelect = security('RemoveBlockedIpSelect');
    if (empty($RemoveBlockedIpSelect) || $RemoveBlockedIpSelect == 0) {
        echo "
        <script>
        document.getElementById('resultRemove').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Lütfen Giriş Birimini Doldurun</div></div>';
        function ResultRemove() {
        document.getElementById('resultRemove').innerHTML = '';
        }
        setTimeout(ResultRemove, 6000);
        </script>";
    } else {
        $deleteBlocedIp = $db->delete("DELETE FROM blockIP WHERE blockedIpID=?", [$RemoveBlockedIpSelect]);
        if ($deleteBlocedIp) {
            echo "
            <script>
            document.getElementById('resultRemove').innerHTML = '<div class=\"alert alert-success mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">IP Adresi Başarı İle Kara Listeden Kaldırıldı.</div></div>';
            function ResultRemove() {
            document.getElementById('resultRemove').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
        }
    }
}



$query = $db->getRows("SELECT * FROM blockIP ORDER BY blockedIpID DESC");
$tableResult = "";
foreach ($query as $items) {
    $tableResult .= '<tr><th scope="row">' . $items->blockedIpID . '</th><td>' . $items->blockedIp . '</td></tr>';
}
echo '<script>document.getElementById("blockedIpResult").innerHTML = \'' . $tableResult . ' \';</script>';
$records = $db->getColumn("SELECT COUNT(blockedIpID) FROM blockIP");
if ($records < 1) {
    echo '<script>document.getElementById("records").innerHTML = \'Engellenmiş IP Adresi Yok\';</script>';
} else {
    echo '<script>document.getElementById("records").innerHTML = \'Engelli IP ler - ' . $records . ' adet\';</script>';
}
$blockedIpSelect = '<option disabled selected value="0">Engeli Kaldırılacak Ip Adresini Seçin</option>';
$blockedSelectQuery = $db->getRows("SELECT * FROM blockIP ORDER BY blockedIpID DESC");
foreach ($blockedSelectQuery as $items) {
    $blockedIpSelect .= '<option value="' . $items->blockedIpID . '">' . $items->blockedIp . '</option> ';
}
echo '<script>document.getElementById("RemoveBlockedIpSelect").innerHTML = \' ' . $blockedIpSelect . ' \';</script>';
?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>