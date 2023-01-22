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
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/logo-images/icons/person-gear.svg" type="image/x-icon" />
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
                            <li><a class="dropdown-item" href="add-product.php">Ürün Ekle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="product-process.php">Ürün İşlemleri</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-warning" href="group-process.php">Grup İşlemleri</a></li>
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
    <div class="container-fluid p-5 fs-6">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Grup Fotoğrafı</th>
                                <th scope="col">Grup Adı</th>
                                <th scope="col">Grup Arkaplan Adı</th>
                                <th scope="col">Fiyat Aralığı</th>
                                <th scope="col">Üst Yazı</th>
                                <th scope="col">Alt Yazı</th>
                                <th scope="col">Durum</th>
                                <th scope="col">Güncelle</th>
                                <th scope="col">Sil</th>
                            </tr>
                        </thead>
                        <tbody id="groupResult">
                            <?php
                            $query = $db->getRows("SELECT * FROM groups ORDER BY ID DESC");
                            $countQuery = $db->getColumn("SELECT COUNT(ID) FROM groups");
                            foreach ($query as $items) { ?>
                                <div id="GroupID<?= $items->ID ?>" style="display: none;"><?= $items->ID ?></div>
                                <div id="GroupPhoto<?= $items->ID ?>" style="display: none;"><?= $items->GroupPhoto ?></div>
                                <div id="GroupStorageName<?= $items->GroupStorageName ?>" style="display: none;"><?= $items->GroupStorageName ?></div>
                                <tr id="<?= $items->ID ?>">
                                    <th scope="row"><img width="70px" height="70px" src="../../images/group-images/<?= $items->GroupPhoto ?>" alt="<?= $items->GroupPhoto ?>"></th>
                                    <td id="GroupName<?= $items->ID ?>"><?= $items->GroupName ?></td>
                                    <td id="GroupStorageName<?= $items->ID ?>"><?= $items->GroupStorageName ?></td>
                                    <td id="PriceRange<?= $items->ID ?>"><?= $items->PriceRange ?></td>
                                    <td id="TopDescription<?= $items->ID ?>"><?= $items->TopDescription ?></td>
                                    <td id="SubDescription<?= $items->ID ?>"><?= $items->SubDescription ?></td>
                                    <td style="color:<?= ($items->GroupActivity) == "A" ? 'green' : 'red'; ?>;font-size:20px;" id="GroupActivity<?= $items->ID ?>"><?= ($items->GroupActivity) == "A" ? 'Aktif' : 'Pasif'; ?></td>
                                    <td>
                                        <button onclick="UpdateGroup(<?= $items->ID ?>);" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="RemoveGroup('DeleteGroup','<?= $items->ID ?>')">
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
                    <div id="countResult"><?= ($countQuery < 1) ? '<div class="alert alert-warning text-center fs-4" role="alert">Kayıtlı Grup Yok</div>' : ''; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Grup Güncelleme Paneli</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="groupUpdateForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div style="display: none;">
                            <input type="text" class="form-control" id="GroupID" name="GroupID">
                            <input type="text" class="form-control" id="GroupPhoto" name="GroupPhoto">
                            <input type="text" class="form-control" id="GroupStorageName" name="GroupStorageName">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Üst Yazı</label>
                            <input type="text" class="form-control" id="TopDescription" name="TopDescription">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Alt Yazı</label>
                            <input type="text" class="form-control" id="SubDescription" name="SubDescription">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Fiyat Aralığı</label>
                            <input type="text" class="form-control" id="PriceRange" name="PriceRange">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Grup Durumu</label>
                            <select class="form-select" id="GroupActivity" name="GroupActivity" aria-label="Default select example">
                                <option disabled selected value="0">A - Aktif , B - Pasif</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Grup fotoğrafı</label>
                            <input type="file" class="form-control" id="GroupNewPhoto" name="GroupNewPhoto">
                        </div>
                        <div class="mb-3">
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="submit" id="groupUpdate" class="btn btn-primary">Güncelle <span class="loadingAnimation"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5"></div>
    <div id="toastOrder" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <div id="toast" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <script src="../../assets/jquery-3-5-1.js"></script>
    <?php require_once '../js/global-message-notification.php' ?>
    <script>
        function UpdateGroup(params) {
            let par = params.toString();
            let GroupStorageName = document.getElementById("GroupStorageName" + par).innerHTML;
            let GroupPhoto = document.getElementById("GroupPhoto" + par).innerHTML;
            let PriceRange = document.getElementById("PriceRange" + par).innerHTML;
            let TopDescription = document.getElementById("TopDescription" + par).innerHTML;
            let SubDescription = document.getElementById("SubDescription" + par).innerHTML;
            let GroupActivity = document.getElementById("GroupActivity" + par).innerHTML;
            if (GroupActivity == "Aktif") {
                GroupActivity = "A";
            } else {
                GroupActivity = "B";
            }
            document.getElementById("GroupID").value = par;
            document.getElementById("GroupPhoto").value = GroupPhoto;
            document.getElementById("TopDescription").value = TopDescription;
            document.getElementById("SubDescription").value = SubDescription;
            document.getElementById("PriceRange").value = PriceRange;
            document.getElementById("GroupActivity").value = GroupActivity;
            document.getElementById("GroupStorageName").value = GroupStorageName;
        }

        function RemoveGroup(Operation, ID) {
            if (confirm('Grubu silmek istediğinizden emin misiniz ? Grubu silerseniz grup ile ilişkili ürün ve diğer verileri de kaybedersiniz.')) {
                if (confirm('Grubu silmek üzeresiniz son onayı verin.')) {
                    $.get('../process-return/update-group-return.php?process=' + Operation, {
                        "ID": ID
                    }, function(data) {
                        data = data.split(":::", 2);
                        let message = data[0];
                        let mistake = data[1];
                        alert(message);
                        if (mistake == "success") {
                            $("#" + ID).remove();
                        } else if (mistake == "warning") {
                            $("#" + ID).remove();
                            document.getElementById('countResult').innerHTML = '<div class="alert alert-warning text-center fs-4" role="alert">Kayıtlı Grup Yok</div>';
                        }
                        updateInterface();
                    });
                }
            }
        }
        $("#groupUpdateForm").on('submit', function(e) {
            e.preventDefault();
            $(".loadingAnimation").html('<div class="spinner-border" role="status"><span class="visually-hidden"></span></div>');
            $("#groupUpdate").prop("disabled", true);
            $.ajax({
                type: "post",
                url: '../process-return/update-group-return.php?process=groupUpdate',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $(".loadingAnimation").html('');
                    $("#groupUpdate").prop("disabled", false);
                    data = data.split(":::", 2);
                    let message = data[0];
                    let message2 = data[1];
                    $('#result').html(message);
                    $('#groupResult').html(message2);
                    updateInterface();

                    function ResultRemove() {
                        document.getElementById("result").innerHTML = "";
                    }
                    setTimeout(ResultRemove, 6000);
                }
            });
        });

        function updateInterface() {
            $.ajax({
                type: 'POST',
                url: '../process-return/updateInterface.php',
                success: function(data) {}
            });
        }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>