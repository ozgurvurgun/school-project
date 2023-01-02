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
                        <a class="nav-link dropdown-toggle text-warning " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menü
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="add-group.php">Grup Ekle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-warning" href="add-product.php">Ürün Ekle</a></li>
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
                    <div style="font-size: 20px;">İlgili Grubu Seçip Ürün Ekleyebilirsiniz</div>
                </div>
                <div class="card mt-3 p-5 bg-light">
                    <form id="productAddForm" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label style="font-size: 17px;" for="GroupID" class="col-sm-2 col-form-label">Grup Adı</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="GroupID" name="GroupID" aria-label="Default select example">
                                    <option disabled selected value="0">Ürünün ekleneceği grubu seçin</option>
                                    <?php
                                    $groups = $db->getRows("SELECT ID,GroupName FROM groups ORDER BY ID DESC");
                                    foreach ($groups as $items) { ?>
                                        <option value="<?= $items->ID ?>"><?= $items->GroupName ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label style="font-size: 17px;" for="ProductName" class="col-sm-2 col-form-label">Ürün Adı</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ProductName" name="ProductName" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label style="font-size: 17px;" for="ProductStorageName" class="col-sm-2 col-form-label">Ürün Adı 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ProductStorageName" name="ProductStorageName" required>
                                <a style="text-decoration: none;" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-title="Arka planda işlem yaparken Türkçe karakterler sorun yaratabiliyor. Sistemin sorunsuz çalışması için ürünün adını Türkçe karakter kullanmadan ve küçük harfler ile giriniz! örn: şeftali ->seftali">ikinci ürün adını neden giriyorum ?</a>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label style="font-size: 17px;" for="ProductPrice" class="col-sm-2 col-form-label">Ürün Fiyatı</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label style="font-size: 17px;" for="ProductOldPrice" class="col-sm-2 col-form-label">Eski Fiyat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ProductOldPrice" name="ProductOldPrice" required>
                            </div>
                        </div>
                        <div class=" row">
                            <label style="font-size: 17px;" for="ProductPhoto" class="col-sm-2 col-form-label">Ürün Fotoğrafı</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="ProductPhoto" name="ProductPhoto" required>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <div id="result"></div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <div class="col-sm-2"></div>
                            <div class="col-md-10 ">
                                <button type="submit" id="ProductAdd" name="ProductAdd" class="btn btn-success btn-lg mt-3">Ekle <span class="loadingAnimation"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="alert alert-primary mt-4 mb-5 text-center" role="alert">
                    <?php
                    $records = $db->getColumn("SELECT COUNT(ProductID) FROM products");
                    ?>
                    <div id="records" style="font-size: 20px;"><?= $records < 1 ? "Kayıtlı Ürün Yok" : "Mevcut Ürünleriniz - $records adet"; ?></div>
                </div>
                <div style="height:535px;overflow-y:auto;" class="card bg-light">
                    <section>
                        <div class="box-container text-center">
                            <div class="container-fluid p-5 fs-6">
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Ürün Fotoğrafı</th>
                                                        <th scope="col">Ürün Grubu</th>
                                                        <th scope="col">Ürün Adı</th>
                                                        <th scope="col">Ürün Arkaplan Adı</th>
                                                        <th scope="col">Fiyatı</th>
                                                        <th scope="col">İndirimli Fiyat</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="productResult">
                                                    <?php
                                                    $query = $db->getRows("SELECT products.ProductAutoID, products.ProductID, products.ProductName, products.ProductPrice, products.ProductDiscountPrice, products.ProductStorageName, products.ProductPicture, groups.GroupName FROM products INNER JOIN groups ON products.ProductID=groups.ID ORDER BY products.ProductID DESC , products.ProductAutoID DESC");
                                                    foreach ($query as $items) { ?>
                                                        <tr>
                                                            <th scope="row"><img width="70px" height="70px" src="../../images/product-images/<?= $items->ProductPicture ?>" alt="<?= $items->ProductPicture ?>"></th>
                                                            <td><?= $items->GroupName ?></td>
                                                            <td><?= $items->ProductName ?></td>
                                                            <td><?= $items->ProductStorageName ?></td>
                                                            <td><?= $items->ProductPrice ?></td>
                                                            <td><?= $items->ProductDiscountPrice ?></td>
                                                        </tr>
                                                    <?php  } ?>
                                                </tbody>
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
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        $("#productAddForm").on('submit', function(e) {
            e.preventDefault();
            $(".loadingAnimation").html('<div class="spinner-border" role="status"><span class="visually-hidden"></span></div>');
            $("#ProductAdd").prop("disabled", true);
            $.ajax({
                type: "post",
                url: '../process-return/add-product-return.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $(".loadingAnimation").html('');
                    $("#ProductAdd").prop("disabled", false);
                    data = data.split(":::", 3);
                    let message = data[0];
                    let message2 = data[1];
                    let message3 = data[2];
                    $('#result').html(message);
                    $('#productResult').html(message2);
                    $('#records').html(message3);

                    function ResultRemove() {
                        document.getElementById("result").innerHTML = "";
                    }
                    setTimeout(ResultRemove, 6000);
                }
            });
        });
    </script>
</body>

</html>