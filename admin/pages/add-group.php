<?php
session_start();
if ($_SESSION['user'] == null) {
    header('Location:https://ozgurvurgun.com/dejavu_hookah/admin/index.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../admin-style/style.css">
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
                            <li><a class="dropdown-item text-warning" href="add-group.php">Grup Ekle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="add-product.php">Ürün Ekle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="price-update.php">Fiyat Güncelle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="stock.php">Stok</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Finans
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="income.php">Kazanç</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="z-report.php">Z Raporu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="analysis.php">Analiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="security.php">Güvenlik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="user-operations.php">Kullanıcı İşlemleri</a>
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
                    <div style="font-size: 20px;">Grup Ekleyin Ürün Gamınızı Genişletin</div>
                </div>
                <div class="card mt-3 p-5 bg-light">
                    <form id="groupAddForm" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label style="font-size: 17px;" for="GroupName" class="col-sm-2 col-form-label">Grup Adı</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="GroupName" placeholder="" name="GroupName" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label style="font-size: 17px;" for="GroupStorageName" class="col-sm-2 col-form-label">Grup Adı 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="GroupStorageName" placeholder="" name="GroupStorageName" required>
                                <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-title="Arka planda işlem yaparken Türkçe karakterler sorun yaratabiliyor. Sistemin sorunsuz çalışması için grubun adını Türkçe karakter kullanmadan ve küçük harfler ile giriniz! örn: şeftali ->seftali">ikinci grup adını neden giriyorum ?</a>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label style="font-size: 17px;" for="TopDescription" class="col-sm-2 col-form-label">Üst Yazı</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="TopDescription" placeholder="zorunlu değil" name="TopDescription">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label style="font-size: 17px;" for="SubDescription" class="col-sm-2 col-form-label">Alt Yazı</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="SubDescription" placeholder="zorunlu değil" name="SubDescription">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label style="font-size: 17px;" for="PriceRange" class="col-sm-2 col-form-label">Fiyat Aralığı</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="PriceRange" placeholder="örn: 110-140" name="PriceRange" required>
                            </div>
                        </div>
                        <div class=" row">
                            <label style="font-size: 17px;" for="GroupPhoto" class="col-sm-2 col-form-label">Grup Fotoğrafı</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="GroupPhoto" placeholder="" name="GroupPhoto" required>
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
                                <button type="submit" id="GroupAdd" name="GroupAdd" class="btn btn-success btn-lg mt-3">Ekle <span class="loadingAnimation"></span></button>
                                <button type="button" id="GroupUpdate" name="GroupUpdate" class="btn btn-primary btn-lg mt-3">Güncelle <span class="loadingAnimation"></span></button>
                                <button type="button" id="GroupDelete" name="GroupDelete" class="btn btn-danger btn-lg mt-3">Sil <span class="loadingAnimation"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="alert alert-primary mt-4 mb-5 text-center" role="alert">
                    <?php
                    $records = $db->getColumn("SELECT COUNT(ID) FROM groups");
                    ?>
                    <div id="records" style="font-size: 20px;"><?= $records < 1 ? "Kayıtlı Grup Yok" : "Mevcut gruplarınız - $records adet"; ?></div>
                </div>
                <div style="height:560.5px;overflow-y:auto;" class="card p-4 bg-light">
                    <section class="products" id="gruplar">
                        <div id="GroupResult" class="box-container">
                            <?php
                            $query = $db->getRows('SELECT * FROM groups ORDER BY ID DESC');
                            foreach ($query as $items) { ?>
                                <div class="box dark-bg mb-3">
                                    <div class="box-head">
                                        <span class="title"><?= $items->TopDescription ?></span>
                                        <p class="name"><?= $items->GroupName ?></p>
                                    </div>
                                    <div class="image">
                                        <img src="../../images/group-images/<?= $items->GroupPhoto ?>" alt="<?= $items->GroupName ?>" />
                                    </div>
                                    <div class="box-bottom">
                                        <div class="info">
                                            <b class="price"><?= $items->PriceRange ?><span>₺</span></b>
                                            <span class="amoumt"><?= $items->SubDescription ?></span>
                                        </div>
                                        <div class="product-btn">
                                            <a>
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php  }  ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5"></div>

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
</body>

</html>

<script>
    $("#groupAddForm").on('submit', function(e) {
        e.preventDefault();
        $(".loadingAnimation").html('<div class="spinner-border" role="status"><span class="visually-hidden"></span></div>');
        $("#GroupAdd").prop("disabled", true);
        $.ajax({
            type: "post",
            url: '../process-return/add-group-return.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $(".loadingAnimation").html('');
                $("#GroupAdd").prop("disabled", false);
                data = data.split(":::", 3);
                let message = data[0];
                let message2 = data[1];
                let message3 = data[2];
                $('#result').html(message);
                $('#GroupResult').html(message2);
                $('#records').html(message3);

                function ResultRemove() {
                    document.getElementById("result").innerHTML = "";
                }
                setTimeout(ResultRemove, 6000);

            }
        });
    });
</script>