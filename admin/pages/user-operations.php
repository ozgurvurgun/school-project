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
                            <li><a class="dropdown-item <?= $authorityTwo ?>" href="income.php">Kazanç</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item <?= $authorityTwo ?>" href="z-report.php">Z Raporu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="security.php">Güvenlik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning <?= $authorityTwo ?>" aria-current="page" href="user-operations.php">Kullanıcı İşlemleri</a>
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


    <!--/////////////////////////////////////////////////////-->
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="alert alert-warning mt-4 mb-5 text-center" role="alert">
                    <div style="font-size: 20px;">Kullanıcı Ekle</div>
                </div>
                <div class="card mt-3 p-5 bg-light">
                    <form id="userAddForm" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="userName" name="userName" required placeholder="Kullanıcı Adı">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="password" name="password" required placeholder="Parola">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nameSurname" name="nameSurname" required placeholder="Ad Soyad">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="phone" name="phone" required placeholder="Telefon">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="adress" name="adress" required placeholder="Adres">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <select class="form-select" id="userAuthority" name="userAuthority" aria-label="Default select example">
                                    <option disabled selected value="0">Yetki Düzeyini Seçin</option>
                                    <option value="1">Alt Düzey</option>
                                    <option value="2">Orta Düzey</option>
                                    <option value="3">Üst Düzey</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <div class="col-sm-12">
                                <div id="result"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" id="UserAdd" name="UserAdd" class="btn btn-success btn-lg mt-3"><span style="font-size: 28px;">Ekle</span><span class="loadingAnimation"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7 mx-auto">
                <div class="alert alert-primary mt-4 mb-5 text-center" role="alert">
                    <?php
                    $records = $db->getColumn("SELECT COUNT(UsersID) FROM users");
                    ?>
                    <div id="records" style="font-size: 20px;"><?= $records < 1 ? "Kayıtlı Kullanıcı Yok" : "Kayıtlı Kullanıcılar - $records adet"; ?></div>
                </div>
                <div style="height:506px;overflow-y:auto;" class="card bg-light">
                    <section>
                        <div class="box-container text-center">
                            <div class="container-fluid p-5 fs-6">
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Kullanıcı Adı</th>
                                                        <th scope="col">Parola</th>
                                                        <th scope="col">Ad Soyad</th>
                                                        <th scope="col">Telefon</th>
                                                        <th scope="col">Adres</th>
                                                        <th scope="col">Yetki Düzeyi</th>
                                                        <th scope="col">Güncelle</th>
                                                        <th scope="col">Sil</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="userResult">
                                                    <?php
                                                    $query = $db->getRows("SELECT * FROM users ORDER BY UsersID DESC");
                                                    foreach ($query as $items) { ?>
                                                        <tr id="<?= $items->UsersID ?>">
                                                            <td id="UsersUsername<?= $items->UsersID ?>"><?= $items->UsersUsername ?></td>
                                                            <td id="UsersPassword<?= $items->UsersID ?>"><?= $items->UsersPassword ?></td>
                                                            <td id="UsersName<?= $items->UsersID ?>"><?= $items->UsersName ?></td>
                                                            <td id="UsersPhone<?= $items->UsersID ?>"><?= $items->UsersPhone ?></td>
                                                            <td id="UsersAddress<?= $items->UsersID ?>"><?= $items->UsersAddress ?></td>
                                                            <td style="color:red;font-size:25px;" id="UsersActivity<?= $items->UsersID ?>"><?= $items->UsersAuthority ?></td>
                                                            <td>
                                                                <button onclick="UpdateUsers(<?= $items->UsersID ?>);" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)" onclick="RemoveUsers('DeleteUser','<?= $items->UsersID ?>')">
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
    <!--/////////////////////////////////////////////////////-->

    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Kullanıcı Güncelleme Paneli</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="userUpdateForm" method="POST">
                    <div class="modal-body">
                        <div style="display: none;">
                            <input type="text" class="form-control" id="UsersID" name="UsersID">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Parola</label>
                            <input type="text" class="form-control" id="passwordUser" name="passwordUser">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Telefon</label>
                            <input type="text" class="form-control" id="userPhone" name="userPhone">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Adres</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Yetki Düzeyi</label>
                            <select class="form-select" id="UsertActivity" name="UsertActivity" aria-label="Default select example">
                                <option disabled selected value="0">1 Alt Düzey, 2 Orta Düzey, 3 Üst Düzey</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div id="resultModal"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="submitUpdateUser" id="UserUpdate" class="btn btn-primary">Güncelle <span class="loadingAnimationModal"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div class="container mt-5"></div>

    <div id="toast" class="toast-container position-fixed bottom-0 end-0 p-3"></div>

    <script src="../../assets/jquery-3-5-1.js"></script>
    <?php require_once '../js/global-message-notification.php' ?>

    <script>
        function UpdateUsers(params) {
            let par = params.toString();
            let UsersPassword = document.getElementById("UsersPassword" + par).innerHTML;
            let UsersPhone = document.getElementById("UsersPhone" + par).innerHTML;
            let UsersAddress = document.getElementById("UsersAddress" + par).innerHTML;
            let UserActivity = document.getElementById("UsersActivity" + par).innerHTML;
            document.getElementById("passwordUser").value = UsersPassword;
            document.getElementById("userPhone").value = UsersPhone;
            document.getElementById("address").value = UsersAddress;
            document.getElementById("UsersID").value = par;
            document.getElementById("UsertActivity").value = UserActivity;
        }
        $("#userAddForm").on('submit', function(e) {
            e.preventDefault();
            $(".loadingAnimation").html('<div class="spinner-border" role="status"><span class="visually-hidden"></span></div>');
            $("#UserAdd").prop("disabled", true);
            $.ajax({
                type: "post",
                url: '../process-return/user-operations-return.php?process=useradd',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $(".loadingAnimation").html('');
                    $("#UserAdd").prop("disabled", false);
                    data = data.split(":::", 3);
                    let message = data[0];
                    let message2 = data[1];
                    let message3 = data[2];
                    $('#result').html(message);
                    $('#userResult').html(message2);
                    $('#records').html(message3);

                    function ResultRemove() {
                        document.getElementById("result").innerHTML = "";
                    }
                    setTimeout(ResultRemove, 6000);

                }
            });
        });
        $("#userUpdateForm").on('submit', function(e) {
            e.preventDefault();
            $(".loadingAnimationModal").html('<div class="spinner-border" role="status"><span class="visually-hidden"></span></div>');
            $("#UserUpdate").prop("disabled", true);
            $.ajax({
                type: "post",
                url: '../process-return/user-operations-return.php?process=userUpdate',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $(".loadingAnimationModal").html('');
                    $("#UserUpdate").prop("disabled", false);
                    data = data.split(":::", 2);
                    let message = data[0];
                    let message2 = data[1];
                    let message3 = data[2];
                    $('#resultModal').html(message);
                    $('#userResult').html(message2);
                    $('#records').html(message3);

                    function ResultRemove() {
                        document.getElementById("resultModal").innerHTML = "";
                    }
                    setTimeout(ResultRemove, 6000);

                }
            });
        });


        function RemoveUsers(Operation, ID) {
            if (confirm('Kullanıcıyı silmek istediğinizden emin misiniz ?')) {
                $.get('../process-return/user-operations-return.php?process=' + Operation, {
                    "ID": ID
                }, function(data) {
                    data = data.split(":::", 3);
                    let message = data[0];
                    let mistake = data[1];
                    let message2 = data[2];
                    alert(message);
                    $('#records').html(message2);
                    if (mistake == "success") {
                        $("#" + ID).remove();
                    } else if (mistake == "warning") {
                        $("#" + ID).remove();
                    }
                });
            }
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>