<?php
session_start();
if ($_SESSION['user'] == null) {
    header('Location:https://ozgurvurgun.com/dejavu_hookah/admin/index.php');
}
require_once '../DB/database.php';
require_once 'admin-security/admin-security.php';
if ($_SESSION['authority'] == "1") {
    $authorityOne = "disabled";
} elseif ($_SESSION['authority'] == "2") {
    $authorityTwo = "disabled";
}

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
    <link rel="icon" href="../images/logo-images/icons/person-gear.svg" type="image/x-icon" />
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
            <a class="navbar-brand text-warning" href="index.php">Sipariş Paneli</a>
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
                            <li><a class="dropdown-item <?= $authorityOne ?>" href="pages/add-group.php">Grup Ekle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item <?= $authorityOne ?>" href="pages/add-product.php">Ürün Ekle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item <?= $authorityOne ?>" href="pages/product-process.php">Ürün İşlemleri</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item <?= $authorityOne ?>" href="pages/group-process.php">Grup İşlemleri</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Finans
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item <?= $authorityOne ?><?= $authorityTwo ?>" href="pages/z-report.php">Z Raporu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $authorityOne ?>" href="pages/security.php">Güvenlik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $authorityOne ?><?= $authorityTwo ?>" aria-current="page" href="pages/user-operations.php">Kullanıcı İşlemleri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $authorityOne ?>" aria-current="page" href="pages/message.php">Gelen Kutusu</a>
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
                                <li><a class="dropdown-item" href="process-return/session-destroy.php">Çıkış Yap</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item <?= $authorityOne ?><?= $authorityTwo ?>" href="pages/interface-customize.php">Özelleştir</a></li>
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
                                <th scope="col">Masa No</th>
                                <th scope="col">Sipariş</th>
                                <th scope="col">Tutar</th>
                                <th scope="col">Mesaj</th>
                                <th scope="col">IP Adresi</th>
                                <th scope="col">Veriliş Zamanı</th>
                                <th scope="col">Güncelle</th>
                                <th scope="col">Teslim Et</th>
                                <th scope="col">İptal Et</th>
                            </tr>
                        </thead>
                        <tbody id="orderTableResult">
                            <?php
                            $query = $db->getRows("SELECT * FROM orderTable ORDER BY orderID DESC");
                            $countQuery = $db->getColumn("SELECT COUNT(orderID) FROM orderTable");
                            foreach ($query as $items) { ?>
                                <div id="orderID<?= $items->orderID ?>" style="display: none;"><?= $items->orderID ?></div>
                                <tr id="<?= $items->orderID ?>">
                                    <th id="tableNo<?= $items->orderID ?>" scope="row"><?= $items->tableNo ?></th>
                                    <td id="orderContents<?= $items->orderID ?>"><?= $items->orderContents ?></td>
                                    <td id="orderAmount<?= $items->orderID ?>"><?= $items->orderAmount ?></td>
                                    <td id="orderMessage<?= $items->orderID ?>"><?= $items->orderMessage ?></td>
                                    <td id="IP<?= $items->orderID ?>"><?= $items->IP ?></td>
                                    <td id="orderDate<?= $items->orderID ?>"><?= $items->orderDate ?></td>
                                    <td>
                                        <button onclick="updateOrder(<?= $items->orderID ?>);" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="deliveOrder('deliveOrder','<?= $items->orderID ?>');" type="button" class="btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-send-check text-success" viewBox="0 0 16 16">
                                                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z" />
                                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="RemoveOrder('DeleteOrder','<?= $items->orderID ?>');" type="button" class="btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </button>
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
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sipariş Güncelleme Paneli</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="orderUpdateForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div style="display: none;">
                            <input type="text" class="form-control" id="orderID" name="orderID">
                        </div>
                        <div class="mb-3">
                            <label for="tableNo" class="col-form-label">Masa No</label>
                            <input type="text" class="form-control" id="tableNo" name="tableNo">
                        </div>
                        <div class="mb-3">
                            <label for="orderContents" class="col-form-label">Sipariş</label>
                            <textarea class="form-control" id="orderContents" name="orderContents" style="height: 100px"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="orderAmount" class="col-form-label">Tutar</label>
                            <input type="text" class="form-control" id="orderAmount" name="orderAmount">
                        </div>
                        <div class="mb-3">
                            <label for="orderMessage" class="col-form-label">mesaj</label>
                            <textarea class="form-control" id="orderMessage" name="orderMessage" style="height: 100px"></textarea>
                        </div>
                        <div class="mb-3">
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="button" onclick="updateDataOrder();" class="btn btn-primary">Güncelle <span class="loadingAnimation"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5"></div>
    <div id="toastOrder" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <div id="toast" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <script src="../assets/jquery-3-5-1.js"></script>
    <?php require_once 'js/global-message-notification-panel.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        function updateOrder(params) {
            let par = params.toString();
            let tableNo = document.getElementById("tableNo" + par).innerHTML;
            let orderContents = document.getElementById("orderContents" + par).innerHTML;
            let orderAmount = document.getElementById("orderAmount" + par).innerHTML;
            let orderMessage = document.getElementById("orderMessage" + par).innerHTML;
            document.getElementById("orderID").value = par;
            document.getElementById("tableNo").value = tableNo;
            document.getElementById("orderContents").value = orderContents;
            document.getElementById("orderAmount").value = orderAmount;
            document.getElementById("orderMessage").value = orderMessage;
        }

        function deliveOrder(Operation, ID) {
            if (confirm('Siparişi teslim etmek üzeresiniz, onay verin.')) {
                $.get('process-return/delive-order-return.php?process=' + Operation, {
                    "ID": ID
                }, function(data) {
                    data = data.split(":::", 2);
                    let message = data[0];
                    let mistake = data[1];
                    alert(message);
                    if (mistake == "success") {
                        $("#" + ID).remove();
                    }
                });
            }
        }

        function RemoveOrder(Operation, ID) {
            if (confirm('Siparişi iptal etmek istediğinizden emin misiniz ?')) {
                $.get('process-return/delete-order-return.php?process=' + Operation, {
                    "ID": ID
                }, function(data) {
                    data = data.split(":::", 2);
                    let message = data[0];
                    let mistake = data[1];
                    alert(message);
                    if (mistake == "success") {
                        $("#" + ID).remove();
                    }
                });
            }
        }

        function updateDataOrder() {
            $.ajax({
                type: 'POST',
                url: 'process-return/update-order-return.php',
                data: $('#orderUpdateForm').serialize(),
                success: function(data) {
                    data = data.split(":::", 2);
                    let message = data[0];
                    let message2 = data[1];
                    $('#result').html(message);
                    $('#orderTableResult').html(message2);

                    function ResultRemove() {
                        document.getElementById("result").innerHTML = "";
                    }
                    setTimeout(ResultRemove, 6000);
                }
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
                url: 'process-return/menu-or-automation.php?data=' + check,
                success: function(data) {
                    document.getElementById('switch-result').innerHTML = data;
                }
            });
        }
    </script>
</body>

</html>