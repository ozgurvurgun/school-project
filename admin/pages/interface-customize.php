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
                                <li><a class="dropdown-item text-warning <?= $authorityOne ?><?= $authorityTwo ?>" href="interface-customize.php">Özelleştir</a></li>
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
                    <div style="font-size: 20px;">Aşağıda ki alandan Arayüzünüzü Güncelleyebilirsiniz</div>
                </div>
                <div class="card mt-3 p-5 bg-light">
                    <form class="row g-2 row" method="POST">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="İşletme Adı" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" id="companyNameUpdate" name="companyNameUpdate" type="submit" id="button-addon2">İşletme Adı Güncelle</button>
                        </div>
                    </form>
                    <div>
                        <div id="resultCompanyName"></div>
                    </div>
                    <hr />

                    <form class="row g-2 row" method="POST">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Slogan" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" id="sloganUpdate" name="sloganUpdate" type="submit" id="button-addon2">Slogan Güncelle</button>
                        </div>
                    </form>
                    <div>
                        <div id="resultSloganUpdate"></div>
                    </div>
                    <hr />

                    <form class="row g-2 row" method="POST">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="twitterURL" name="twitterURL" placeholder="Twitter URL" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" id="twitterUrlUpdate" name="twitterUrlUpdate" type="submit" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg> Güncelle</button>
                        </div>
                    </form>
                    <div>
                        <div id="resultTwitterUrlUpdate"></div>
                    </div>
                    <hr />

                    <form class="row g-2 row" method="POST">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="instagramURL" name="instagramURL" placeholder="Instagram URL" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" id="instagramUrlUpdate" name="instagramUrlUpdate" type="submit" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg> Güncelle</button>
                        </div>
                    </form>
                    <div>
                        <div id="resultInstagramUrlUpdate"></div>
                    </div>
                    <hr />

                    <form class="row g-2 row" method="POST">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="facebookURL" name="facebookURL" placeholder="Facebook URL" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" id="facebookUrlUpdate" name="facebookUrlUpdate" type="submit" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg> Güncelle</button>
                        </div>
                    </form>
                    <div>
                        <div id="resultFacebookUrlUpdate"></div>
                    </div>
                    <hr />

                    <form class="row g-2 row" method="POST">
                        <div class="input-group mb-2">
                            <input type="color" id="interfaceColor" name="interfaceColor" class="form-control form-control-color" aria-describedby="button-addon2">
                            <button id="InterfaceColorButton" id="interfaceColorUpdate" name="interfaceColorUpdate" class="btn btn-outline-primary" type="submit" id="button-addon2">Arayüz Rengi Güncelle</button>
                        </div>
                    </form>
                    <div>
                        <div id="resultInterfaceColorUpdate"></div>
                    </div>
                    <hr />

                    <form class="row g-2 row" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-2">
                            <input type="file" class="form-control" id="intefaceLogo" name="intefaceLogo" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" id="intefaceLogoUpdate" name="intefaceLogoUpdate" type="submit" id="button-addon2">Logo Güncelle</button>
                        </div>
                    </form>
                    <div>
                        <div id="resultIntefaceLogoUpdate"></div>
                    </div>
                    <hr />

                    <form class="row g-2 row" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="file" class="form-control" id="interfacePhoto" name="interfacePhoto" placeholder="Facebook URL" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" id="interfacePhotoUpdate" name="interfacePhotoUpdate" type="submit" id="button-addon2">Arayüz Görseli Güncelle</button>
                        </div>
                    </form>
                    <div>
                        <div id="resultInterfacePhotoUpdate"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="alert alert-primary mt-4 mb-5 text-center" role="alert">
                    <div id="records" style="font-size: 20px;">Arayüz Ön izleme</div>
                </div>
                <div style="height:697.7px;overflow-y:auto;" class="card">
                    <iframe height="697.7px;" src="https://ozgurvurgun.com/dejavu_hookah/?table=0" frameborder="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>




    <?php
    if (isset($_POST['companyName'])) {
        $companyName = security('companyName');
        if (empty($companyName)) {
            echo "
            <script>
            document.getElementById('resultCompanyName').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Lütfen Giriş Birimini Doldurun</div></div>';
            function ResultRemove() {
            document.getElementById('resultCompanyName').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
        } else {
            $query = $db->update('UPDATE interfaceData SET CompanyName=? WHERE interfaceDataID=?', [$companyName, 1]);
            if ($query) {
                echo "
                <script>
                document.getElementById('resultCompanyName').innerHTML = '<div class=\"alert alert-success mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">İşletme Adı Başarı İle Güncellendi</div></div>';
                function ResultRemove() {
                document.getElementById('resultCompanyName').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            } else {
                echo "
                <script>
                document.getElementById('resultCompanyName').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Aynı Veriyi Giriyorsunuz</div></div>';
                function ResultRemove() {
                document.getElementById('resultCompanyName').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            }
        }
    }

    if (isset($_POST['slogan'])) {
        $slogan = security('slogan');
        if (empty($slogan)) {
            echo "
            <script>
            document.getElementById('resultSloganUpdate').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Lütfen Giriş Birimini Doldurun</div></div>';
            function ResultRemove() {
            document.getElementById('resultSloganUpdate').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
        } else {
            $query = $db->update('UPDATE interfaceData SET slogan=? WHERE interfaceDataID=?', [$slogan, 1]);
            if ($query) {
                echo "
                <script>
                document.getElementById('resultSloganUpdate').innerHTML = '<div class=\"alert alert-success mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Slogan Başarı İle Güncellendi</div></div>';
                function ResultRemove() {
                document.getElementById('resultSloganUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            } else {
                echo "
                <script>
                document.getElementById('resultSloganUpdate').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Aynı Veriyi Giriyorsunuz</div></div>';
                function ResultRemove() {
                document.getElementById('resultSloganUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            }
        }
    }

    if (isset($_POST['twitterURL'])) {
        $twitterURL = security('twitterURL');
        if (empty($twitterURL)) {
            echo "
            <script>
            document.getElementById('resultTwitterUrlUpdate').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Lütfen Giriş Birimini Doldurun</div></div>';
            function ResultRemove() {
            document.getElementById('resultTwitterUrlUpdate').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
        } else {
            if (!filter_var($twitterURL, FILTER_VALIDATE_URL) && $twitterURL != '#') {
                echo "
                <script>
                document.getElementById('resultTwitterUrlUpdate').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Girdiğiniz URL Formatı Hatalı</div></div>';
                function ResultRemove() {
                document.getElementById('resultTwitterUrlUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            } else {
                $query = $db->update('UPDATE interfaceData SET TwitterURL=? WHERE interfaceDataID=?', [$twitterURL, 1]);
                if ($query) {
                    echo "
                <script>
                document.getElementById('resultTwitterUrlUpdate').innerHTML = '<div class=\"alert alert-success mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Twitter URL Başarı İle Güncellendi</div></div>';
                function ResultRemove() {
                document.getElementById('resultTwitterUrlUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
                } else {
                    echo "
                <script>
                document.getElementById('resultTwitterUrlUpdate').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Aynı Veriyi Giriyorsunuz</div></div>';
                function ResultRemove() {
                document.getElementById('resultTwitterUrlUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
                }
            }
        }
    }

    if (isset($_POST['instagramURL'])) {
        $instagramURL = security('instagramURL');
        if (empty($instagramURL)) {
            echo "
            <script>
            document.getElementById('resultInstagramUrlUpdate').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Lütfen Giriş Birimini Doldurun</div></div>';
            function ResultRemove() {
            document.getElementById('resultInstagramUrlUpdate').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
        } else {
            if (!filter_var($instagramURL, FILTER_VALIDATE_URL) && $instagramURL != '#') {
                echo "
                <script>
                document.getElementById('resultInstagramUrlUpdate').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Girdiğiniz URL Formatı Hatalı</div></div>';
                function ResultRemove() {
                document.getElementById('resultInstagramUrlUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            } else {
                $query = $db->update('UPDATE interfaceData SET InstagramURL=? WHERE interfaceDataID=?', [$instagramURL, 1]);
                if ($query) {
                    echo "
                <script>
                document.getElementById('resultInstagramUrlUpdate').innerHTML = '<div class=\"alert alert-success mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Instagram URL Başarı İle Güncellendi</div></div>';
                function ResultRemove() {
                document.getElementById('resultInstagramUrlUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
                } else {
                    echo "
                <script>
                document.getElementById('resultInstagramUrlUpdate').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Aynı Veriyi Giriyorsunuz</div></div>';
                function ResultRemove() {
                document.getElementById('resultInstagramUrlUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
                }
            }
        }
    }

    if (isset($_POST['facebookURL'])) {
        $facebookURL = security('facebookURL');
        if (empty($facebookURL)) {
            echo "
            <script>
            document.getElementById('resultFacebookUrlUpdate').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Lütfen Giriş Birimini Doldurun</div></div>';
            function ResultRemove() {
            document.getElementById('resultFacebookUrlUpdate').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
        } else {
            if (!filter_var($facebookURL, FILTER_VALIDATE_URL) && $facebookURL != '#') {
                echo "
                <script>
                document.getElementById('resultFacebookUrlUpdate').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Girdiğiniz URL Formatı Hatalı</div></div>';
                function ResultRemove() {
                document.getElementById('resultFacebookUrlUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            } else {
                $query = $db->update('UPDATE interfaceData SET FacebookURL=? WHERE interfaceDataID=?', [$facebookURL, 1]);
                if ($query) {
                    echo "
                <script>
                document.getElementById('resultFacebookUrlUpdate').innerHTML = '<div class=\"alert alert-success mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Facebook URL Başarı İle Güncellendi</div></div>';
                function ResultRemove() {
                document.getElementById('resultFacebookUrlUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
                } else {
                    echo "
                <script>
                document.getElementById('resultFacebookUrlUpdate').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Aynı Veriyi Giriyorsunuz</div></div>';
                function ResultRemove() {
                document.getElementById('resultFacebookUrlUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
                }
            }
        }
    }

    if (isset($_POST['interfaceColor'])) {
        $interfaceColor = security('interfaceColor');
        if (empty($interfaceColor)) {
            echo "
            <script>
            document.getElementById('resultInterfaceColorUpdate').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Lütfen Giriş Birimini Doldurun</div></div>';
            function ResultRemove() {
            document.getElementById('resultInterfaceColorUpdate').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
        } else {
            $query = $db->update('UPDATE interfaceData SET 	InterfaceColor=? WHERE interfaceDataID=?', [$interfaceColor, 1]);
            if ($query) {
                echo "
                <script>
                document.getElementById('resultInterfaceColorUpdate').innerHTML = '<div class=\"alert alert-success mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Arayüz Rengi Başarı İle Güncellendi</div></div>';
                function ResultRemove() {
                document.getElementById('resultInterfaceColorUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            } else {
                echo "
                <script>
                document.getElementById('resultInterfaceColorUpdate').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Mevcut Kullanılan Renk Kodunu Giriyorsunuz</div></div>';
                function ResultRemove() {
                document.getElementById('resultInterfaceColorUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            }
        }
    }

    if (isset($_POST['intefaceLogoUpdate'])) {
        $fileName = $_FILES['intefaceLogo']['name'];
        $fileTMP = $_FILES['intefaceLogo']['tmp_name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = 'interface-logo.' . $ext;
        $path = '../../images/interface-images/' . $newFileName;
        if ($_FILES["intefaceLogo"]["name"] == '') {
            echo "
            <script>
            document.getElementById('resultIntefaceLogoUpdate').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Lütfen Resim Seçiniz</div></div>';
            function ResultRemove() {
            document.getElementById('resultIntefaceLogoUpdate').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
        } else {
            if ($ext != "png") {
                echo "
                <script>
                document.getElementById('resultIntefaceLogoUpdate').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Logo Png Formatında olmalıdır</div></div>';
                function ResultRemove() {
                document.getElementById('resultIntefaceLogoUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            } else {
                if (move_uploaded_file($fileTMP, $path)) {
                    echo "
                   <script>
                   document.getElementById('resultIntefaceLogoUpdate').innerHTML = '<div class=\"alert alert-success mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Logo Başarı İle Güncellendi</div></div>';
                   function ResultRemove() {
                   document.getElementById('resultIntefaceLogoUpdate').innerHTML = '';
                   }
                   setTimeout(ResultRemove, 6000);
                   </script>";
                } else {
                    echo "
                    <script>
                    document.getElementById('resultIntefaceLogoUpdate').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Logo Yüklenirken Bir Hata Oluştu</div></div>';
                    function ResultRemove() {
                    document.getElementById('resultIntefaceLogoUpdate').innerHTML = '';
                    }
                    setTimeout(ResultRemove, 6000);
                    </script>";
                }
            }
        }
    }




    if (isset($_POST['interfacePhotoUpdate'])) {
        $fileName = $_FILES['interfacePhoto']['name'];
        $fileTMP = $_FILES['interfacePhoto']['tmp_name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = 'interface-photo.' . $ext;
        $path = '../../images/interface-images/' . $newFileName;
        if ($_FILES["interfacePhoto"]["name"] == '') {
            echo "
            <script>
            document.getElementById('resultInterfacePhotoUpdate').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Lütfen Resim Seçiniz</div></div>';
            function ResultRemove() {
            document.getElementById('resultInterfacePhotoUpdate').innerHTML = '';
            }
            setTimeout(ResultRemove, 6000);
            </script>";
        } else {
            if ($ext != "png") {
                echo "
                <script>
                document.getElementById('resultInterfacePhotoUpdate').innerHTML = '<div class=\"alert alert-warning mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Arayüz Fotoğrafı Png Formatında olmalıdır</div></div>';
                function ResultRemove() {
                document.getElementById('resultInterfacePhotoUpdate').innerHTML = '';
                }
                setTimeout(ResultRemove, 6000);
                </script>";
            } else {
                if (move_uploaded_file($fileTMP, $path)) {
                    echo "
                   <script>
                   document.getElementById('resultInterfacePhotoUpdate').innerHTML = '<div class=\"alert alert-success mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Arayüz Fotoğrafı Başarı İle Güncellendi</div></div>';
                   function ResultRemove() {
                   document.getElementById('resultInterfacePhotoUpdate').innerHTML = '';
                   }
                   setTimeout(ResultRemove, 6000);
                   </script>";
                } else {
                    echo "
                    <script>
                    document.getElementById('resultInterfacePhotoUpdate').innerHTML = '<div class=\"alert alert-danger mt-4 mb-2 text-center\" role=\"alert\"><div style=\"font-size: 20px;\">Arayüz Fotoğrafı Yüklenirken Bir Hata Oluştu</div></div>';
                    function ResultRemove() {
                    document.getElementById('resultInterfacePhotoUpdate').innerHTML = '';
                    }
                    setTimeout(ResultRemove, 6000);
                    </script>";
                }
            }
        }
    }
    ?>

    <script>
        document.getElementById('interfaceColor').value = '<?php
                                                            $query = $db->getRow('SELECT InterfaceColor FROM interfaceData WHERE interfaceDataID=?', [1]);
                                                            echo $query->InterfaceColor;
                                                            ?>';
    </script>

    <div class="container mt-5"></div>
    <div id="toastOrder" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <div id="toast" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    <script src="../../assets/jquery-3-5-1.js"></script>
    <?php require_once '../js/global-message-notification.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>