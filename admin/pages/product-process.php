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
                            <li><a class="dropdown-item" href="add-product.php">Ürün Ekle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-warning" href="product-process.php">Ürün İşlemleri</a></li>
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
                                <th scope="col">Durum</th>
                                <th scope="col">Güncelle</th>
                                <th scope="col">Sil</th>
                            </tr>
                        </thead>
                        <tbody id="productResult">
                            <?php
                            $query = $db->getRows("SELECT products.ProductPicture, products.ProductActivity, products.ProductAutoID, products.ProductID, products.ProductName, products.ProductPrice, products.ProductDiscountPrice, products.ProductStorageName, products.ProductPicture, groups.GroupName, groups.ID, groups.GroupStorageName FROM products INNER JOIN groups ON products.ProductID=groups.ID ORDER BY products.ProductID DESC , products.ProductAutoID DESC");
                            $countQuery = $db->getColumn("SELECT COUNT(ProductAutoID) FROM products");
                            foreach ($query as $items) { ?>
                                <div id="GroupStorageName<?= $items->ProductAutoID ?>" style="display: none;"><?= $items->GroupStorageName ?></div>
                                <div id="GroupID<?= $items->ProductAutoID ?>" style="display: none;"><?= $items->ID ?></div>
                                <div id="ProductPicture<?= $items->ProductAutoID ?>" style="display: none;"><?= $items->ProductPicture ?></div>
                                <tr id="<?= $items->ProductAutoID ?>">
                                    <th scope="row"><img width="70px" height="70px" src="../../images/product-images/<?= $items->ProductPicture ?>" alt="<?= $items->ProductPicture ?>"></th>
                                    <td id="GroupName<?= $items->ProductAutoID ?>"><?= $items->GroupName ?></td>
                                    <td id="ProductName<?= $items->ProductAutoID ?>"><?= $items->ProductName ?></td>
                                    <td id="ProductStorageName<?= $items->ProductAutoID ?>"><?= $items->ProductStorageName ?></td>
                                    <td id="ProductPrice<?= $items->ProductAutoID ?>"><?= $items->ProductPrice ?></td>
                                    <td id="ProductDiscountPrice<?= $items->ProductAutoID ?>"><?= $items->ProductDiscountPrice ?></td>
                                    <td style="color:<?= ($items->ProductActivity) == "A" ? 'green' : 'red'; ?>;font-size:20px;" id="ProductActivity<?= $items->ProductAutoID ?>"><?= ($items->ProductActivity) == "A" ? 'Aktif' : 'Pasif'; ?></td>
                                    <td>
                                        <button onclick="UpdateProduct(<?= $items->ProductAutoID ?>);" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="RemoveProduct('DeleteProduct','<?= $items->ProductAutoID ?>')">
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
                    <div id="countResult"><?= ($countQuery < 1) ? '<div class="alert alert-warning text-center fs-4" role="alert">Kayıtlı Ürün Yok</div>' : ''; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ürün Güncelleme Paneli</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="productUpdateForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div style="display: none;">
                            <input type="text" class="form-control" id="ProductID" name="ProductID">
                            <input type="text" class="form-control" id="ProductPicture" name="ProductPicture">
                            <input type="text" class="form-control" id="ProductStorageName" name="ProductStorageName">
                            <input type="text" class="form-control" id="GroupStorageName" name="GroupStorageName">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Fiyatı</label>
                            <input type="text" class="form-control" id="ProductPrice" name="ProductPrice">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">İndirimli Fiyatı</label>
                            <input type="text" class="form-control" id="ProductDiscountPrice" name="ProductDiscountPrice">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Ürün Durumu</label>
                            <select class="form-select" id="ProductActivity" name="ProductActivity" aria-label="Default select example">
                                <option disabled selected value="0">A - Aktif , B - Pasif</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Ürün fotoğrafı</label>
                            <input type="file" class="form-control" id="ProductPhoto" name="ProductPhoto">
                        </div>
                        <div class="mb-3">
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="submit" id="ProductUpdate" class="btn btn-primary">Güncelle <span class="loadingAnimation"></span></button>
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
        function UpdateProduct(params) {
            let par = params.toString();
            let GroupStorageName = document.getElementById("GroupStorageName" + par).innerHTML;
            let ProductStorageName = document.getElementById("ProductStorageName" + par).innerHTML;
            let ProductPrice = document.getElementById("ProductPrice" + par).innerHTML;
            let ProductDiscountPrice = document.getElementById("ProductDiscountPrice" + par).innerHTML;
            let ProductActivity = document.getElementById("ProductActivity" + par).innerHTML;
            if (ProductActivity == "Aktif") {
                ProductActivity = "A";
            } else {
                ProductActivity = "B";
            }
            let ProductPicture = document.getElementById("ProductPicture" + par).innerHTML;
            document.getElementById("ProductPrice").value = ProductPrice;
            document.getElementById("ProductDiscountPrice").value = ProductDiscountPrice;
            document.getElementById("ProductActivity").value = ProductActivity;
            document.getElementById("ProductID").value = params;
            document.getElementById("ProductPicture").value = ProductPicture;
            document.getElementById("GroupStorageName").value = GroupStorageName;
            document.getElementById("ProductStorageName").value = ProductStorageName;
        }

        function RemoveProduct(Operation, ID) {
            if (confirm('Ürünü silmek istediğinizden emin misiniz ?')) {
                $.get('../process-return/update-product-return.php?process=' + Operation, {
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
                        document.getElementById('countResult').innerHTML = '<div class="alert alert-warning text-center fs-4" role="alert">Kayıtlı Ürün Yok</div>';
                    }
                    updateInterface();
                });
            }
        }
        $("#productUpdateForm").on('submit', function(e) {
            e.preventDefault();
            $(".loadingAnimation").html('<div class="spinner-border" role="status"><span class="visually-hidden"></span></div>');
            $("#ProductUpdate").prop("disabled", true);
            $.ajax({
                type: "post",
                url: '../process-return/update-product-return.php?process=priceUpdate',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $(".loadingAnimation").html('');
                    $("#ProductUpdate").prop("disabled", false);
                    data = data.split(":::", 2);
                    let message = data[0];
                    let message2 = data[1];
                    $('#result').html(message);
                    $('#productResult').html(message2);
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>