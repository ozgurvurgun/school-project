<?php
require_once 'DB/database.php';

use dejavu_hookah\db\Database as db;

$db = new db;

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/logo-images/icons/smoking-solid.svg" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap css start-->
    <!--bootstrap css end-->
    <link rel="stylesheet" href="styles/style.css" />
    <title>404 - Dejavu Hookah</title>
    <style>
        :root {
            --main-color: #e84242;
            --black-color: #0e0e0e;
            --border: 0.1rem solid rgba(255, 255, 255, 0.4);
            --back-color: <?php
                            $query = $db->getRow('SELECT InterfaceColor FROM interfaceData WHERE interfaceDataID=?', [1]);
                            echo $query->InterfaceColor;
                            ?>;
        }

        /* home start */
        .home {
            min-height: 100vh;
            background: url(images/interface-images/interface-photo.png) no-repeat;
            background-size: cover;
            background-position: center;
            margin-top: -14.5rem;
            display: flex;
            align-items: center;
        }

        .home .content {
            max-width: 60rem;
        }

        .home .content h3 {
            font-size: 6rem;
            color: #fff;
        }

        .home .content p {
            font-size: 2rem;
            font-weight: 300;
            line-height: 1.8;
            padding: 1rem 0;
            color: #ccc;
        }

        /* home end */
    </style>
</head>

<body>
    <!-- header start -->
    <header class="header">
        <a href="" class="logo">
            <img src="images/interface-images/interface-logo.png" alt="logo" />
        </a>
        <nav class="navbar">
        </nav>
        <div class="buttons">
            <button name="siparis" id="cart-btn">
                <i class="fas fa-shopping-cart shop-sepet">
                    <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item"></span>
                </i>
            </button>
            <button id="menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>
    <!-- header end -->

    <!-- home start -->
    <section class="home">
        <div class="content">
            <h3>404 Aradığın sayfayı bulamadık <span style="font-size: 8rem;">☠️</span></h3>
            <a style="background-color: red;" href="javascript:void(0)" class="btn">Qr Kodu Tekrar Okut</a>
        </div>
    </section>
    <!-- home end -->
    <!-- footer start -->
    <section class="footer">
        <!-- <div class="search">
  <input type="text" class="search-input" placeholder="search">
  <button class="btn btn-primary">search</button>
  </div> -->
        <div class="share">
            <a href="<?php $query = $db->getRow('SELECT FacebookURL FROM interfaceData WHERE interfaceDataID=?', [1]);
                        echo $query->FacebookURL; ?>" class="fab fa-facebook">
            </a>
            <a href="<?php $query = $db->getRow('SELECT TwitterURL FROM interfaceData WHERE interfaceDataID=?', [1]);
                        echo $query->TwitterURL; ?>" class="fab fa-twitter">
            </a>
            <a href="<?php $query = $db->getRow('SELECT InstagramURL FROM interfaceData WHERE interfaceDataID=?', [1]);
                        echo $query->InstagramURL; ?>" class="fab fa-instagram">
            </a>
        </div>
        <div class="credit">created by <span>Özgür Vurgun</span> | all rights reserved</div>
    </section>
    <!-- footer end -->

    <!--my js library start-->
    <!--my js library end-->
    <!--bootstrap js start-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script> -->
    <!--bootstrap js end-->
</body>

</html>