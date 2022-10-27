<?php
if ($_SERVER['REQUEST_URI'] === "/dejavu_hookah/index.php") { ?>
    <!DOCTYPE html>
    <html lang="tr">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="logo-images/icons/smoking-solid.svg" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--bootstrap css start-->
        <!--bootstrap css end-->
        <link rel="stylesheet" href="styles/style.css" />
        <title>Dejavu Hookah</title>
    </head>

    <body>
        <!-- header start -->
        <header class="header">
            <a href="index.php" class="logo">
                <img src="logo-images/dejavu-fococlipping-standard.png" alt="logo" />
            </a>
            <nav class="navbar">
                <a href="index.php">Gruplar</a>
                <a href="pages/contact.php">İletişim</a>
            </nav>
            <div class="buttons">
                <button id="cart-btn">
                    <i class="fas fa-shopping-cart shop-sepet">
                        <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item"></span>
                    </i>
                </button>
                <button id="menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <?php require "pages/globalvalue.php";
            ?>
            <div id="shop-kapsayici" class="cart-items-container">
                <?php require "pages/container.php";
                ?>
                <div class="cart-item">
                    <img src="images/TL-simgesi.png" alt="menu">
                    <div class="content">
                        <h3>TOPLAM</h3>
                        <div class="total"><span id="total">0</span>₺</div>
                    </div>
                </div>
                <!-- message -->
                <section class="contact" id="iletisim">
                    <h1 class="heading"><span></span></h1>
                    <div class="row">
                        <!-- <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12509.690116774513!2d27.174708999999996!3d38.385478400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b962008df5f553%3A0x43d9912a7a1c582a!2zQnVjYSwgRHVtbHVwxLFuYXIsIDM1NDAwIEJ1Y2EgT3NiL0J1Y2EvxLB6bWly!5e0!3m2!1str!2str!4v1665444363002!5m2!1str!2str"
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe> -->
                        <form>
                            <h3>Notunuz</h3>
                            <div class="inputBox">
                                <i class="fa-solid fa-pencil"></i>
                                <textarea style="background-color:#0e0e0e;color:#fff;" class="cart-message" name="" rows="5" placeholder="" id=""></textarea>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- message -->
                <button id="order" class="btn">siparişi Ver</button>
            </div>
        </header>
        <!-- header end -->
    <?php } else if ($_SERVER['REQUEST_URI'] == "/dejavu_hookah/pages/nakhla.php") { ?>
        <!DOCTYPE html>
        <html lang="tr">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="icon" href="../logo-images/icons/smoking-solid.svg" type="image/x-icon" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <!--bootstrap css start-->
            <!--bootstrap css end-->
            <link rel="stylesheet" href="../styles/style.css" />
            <title>Dejavu Hookah</title>
        </head>

        <body>
            <!-- header start -->
            <header class="header">
                <a href="../index.php" class="logo">
                    <img src="../logo-images/dejavu-fococlipping-standard.png" alt="logo" />
                </a>
                <nav class="navbar">
                    <a href="../index.php">Gruplar</a>
                    <a href="contact.php">İletişim</a>
                </nav>
                <div class="buttons">
                    <button id="cart-btn">
                        <i class="fas fa-shopping-cart shop-sepet">
                            <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item item-count"></span>
                        </i>
                    </button>
                    <button id="menu-btn">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <!-- GLOBAL VALUES START -->
                <!-- script.js dosyam da her saufadan ayrı ayrı çektiğim id değerleri ve onclik işlemleri bulunuyor. dosyalar arası gezerken değerler ve bulunamadığından hata alıyordum -->
                <!-- bu yüzden display none ile gizleyerek ihtiyacım olan değerleri her sayfaya ekledim. (bu böyle olmaz bu tarz verileri bir yerde depo etmelisin) -->
                <section style="display: none;" class="menu" id="menu">
                    <!--ALFAKHER VALUES START-->
                    <div class="price"><span id="alfakher-uzum-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="alfakher-uzum-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="alfakher-kavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="alfakher-kavun-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="alfakher-ciftelma-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="alfakher-ciftelma-add" class="btn">sepete ekle</button>
                    <!--ALFAKHER VALUES END-->

                    <!--ADALYA VALUES START-->
                    <div class="price"><span id="adalya-pln-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="adalya-pln-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="adalya-baku-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="adalya-baku-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="adalya-lady-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="adalya-lady-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="adalya-lovesixsix-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="adalya-lovesixsix-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="adalya-merlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="adalya-merlin-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="adalya-berlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="adalya-berlin-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="adalya-moskow-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="adalya-moskow-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="adalya-icebonbon-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="adalya-icebonbon-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="adalya-izmirromantik-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button type="button" id="adalya-izmirromantik-add" class="btn">sepete ekle</button>
                    <!--ADALYA VALUES END-->

                    <!--BESTCOUPLE VALUES START-->
                    <div class="price"><span id="bestcouple-uzumnane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button id="bestcouple-uzumnane-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="bestcouple-uzumvisne-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button id="bestcouple-uzumvisne-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="bestcouple-uzumyaban-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button id="bestcouple-uzumyaban-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="bestcouple-elmanane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button id="bestcouple-elmanane-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="bestcouple-karpuzcilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button id="bestcouple-karpuzcilek-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="bestcouple-limoncilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button id="bestcouple-limoncilek-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="bestcouple-seftalikavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button id="bestcouple-seftalikavun-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="bestcouple-vanilyakaramel-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button id="bestcouple-vanilyakaramel-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="bestcouple-bluemistbogurtlen-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                    <button id="bestcouple-bluemistbogurtlen-add" class="btn">sepete ekle</button>
                    <!--BESTCOUPLE VALUES END-->

                    <!--TRUEPASSION VALUES START-->
                    <div class="price"><span id="truepassion-cindrella-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                    <button type="button" id="truepassion-cindrella-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="truepassion-articline-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                    <button type="button" id="truepassion-articline-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="truepassion-pineapple-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                    <button type="button" id="truepassion-pineapple-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="truepassion-holopeach-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                    <button type="button" id="truepassion-holopeach-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="truepassion-casablanca-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                    <button type="button" id="truepassion-casablanca-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="truepassion-okolommento-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                    <button type="button" id="truepassion-okolommento-add" class="btn">sepete ekle</button>
                    <!--TRUEPASSION VALUES END-->

                    <!--DAIM VALUES START-->
                    <div class="price"><span id="daim-dejavu-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                    <button type="button" id="daim-dejavu-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="daim-dondurma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                    <button type="button" id="daim-dondurma-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="daim-tatlicadi-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                    <button type="button" id="daim-tatlicadi-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="daim-yesilelma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                    <button type="button" id="daim-yesilelma-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="daim-limonbuz-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                    <button type="button" id="daim-limonbuz-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="daim-sakiznane-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                    <button type="button" id="daim-sakiznane-add" class="btn">sepete ekle</button>
                    <!--DAIM VALUES END-->

                    <!--FUMARI VALUES START-->
                    <div class="price"><span id="fumari-gummibear-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                    <button type="button" id="fumari-gummibear-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="fumari-mojitomojo-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                    <button type="button" id="fumari-mojitomojo-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="fumari-mochaccino-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                    <button type="button" id="fumari-mochaccino-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="fumari-icecream-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                    <button type="button" id="fumari-icecream-add" class="btn">sepete ekle</button>

                    <div class="price"><span id="fumari-surprise-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                    <button type="button" id="fumari-surprise-add" class="btn">sepete ekle</button>
                    <!--FUMARI VALUES END-->
                </section>
                <!-- GLOBAL VALUES END -->

                <div id="shop-kapsayici" class="cart-items-container">
                    <?php require "container.php";
                    ?>
                    <div class="cart-item">
                        <img src="../images/TL-simgesi.png" alt="menu">
                        <div class="content">
                            <h3>TOPLAM</h3>
                            <div class="total"><span id="total">0</span>₺</div>
                        </div>
                    </div>
                    <!-- message -->
                    <section class="contact" id="iletisim">
                        <h1 class="heading"><span></span></h1>
                        <div class="row">
                            <!-- <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12509.690116774513!2d27.174708999999996!3d38.385478400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b962008df5f553%3A0x43d9912a7a1c582a!2zQnVjYSwgRHVtbHVwxLFuYXIsIDM1NDAwIEJ1Y2EgT3NiL0J1Y2EvxLB6bWly!5e0!3m2!1str!2str!4v1665444363002!5m2!1str!2str"
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe> -->
                            <form>
                                <h3>Notunuz</h3>
                                <div class="inputBox">
                                    <i class="fa-solid fa-pencil"></i>
                                    <textarea style="background-color: #0e0e0e;color:#fff;font-size:1.7rem;" class="cart-message" name="" rows="5" placeholder="" id=""></textarea>
                                </div>
                            </form>
                        </div>
                    </section>
                    <!-- message -->
                    <button id="order" class="btn">siparişi Ver</button>
                </div>
            </header>
            <!-- header end -->
        <?php } else if ($_SERVER['REQUEST_URI'] == "/dejavu_hookah/pages/alfakher.php") { ?>
            <!DOCTYPE html>
            <html lang="tr">

            <head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link rel="icon" href="../logo-images/icons/smoking-solid.svg" type="image/x-icon" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <!--bootstrap css start-->
                <!--bootstrap css end-->
                <link rel="stylesheet" href="../styles/style.css" />
                <title>Dejavu Hookah</title>
            </head>

            <body>
                <!-- header start -->
                <header class="header">
                    <a href="../index.php" class="logo">
                        <img src="../logo-images/dejavu-fococlipping-standard.png" alt="logo" />
                    </a>
                    <nav class="navbar">
                        <a href="../index.php">Gruplar</a>
                        <a href="contact.php">İletişim</a>
                    </nav>
                    <div class="buttons">
                        <button id="cart-btn">
                            <i class="fas fa-shopping-cart shop-sepet">
                                <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item"></span>
                            </i>
                        </button>
                        <button id="menu-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>


                    <!-- GLOBAL VALUES START -->
                    <!-- script.js dosyam da her saufadan ayrı ayrı çektiğim id değerleri ve onclik işlemleri bulunuyor. dosyalar arası gezerken değerler ve bulunamadığından hata alıyordum -->
                    <!-- bu yüzden display none ile gizleyerek ihtiyacım olan değerleri her sayfaya ekledim. (bu böyle olmaz bu tarz verileri bir yerde depo etmelisin) -->
                    <section style="display: none;" class="menu" id="menu">
                        <!--NAKHLA VALUES START-->
                        <div class="price"><span id="visne_fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                        <button type="button" id="visne_add" class="btn">sepete ekle</button>

                        <div class="price"><span id="seftali_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                        <button type="button" id="seftali_add" class="btn">sepete ekle</button>

                        <div class="price"><span id="cappucino_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                        <button type="button" id="cappucino_add" class="btn">sepete ekle</button>
                        <!--NAKHLA VALUES END-->

                        <!--ADALYA VALUES START-->
                        <div class="price"><span id="adalya-pln-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button type="button" id="adalya-pln-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="adalya-baku-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button type="button" id="adalya-baku-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="adalya-lady-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button type="button" id="adalya-lady-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="adalya-lovesixsix-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button type="button" id="adalya-lovesixsix-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="adalya-merlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button type="button" id="adalya-merlin-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="adalya-berlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button type="button" id="adalya-berlin-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="adalya-moskow-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button type="button" id="adalya-moskow-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="adalya-icebonbon-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button type="button" id="adalya-icebonbon-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="adalya-izmirromantik-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button type="button" id="adalya-izmirromantik-add" class="btn">sepete ekle</button>
                        <!--ADALYA VALUES END-->

                        <!--BESTCOUPLE VALUES START-->
                        <div class="price"><span id="bestcouple-uzumnane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button id="bestcouple-uzumnane-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="bestcouple-uzumvisne-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button id="bestcouple-uzumvisne-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="bestcouple-uzumyaban-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button id="bestcouple-uzumyaban-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="bestcouple-elmanane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button id="bestcouple-elmanane-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="bestcouple-karpuzcilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button id="bestcouple-karpuzcilek-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="bestcouple-limoncilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button id="bestcouple-limoncilek-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="bestcouple-seftalikavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button id="bestcouple-seftalikavun-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="bestcouple-vanilyakaramel-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button id="bestcouple-vanilyakaramel-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="bestcouple-bluemistbogurtlen-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                        <button id="bestcouple-bluemistbogurtlen-add" class="btn">sepete ekle</button>
                        <!--BESTCOUPLE VALUES END-->

                        <!--TRUEPASSION VALUES START-->
                        <div class="price"><span id="truepassion-cindrella-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                        <button type="button" id="truepassion-cindrella-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="truepassion-articline-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                        <button type="button" id="truepassion-articline-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="truepassion-pineapple-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                        <button type="button" id="truepassion-pineapple-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="truepassion-holopeach-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                        <button type="button" id="truepassion-holopeach-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="truepassion-casablanca-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                        <button type="button" id="truepassion-casablanca-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="truepassion-okolommento-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                        <button type="button" id="truepassion-okolommento-add" class="btn">sepete ekle</button>
                        <!--TRUEPASSION VALUES END-->

                        <!--DAIM VALUES START-->
                        <div class="price"><span id="daim-dejavu-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                        <button type="button" id="daim-dejavu-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="daim-dondurma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                        <button type="button" id="daim-dondurma-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="daim-tatlicadi-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                        <button type="button" id="daim-tatlicadi-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="daim-yesilelma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                        <button type="button" id="daim-yesilelma-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="daim-limonbuz-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                        <button type="button" id="daim-limonbuz-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="daim-sakiznane-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                        <button type="button" id="daim-sakiznane-add" class="btn">sepete ekle</button>
                        <!--DAIM VALUES END-->

                        <!--FUMARI VALUES START-->
                        <div class="price"><span id="fumari-gummibear-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                        <button type="button" id="fumari-gummibear-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="fumari-mojitomojo-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                        <button type="button" id="fumari-mojitomojo-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="fumari-mochaccino-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                        <button type="button" id="fumari-mochaccino-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="fumari-icecream-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                        <button type="button" id="fumari-icecream-add" class="btn">sepete ekle</button>

                        <div class="price"><span id="fumari-surprise-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                        <button type="button" id="fumari-surprise-add" class="btn">sepete ekle</button>
                        <!--FUMARI VALUES END-->
                    </section>
                    <!-- GLOBAL VALUES END -->


                    <div id="shop-kapsayici" class="cart-items-container">
                        <?php require "container.php"; ?>
                        <div class="cart-item">
                            <img src="../images/TL-simgesi.png" alt="menu">
                            <div class="content">
                                <h3>TOPLAM</h3>
                                <div class="total"><span id="total">0</span>₺</div>
                            </div>
                        </div>
                        <!-- message -->
                        <section class="contact" id="iletisim">
                            <h1 class="heading"><span></span></h1>
                            <div class="row">
                                <!-- <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12509.690116774513!2d27.174708999999996!3d38.385478400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b962008df5f553%3A0x43d9912a7a1c582a!2zQnVjYSwgRHVtbHVwxLFuYXIsIDM1NDAwIEJ1Y2EgT3NiL0J1Y2EvxLB6bWly!5e0!3m2!1str!2str!4v1665444363002!5m2!1str!2str"
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe> -->
                                <form>
                                    <h3>Notunuz</h3>
                                    <div class="inputBox">
                                        <i class="fa-solid fa-pencil"></i>
                                        <textarea style="background-color: #0e0e0e;color:#fff;font-size:1.7rem;" class="cart-message" name="" rows="5" placeholder="" id=""></textarea>
                                    </div>
                                </form>
                            </div>
                        </section>
                        <!-- message -->
                        <button id="order" class="btn">siparişi Ver</button>
                    </div>
                </header>
                <!-- header end -->
            <?php } else if ($_SERVER['REQUEST_URI'] == "/dejavu_hookah/pages/adalya.php") { ?>
                <!DOCTYPE html>
                <html lang="tr">

                <head>
                    <meta charset="UTF-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <link rel="icon" href="../logo-images/icons/smoking-solid.svg" type="image/x-icon" />
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                    <!--bootstrap css start-->
                    <!--bootstrap css end-->
                    <link rel="stylesheet" href="../styles/style.css" />
                    <title>Dejavu Hookah</title>
                </head>

                <body>
                    <!-- header start -->
                    <header class="header">
                        <a href="../index.php" class="logo">
                            <img src="../logo-images/dejavu-fococlipping-standard.png" alt="logo" />
                        </a>
                        <nav class="navbar">
                            <a href="../index.php">Gruplar</a>
                            <a href="contact.php">İletişim</a>
                        </nav>
                        <div class="buttons">
                            <button id="cart-btn">
                                <i class="fas fa-shopping-cart shop-sepet">
                                    <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item"></span>
                                </i>
                            </button>
                            <button id="menu-btn">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        <!-- GLOBAL VALUES START -->
                        <!-- script.js dosyam da her saufadan ayrı ayrı çektiğim id değerleri ve onclik işlemleri bulunuyor. dosyalar arası gezerken değerler ve bulunamadığından hata alıyordum -->
                        <!-- bu yüzden display none ile gizleyerek ihtiyacım olan değerleri her sayfaya ekledim. (bu böyle olmaz bu tarz verileri bir yerde depo etmelisin) -->
                        <section style="display: none;" class="menu" id="menu">
                            <!--NAKHLA VALUES START-->
                            <div class="price"><span id="visne_fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                            <button type="button" id="visne_add" class="btn">sepete ekle</button>

                            <div class="price"><span id="seftali_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                            <button type="button" id="seftali_add" class="btn">sepete ekle</button>

                            <div class="price"><span id="cappucino_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                            <button type="button" id="cappucino_add" class="btn">sepete ekle</button>
                            <!--NAKHLA VALUES END-->

                            <!--ALFAKHER VALUES START-->
                            <div class="price"><span id="alfakher-uzum-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button type="button" id="alfakher-uzum-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="alfakher-kavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button type="button" id="alfakher-kavun-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="alfakher-ciftelma-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button type="button" id="alfakher-ciftelma-add" class="btn">sepete ekle</button>
                            <!--ALFAKHER VALUES END-->

                            <!--BESTCOUPLE VALUES START-->
                            <div class="price"><span id="bestcouple-uzumnane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button id="bestcouple-uzumnane-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="bestcouple-uzumvisne-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button id="bestcouple-uzumvisne-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="bestcouple-uzumyaban-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button id="bestcouple-uzumyaban-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="bestcouple-elmanane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button id="bestcouple-elmanane-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="bestcouple-karpuzcilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button id="bestcouple-karpuzcilek-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="bestcouple-limoncilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button id="bestcouple-limoncilek-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="bestcouple-seftalikavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button id="bestcouple-seftalikavun-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="bestcouple-vanilyakaramel-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button id="bestcouple-vanilyakaramel-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="bestcouple-bluemistbogurtlen-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                            <button id="bestcouple-bluemistbogurtlen-add" class="btn">sepete ekle</button>
                            <!--BESTCOUPLE VALUES END-->

                            <!--TRUEPASSION VALUES START-->
                            <div class="price"><span id="truepassion-cindrella-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                            <button type="button" id="truepassion-cindrella-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="truepassion-articline-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                            <button type="button" id="truepassion-articline-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="truepassion-pineapple-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                            <button type="button" id="truepassion-pineapple-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="truepassion-holopeach-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                            <button type="button" id="truepassion-holopeach-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="truepassion-casablanca-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                            <button type="button" id="truepassion-casablanca-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="truepassion-okolommento-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                            <button type="button" id="truepassion-okolommento-add" class="btn">sepete ekle</button>
                            <!--TRUEPASSION VALUES END-->

                            <!--DAIM VALUES START-->
                            <div class="price"><span id="daim-dejavu-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                            <button type="button" id="daim-dejavu-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="daim-dondurma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                            <button type="button" id="daim-dondurma-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="daim-tatlicadi-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                            <button type="button" id="daim-tatlicadi-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="daim-yesilelma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                            <button type="button" id="daim-yesilelma-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="daim-limonbuz-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                            <button type="button" id="daim-limonbuz-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="daim-sakiznane-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                            <button type="button" id="daim-sakiznane-add" class="btn">sepete ekle</button>
                            <!--DAIM VALUES END-->

                            <!--FUMARI VALUES START-->
                            <div class="price"><span id="fumari-gummibear-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                            <button type="button" id="fumari-gummibear-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="fumari-mojitomojo-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                            <button type="button" id="fumari-mojitomojo-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="fumari-mochaccino-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                            <button type="button" id="fumari-mochaccino-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="fumari-icecream-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                            <button type="button" id="fumari-icecream-add" class="btn">sepete ekle</button>

                            <div class="price"><span id="fumari-surprise-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                            <button type="button" id="fumari-surprise-add" class="btn">sepete ekle</button>
                            <!--FUMARI VALUES END-->
                        </section>
                        <!-- GLOBAL VALUES END -->



                        <div id="shop-kapsayici" class="cart-items-container">
                            <?php require "container.php"; ?>
                            <div class="cart-item">
                                <img src="../images/TL-simgesi.png" alt="menu">
                                <div class="content">
                                    <h3>TOPLAM</h3>
                                    <div class="total"><span id="total">0</span>₺</div>
                                </div>
                            </div>
                            <!-- message -->
                            <section class="contact" id="iletisim">
                                <h1 class="heading"><span></span></h1>
                                <div class="row">
                                    <!-- <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12509.690116774513!2d27.174708999999996!3d38.385478400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b962008df5f553%3A0x43d9912a7a1c582a!2zQnVjYSwgRHVtbHVwxLFuYXIsIDM1NDAwIEJ1Y2EgT3NiL0J1Y2EvxLB6bWly!5e0!3m2!1str!2str!4v1665444363002!5m2!1str!2str"
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe> -->
                                    <form>
                                        <h3>Notunuz</h3>
                                        <div class="inputBox">
                                            <i class="fa-solid fa-pencil"></i>
                                            <textarea style="background-color: #0e0e0e;color:#fff;font-size:1.7rem;" class="cart-message" name="" rows="5" placeholder="" id=""></textarea>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            <!-- message -->
                            <button id="order" class="btn">siparişi Ver</button>
                        </div>
                    </header>
                    <!-- header end -->


                <?php   } else if ($_SERVER['REQUEST_URI'] == "/dejavu_hookah/pages/bestcouple.php") { ?>
                    <!DOCTYPE html>
                    <html lang="tr">

                    <head>
                        <meta charset="UTF-8" />
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                        <link rel="icon" href="../logo-images/icons/smoking-solid.svg" type="image/x-icon" />
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <!--bootstrap css start-->
                        <!--bootstrap css end-->
                        <link rel="stylesheet" href="../styles/style.css" />
                        <title>Dejavu Hookah</title>
                    </head>

                    <body>
                        <!-- header start -->
                        <header class="header">
                            <a href="../index.php" class="logo">
                                <img src="../logo-images/dejavu-fococlipping-standard.png" alt="logo" />
                            </a>
                            <nav class="navbar">
                                <a href="../index.php">Gruplar</a>
                                <a href="contact.php">İletişim</a>
                            </nav>
                            <div class="buttons">
                                <button id="cart-btn">
                                    <i class="fas fa-shopping-cart shop-sepet">
                                        <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item"></span>
                                    </i>
                                </button>
                                <button id="menu-btn">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>

                            <!-- GLOBAL VALUES START -->
                            <!-- script.js dosyam da her saufadan ayrı ayrı çektiğim id değerleri ve onclik işlemleri bulunuyor. dosyalar arası gezerken değerler ve bulunamadığından hata alıyordum -->
                            <!-- bu yüzden display none ile gizleyerek ihtiyacım olan değerleri her sayfaya ekledim. (bu böyle olmaz bu tarz verileri bir yerde depo etmelisin) -->
                            <section style="display: none;" class="menu" id="menu">
                                <!--NAKHLA VALUES START-->
                                <div class="price"><span id="visne_fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                <button type="button" id="visne_add" class="btn">sepete ekle</button>

                                <div class="price"><span id="seftali_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                                <button type="button" id="seftali_add" class="btn">sepete ekle</button>

                                <div class="price"><span id="cappucino_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                                <button type="button" id="cappucino_add" class="btn">sepete ekle</button>
                                <!--NAKHLA VALUES END-->

                                <!--ALFAKHER VALUES START-->
                                <div class="price"><span id="alfakher-uzum-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="alfakher-uzum-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="alfakher-kavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="alfakher-kavun-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="alfakher-ciftelma-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="alfakher-ciftelma-add" class="btn">sepete ekle</button>
                                <!--ALFAKHER VALUES END-->

                                <!--ADALYA VALUES START-->
                                <div class="price"><span id="adalya-pln-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="adalya-pln-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="adalya-baku-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="adalya-baku-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="adalya-lady-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="adalya-lady-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="adalya-lovesixsix-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="adalya-lovesixsix-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="adalya-merlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="adalya-merlin-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="adalya-berlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="adalya-berlin-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="adalya-moskow-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="adalya-moskow-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="adalya-icebonbon-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="adalya-icebonbon-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="adalya-izmirromantik-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                <button type="button" id="adalya-izmirromantik-add" class="btn">sepete ekle</button>
                                <!--ADALYA VALUES END-->

                                <!--TRUEPASSION VALUES START-->
                                <div class="price"><span id="truepassion-cindrella-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                <button type="button" id="truepassion-cindrella-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="truepassion-articline-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                <button type="button" id="truepassion-articline-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="truepassion-pineapple-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                <button type="button" id="truepassion-pineapple-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="truepassion-holopeach-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                <button type="button" id="truepassion-holopeach-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="truepassion-casablanca-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                <button type="button" id="truepassion-casablanca-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="truepassion-okolommento-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                <button type="button" id="truepassion-okolommento-add" class="btn">sepete ekle</button>
                                <!--TRUEPASSION VALUES END-->

                                <!--DAIM VALUES START-->
                                <div class="price"><span id="daim-dejavu-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                <button type="button" id="daim-dejavu-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="daim-dondurma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                <button type="button" id="daim-dondurma-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="daim-tatlicadi-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                <button type="button" id="daim-tatlicadi-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="daim-yesilelma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                <button type="button" id="daim-yesilelma-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="daim-limonbuz-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                <button type="button" id="daim-limonbuz-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="daim-sakiznane-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                <button type="button" id="daim-sakiznane-add" class="btn">sepete ekle</button>
                                <!--DAIM VALUES END-->

                                <!--FUMARI VALUES START-->
                                <div class="price"><span id="fumari-gummibear-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                <button type="button" id="fumari-gummibear-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="fumari-mojitomojo-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                <button type="button" id="fumari-mojitomojo-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="fumari-mochaccino-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                <button type="button" id="fumari-mochaccino-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="fumari-icecream-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                <button type="button" id="fumari-icecream-add" class="btn">sepete ekle</button>

                                <div class="price"><span id="fumari-surprise-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                <button type="button" id="fumari-surprise-add" class="btn">sepete ekle</button>
                                <!--FUMARI VALUES END-->
                            </section>
                            <!-- GLOBAL VALUES END -->


                            <div id="shop-kapsayici" class="cart-items-container">
                                <?php require "container.php"; ?>
                                <div class="cart-item">
                                    <img src="../images/TL-simgesi.png" alt="menu">
                                    <div class="content">
                                        <h3>TOPLAM</h3>
                                        <div class="total"><span id="total">0</span>₺</div>
                                    </div>
                                </div>
                                <!-- message -->
                                <section class="contact" id="iletisim">
                                    <h1 class="heading"><span></span></h1>
                                    <div class="row">
                                        <!-- <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12509.690116774513!2d27.174708999999996!3d38.385478400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b962008df5f553%3A0x43d9912a7a1c582a!2zQnVjYSwgRHVtbHVwxLFuYXIsIDM1NDAwIEJ1Y2EgT3NiL0J1Y2EvxLB6bWly!5e0!3m2!1str!2str!4v1665444363002!5m2!1str!2str"
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe> -->
                                        <form>
                                            <h3>Notunuz</h3>
                                            <div class="inputBox">
                                                <i class="fa-solid fa-pencil"></i>
                                                <textarea style="background-color: #0e0e0e;color:#fff;font-size:1.7rem;" class="cart-message" name="" rows="5" placeholder="" id=""></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                                <!-- message -->
                                <button id="order" class="btn">siparişi Ver</button>
                            </div>
                        </header>
                        <!-- header end -->
                    <?php    } else if ($_SERVER['REQUEST_URI'] == "/dejavu_hookah/pages/truepassion.php") { ?>
                        <!DOCTYPE html>
                        <html lang="tr">

                        <head>
                            <meta charset="UTF-8" />
                            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                            <link rel="icon" href="../logo-images/icons/smoking-solid.svg" type="image/x-icon" />
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                            <!--bootstrap css start-->
                            <!--bootstrap css end-->
                            <link rel="stylesheet" href="../styles/style.css" />
                            <title>Dejavu Hookah</title>
                        </head>

                        <body>
                            <!-- header start -->
                            <header class="header">
                                <a href="../index.php" class="logo">
                                    <img src="../logo-images/dejavu-fococlipping-standard.png" alt="logo" />
                                </a>
                                <nav class="navbar">
                                    <a href="../index.php">Gruplar</a>
                                    <a href="contact.php">İletişim</a>
                                </nav>
                                <div class="buttons">
                                    <button id="cart-btn">
                                        <i class="fas fa-shopping-cart shop-sepet">
                                            <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item"></span>
                                        </i>
                                    </button>
                                    <button id="menu-btn">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </div>

                                <!-- GLOBAL VALUES START -->
                                <!-- script.js dosyam da her saufadan ayrı ayrı çektiğim id değerleri ve onclik işlemleri bulunuyor. dosyalar arası gezerken değerler ve bulunamadığından hata alıyordum -->
                                <!-- bu yüzden display none ile gizleyerek ihtiyacım olan değerleri her sayfaya ekledim. (bu böyle olmaz bu tarz verileri bir yerde depo etmelisin) -->
                                <section style="display: none;" class="menu" id="menu">
                                    <!--NAKHLA VALUES START-->
                                    <div class="price"><span id="visne_fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                    <button type="button" id="visne_add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="seftali_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                                    <button type="button" id="seftali_add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="cappucino_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                                    <button type="button" id="cappucino_add" class="btn">sepete ekle</button>
                                    <!--NAKHLA VALUES END-->

                                    <!--ALFAKHER VALUES START-->
                                    <div class="price"><span id="alfakher-uzum-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="alfakher-uzum-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="alfakher-kavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="alfakher-kavun-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="alfakher-ciftelma-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="alfakher-ciftelma-add" class="btn">sepete ekle</button>
                                    <!--ALFAKHER VALUES END-->

                                    <!--ADALYA VALUES START-->
                                    <div class="price"><span id="adalya-pln-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="adalya-pln-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="adalya-baku-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="adalya-baku-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="adalya-lady-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="adalya-lady-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="adalya-lovesixsix-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="adalya-lovesixsix-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="adalya-merlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="adalya-merlin-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="adalya-berlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="adalya-berlin-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="adalya-moskow-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="adalya-moskow-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="adalya-icebonbon-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="adalya-icebonbon-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="adalya-izmirromantik-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button type="button" id="adalya-izmirromantik-add" class="btn">sepete ekle</button>
                                    <!--ADALYA VALUES END-->

                                    <!--BESTCOUPLE VALUES START-->
                                    <div class="price"><span id="bestcouple-uzumnane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button id="bestcouple-uzumnane-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="bestcouple-uzumvisne-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button id="bestcouple-uzumvisne-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="bestcouple-uzumyaban-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button id="bestcouple-uzumyaban-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="bestcouple-elmanane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button id="bestcouple-elmanane-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="bestcouple-karpuzcilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button id="bestcouple-karpuzcilek-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="bestcouple-limoncilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button id="bestcouple-limoncilek-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="bestcouple-seftalikavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button id="bestcouple-seftalikavun-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="bestcouple-vanilyakaramel-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button id="bestcouple-vanilyakaramel-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="bestcouple-bluemistbogurtlen-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                    <button id="bestcouple-bluemistbogurtlen-add" class="btn">sepete ekle</button>
                                    <!--BESTCOUPLE VALUES END-->

                                    <!--DAIM VALUES START-->
                                    <div class="price"><span id="daim-dejavu-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                    <button type="button" id="daim-dejavu-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="daim-dondurma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                    <button type="button" id="daim-dondurma-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="daim-tatlicadi-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                    <button type="button" id="daim-tatlicadi-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="daim-yesilelma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                    <button type="button" id="daim-yesilelma-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="daim-limonbuz-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                    <button type="button" id="daim-limonbuz-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="daim-sakiznane-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                    <button type="button" id="daim-sakiznane-add" class="btn">sepete ekle</button>
                                    <!--DAIM VALUES END-->

                                    <!--FUMARI VALUES START-->
                                    <div class="price"><span id="fumari-gummibear-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                    <button type="button" id="fumari-gummibear-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="fumari-mojitomojo-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                    <button type="button" id="fumari-mojitomojo-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="fumari-mochaccino-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                    <button type="button" id="fumari-mochaccino-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="fumari-icecream-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                    <button type="button" id="fumari-icecream-add" class="btn">sepete ekle</button>

                                    <div class="price"><span id="fumari-surprise-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                    <button type="button" id="fumari-surprise-add" class="btn">sepete ekle</button>
                                    <!--FUMARI VALUES END-->
                                </section>
                                <!-- GLOBAL VALUES END -->


                                <div id="shop-kapsayici" class="cart-items-container">
                                    <?php require "container.php"; ?>
                                    <div class="cart-item">
                                        <img src="../images/TL-simgesi.png" alt="menu">
                                        <div class="content">
                                            <h3>TOPLAM</h3>
                                            <div class="total"><span id="total">0</span>₺</div>
                                        </div>
                                    </div>
                                    <!-- message -->
                                    <section class="contact" id="iletisim">
                                        <h1 class="heading"><span></span></h1>
                                        <div class="row">
                                            <!-- <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12509.690116774513!2d27.174708999999996!3d38.385478400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b962008df5f553%3A0x43d9912a7a1c582a!2zQnVjYSwgRHVtbHVwxLFuYXIsIDM1NDAwIEJ1Y2EgT3NiL0J1Y2EvxLB6bWly!5e0!3m2!1str!2str!4v1665444363002!5m2!1str!2str"
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe> -->
                                            <form>
                                                <h3>Notunuz</h3>
                                                <div class="inputBox">
                                                    <i class="fa-solid fa-pencil"></i>
                                                    <textarea style="background-color: #0e0e0e;color:#fff;font-size:1.7rem;" class="cart-message" name="" rows="5" placeholder="" id=""></textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </section>
                                    <!-- message -->
                                    <button id="order" class="btn">siparişi Ver</button>
                                </div>
                            </header>
                            <!-- header end -->
                        <?php  } else if ($_SERVER['REQUEST_URI'] == "/dejavu_hookah/pages/daim.php") { ?>
                            <!DOCTYPE html>
                            <html lang="tr">

                            <head>
                                <meta charset="UTF-8" />
                                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                <link rel="icon" href="../logo-images/icons/smoking-solid.svg" type="image/x-icon" />
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                                <!--bootstrap css start-->
                                <!--bootstrap css end-->
                                <link rel="stylesheet" href="../styles/style.css" />
                                <title>Dejavu Hookah</title>
                            </head>

                            <body>
                                <!-- header start -->
                                <header class="header">
                                    <a href="../index.php" class="logo">
                                        <img src="../logo-images/dejavu-fococlipping-standard.png" alt="logo" />
                                    </a>
                                    <nav class="navbar">
                                        <a href="../index.php">Gruplar</a>
                                        <a href="contact.php">İletişim</a>
                                    </nav>
                                    <div class="buttons">
                                        <button id="cart-btn">
                                            <i class="fas fa-shopping-cart shop-sepet">
                                                <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item"></span>
                                            </i>
                                        </button>
                                        <button id="menu-btn">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    </div>

                                    <!-- GLOBAL VALUES START -->
                                    <!-- script.js dosyam da her saufadan ayrı ayrı çektiğim id değerleri ve onclik işlemleri bulunuyor. dosyalar arası gezerken değerler ve bulunamadığından hata alıyordum -->
                                    <!-- bu yüzden display none ile gizleyerek ihtiyacım olan değerleri her sayfaya ekledim. (bu böyle olmaz bu tarz verileri bir yerde depo etmelisin) -->
                                    <section style="display: none;" class="menu" id="menu">
                                        <!--NAKHLA VALUES START-->
                                        <div class="price"><span id="visne_fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                        <button type="button" id="visne_add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="seftali_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                                        <button type="button" id="seftali_add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="cappucino_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                                        <button type="button" id="cappucino_add" class="btn">sepete ekle</button>
                                        <!--NAKHLA VALUES END-->

                                        <!--ALFAKHER VALUES START-->
                                        <div class="price"><span id="alfakher-uzum-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="alfakher-uzum-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="alfakher-kavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="alfakher-kavun-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="alfakher-ciftelma-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="alfakher-ciftelma-add" class="btn">sepete ekle</button>
                                        <!--ALFAKHER VALUES END-->

                                        <!--ADALYA VALUES START-->
                                        <div class="price"><span id="adalya-pln-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="adalya-pln-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="adalya-baku-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="adalya-baku-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="adalya-lady-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="adalya-lady-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="adalya-lovesixsix-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="adalya-lovesixsix-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="adalya-merlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="adalya-merlin-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="adalya-berlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="adalya-berlin-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="adalya-moskow-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="adalya-moskow-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="adalya-icebonbon-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="adalya-icebonbon-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="adalya-izmirromantik-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button type="button" id="adalya-izmirromantik-add" class="btn">sepete ekle</button>
                                        <!--ADALYA VALUES END-->

                                        <!--BESTCOUPLE VALUES START-->
                                        <div class="price"><span id="bestcouple-uzumnane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button id="bestcouple-uzumnane-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="bestcouple-uzumvisne-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button id="bestcouple-uzumvisne-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="bestcouple-uzumyaban-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button id="bestcouple-uzumyaban-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="bestcouple-elmanane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button id="bestcouple-elmanane-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="bestcouple-karpuzcilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button id="bestcouple-karpuzcilek-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="bestcouple-limoncilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button id="bestcouple-limoncilek-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="bestcouple-seftalikavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button id="bestcouple-seftalikavun-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="bestcouple-vanilyakaramel-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button id="bestcouple-vanilyakaramel-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="bestcouple-bluemistbogurtlen-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                        <button id="bestcouple-bluemistbogurtlen-add" class="btn">sepete ekle</button>
                                        <!--BESTCOUPLE VALUES END-->

                                        <!--TRUEPASSION VALUES START-->
                                        <div class="price"><span id="truepassion-cindrella-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                        <button type="button" id="truepassion-cindrella-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="truepassion-articline-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                        <button type="button" id="truepassion-articline-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="truepassion-pineapple-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                        <button type="button" id="truepassion-pineapple-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="truepassion-holopeach-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                        <button type="button" id="truepassion-holopeach-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="truepassion-casablanca-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                        <button type="button" id="truepassion-casablanca-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="truepassion-okolommento-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                        <button type="button" id="truepassion-okolommento-add" class="btn">sepete ekle</button>
                                        <!--TRUEPASSION VALUES END-->

                                        <!--FUMARI VALUES START-->
                                        <div class="price"><span id="fumari-gummibear-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                        <button type="button" id="fumari-gummibear-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="fumari-mojitomojo-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                        <button type="button" id="fumari-mojitomojo-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="fumari-mochaccino-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                        <button type="button" id="fumari-mochaccino-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="fumari-icecream-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                        <button type="button" id="fumari-icecream-add" class="btn">sepete ekle</button>

                                        <div class="price"><span id="fumari-surprise-fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                        <button type="button" id="fumari-surprise-add" class="btn">sepete ekle</button>
                                        <!--FUMARI VALUES END-->
                                    </section>
                                    <!-- GLOBAL VALUES END -->

                                    <div id="shop-kapsayici" class="cart-items-container">
                                        <?php require "container.php"; ?>
                                        <div class="cart-item">
                                            <img src="../images/TL-simgesi.png" alt="menu">
                                            <div class="content">
                                                <h3>TOPLAM</h3>
                                                <div class="total"><span id="total">0</span>₺</div>
                                            </div>
                                        </div>
                                        <!-- message -->
                                        <section class="contact" id="iletisim">
                                            <h1 class="heading"><span></span></h1>
                                            <div class="row">
                                                <!-- <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12509.690116774513!2d27.174708999999996!3d38.385478400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b962008df5f553%3A0x43d9912a7a1c582a!2zQnVjYSwgRHVtbHVwxLFuYXIsIDM1NDAwIEJ1Y2EgT3NiL0J1Y2EvxLB6bWly!5e0!3m2!1str!2str!4v1665444363002!5m2!1str!2str"
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe> -->
                                                <form>
                                                    <h3>Notunuz</h3>
                                                    <div class="inputBox">
                                                        <i class="fa-solid fa-pencil"></i>
                                                        <textarea style="background-color: #0e0e0e;color:#fff;font-size:1.7rem;" class="cart-message" name="" rows="5" placeholder="" id=""></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                        </section>
                                        <!-- message -->
                                        <button id="order" class="btn">siparişi Ver</button>
                                    </div>
                                </header>
                                <!-- header end -->
                            <?php } else if ($_SERVER['REQUEST_URI'] == "/dejavu_hookah/pages/fumari.php") { ?>
                                <!DOCTYPE html>
                                <html lang="tr">

                                <head>
                                    <meta charset="UTF-8" />
                                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                    <link rel="icon" href="../logo-images/icons/smoking-solid.svg" type="image/x-icon" />
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                                    <!--bootstrap css start-->
                                    <!--bootstrap css end-->
                                    <link rel="stylesheet" href="../styles/style.css" />
                                    <title>Dejavu Hookah</title>
                                </head>

                                <body>
                                    <!-- header start -->
                                    <header class="header">
                                        <a href="../index.php" class="logo">
                                            <img src="../logo-images/dejavu-fococlipping-standard.png" alt="logo" />
                                        </a>
                                        <nav class="navbar">
                                            <a href="../index.php">Gruplar</a>
                                            <a href="contact.php">İletişim</a>
                                        </nav>
                                        <div class="buttons">
                                            <button id="cart-btn">
                                                <i class="fas fa-shopping-cart shop-sepet">
                                                    <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item"></span>
                                                </i>
                                            </button>
                                            <button id="menu-btn">
                                                <i class="fas fa-bars"></i>
                                            </button>
                                        </div>

                                        <!-- GLOBAL VALUES START -->
                                        <!-- script.js dosyam da her saufadan ayrı ayrı çektiğim id değerleri ve onclik işlemleri bulunuyor. dosyalar arası gezerken değerler ve bulunamadığından hata alıyordum -->
                                        <!-- bu yüzden display none ile gizleyerek ihtiyacım olan değerleri her sayfaya ekledim. (bu böyle olmaz bu tarz verileri bir yerde depo etmelisin) -->
                                        <section style="display: none;" class="menu" id="menu">
                                            <!--NAKHLA VALUES START-->
                                            <div class="price"><span id="visne_fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
                                            <button type="button" id="visne_add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="seftali_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                                            <button type="button" id="seftali_add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="cappucino_fiyat">110</span>₺&nbsp;<span class="span">179.99₺</span></div>
                                            <button type="button" id="cappucino_add" class="btn">sepete ekle</button>
                                            <!--NAKHLA VALUES END-->

                                            <!--ALFAKHER VALUES START-->
                                            <div class="price"><span id="alfakher-uzum-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="alfakher-uzum-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="alfakher-kavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="alfakher-kavun-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="alfakher-ciftelma-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="alfakher-ciftelma-add" class="btn">sepete ekle</button>
                                            <!--ALFAKHER VALUES END-->

                                            <!--ADALYA VALUES START-->
                                            <div class="price"><span id="adalya-pln-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="adalya-pln-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="adalya-baku-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="adalya-baku-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="adalya-lady-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="adalya-lady-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="adalya-lovesixsix-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="adalya-lovesixsix-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="adalya-merlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="adalya-merlin-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="adalya-berlin-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="adalya-berlin-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="adalya-moskow-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="adalya-moskow-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="adalya-icebonbon-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="adalya-icebonbon-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="adalya-izmirromantik-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button type="button" id="adalya-izmirromantik-add" class="btn">sepete ekle</button>
                                            <!--ADALYA VALUES END-->

                                            <!--BESTCOUPLE VALUES START-->
                                            <div class="price"><span id="bestcouple-uzumnane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button id="bestcouple-uzumnane-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="bestcouple-uzumvisne-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button id="bestcouple-uzumvisne-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="bestcouple-uzumyaban-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button id="bestcouple-uzumyaban-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="bestcouple-elmanane-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button id="bestcouple-elmanane-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="bestcouple-karpuzcilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button id="bestcouple-karpuzcilek-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="bestcouple-limoncilek-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button id="bestcouple-limoncilek-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="bestcouple-seftalikavun-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button id="bestcouple-seftalikavun-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="bestcouple-vanilyakaramel-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button id="bestcouple-vanilyakaramel-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="bestcouple-bluemistbogurtlen-fiyat">100</span>₺&nbsp;<span class="span">169.99₺</span></div>
                                            <button id="bestcouple-bluemistbogurtlen-add" class="btn">sepete ekle</button>
                                            <!--BESTCOUPLE VALUES END-->

                                            <!--TRUEPASSION VALUES START-->
                                            <div class="price"><span id="truepassion-cindrella-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                            <button type="button" id="truepassion-cindrella-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="truepassion-articline-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                            <button type="button" id="truepassion-articline-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="truepassion-pineapple-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                            <button type="button" id="truepassion-pineapple-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="truepassion-holopeach-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                            <button type="button" id="truepassion-holopeach-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="truepassion-casablanca-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                            <button type="button" id="truepassion-casablanca-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="truepassion-okolommento-fiyat">120</span>₺&nbsp;<span class="span">189.99₺</span></div>
                                            <button type="button" id="truepassion-okolommento-add" class="btn">sepete ekle</button>
                                            <!--TRUEPASSION VALUES END-->

                                            <!--DAIM VALUES START-->
                                            <div class="price"><span id="daim-dejavu-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                            <button type="button" id="daim-dejavu-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="daim-dondurma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                            <button type="button" id="daim-dondurma-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="daim-tatlicadi-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                            <button type="button" id="daim-tatlicadi-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="daim-yesilelma-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                            <button type="button" id="daim-yesilelma-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="daim-limonbuz-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                            <button type="button" id="daim-limonbuz-add" class="btn">sepete ekle</button>

                                            <div class="price"><span id="daim-sakiznane-fiyat">100</span>₺&nbsp;<span class="span">159.99₺</span></div>
                                            <button type="button" id="daim-sakiznane-add" class="btn">sepete ekle</button>
                                            <!--DAIM VALUES END-->
                                        </section>
                                        <!-- GLOBAL VALUES END -->


                                        <div id="shop-kapsayici" class="cart-items-container">
                                            <?php require "container.php"; ?>
                                            <div class="cart-item">
                                                <img src="../images/TL-simgesi.png" alt="menu">
                                                <div class="content">
                                                    <h3>TOPLAM</h3>
                                                    <div class="total"><span id="total">0</span>₺</div>
                                                </div>
                                            </div>
                                            <!-- message -->
                                            <section class="contact" id="iletisim">
                                                <h1 class="heading"><span></span></h1>
                                                <div class="row">
                                                    <!-- <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12509.690116774513!2d27.174708999999996!3d38.385478400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b962008df5f553%3A0x43d9912a7a1c582a!2zQnVjYSwgRHVtbHVwxLFuYXIsIDM1NDAwIEJ1Y2EgT3NiL0J1Y2EvxLB6bWly!5e0!3m2!1str!2str!4v1665444363002!5m2!1str!2str"
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe> -->
                                                    <form>
                                                        <h3>Notunuz</h3>
                                                        <div class="inputBox">
                                                            <i class="fa-solid fa-pencil"></i>
                                                            <textarea style="background-color: #0e0e0e;color:#fff;font-size:1.7rem;" class="cart-message" name="" rows="5" placeholder="" id=""></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                            </section>
                                            <!-- message -->
                                            <button id="order" class="btn">siparişi Ver</button>
                                        </div>
                                    </header>
                                    <!-- header end -->
                                <?php } else { ?>
                                    <!DOCTYPE html>
                                    <html lang="tr">

                                    <head>
                                        <meta charset="UTF-8" />
                                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                        <link rel="icon" href="../logo-images/icons/smoking-solid.svg" type="image/x-icon" />
                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                                        <!--bootstrap css start-->
                                        <!--bootstrap css end-->
                                        <link rel="stylesheet" href="../styles/style.css" />
                                        <title>Dejavu Hookah</title>
                                    </head>

                                    <body>
                                        <!-- header start -->
                                        <header class="header">
                                            <a href="../index.php" class="logo">
                                                <img src="../logo-images/dejavu-fococlipping-standard.png" alt="logo" />
                                            </a>
                                            <nav class="navbar">
                                                <a href="../index.php">Gruplar</a>
                                                <a href="contact.php">İletişim</a>
                                            </nav>
                                            <div class="buttons">
                                                <button id="cart-btn">
                                                    <i class="fas fa-shopping-cart shop-sepet">
                                                        <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item"></span>
                                                    </i>
                                                </button>
                                                <button id="menu-btn">
                                                    <i class="fas fa-bars"></i>
                                                </button>
                                            </div>
                                            <?php require "../pages/globalvalue.php";
                                            ?>
                                            <div class="cart-items-container">
                                                <?php require "../pages/container.php";
                                                ?>
                                                <div class="cart-item">
                                                    <img src="../images/TL-simgesi.png" alt="menu">
                                                    <div class="content">
                                                        <h3>TOPLAM</h3>
                                                        <div class="total"><span id="total">0</span>₺</div>
                                                    </div>
                                                </div>
                                                <!-- message -->
                                                <section class="contact" id="iletisim">
                                                    <h1 class="heading"><span></span></h1>
                                                    <div class="row">
                                                        <!-- <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12509.690116774513!2d27.174708999999996!3d38.385478400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b962008df5f553%3A0x43d9912a7a1c582a!2zQnVjYSwgRHVtbHVwxLFuYXIsIDM1NDAwIEJ1Y2EgT3NiL0J1Y2EvxLB6bWly!5e0!3m2!1str!2str!4v1665444363002!5m2!1str!2str"
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe> -->
                                                        <form>
                                                            <h3>Notunuz</h3>
                                                            <div class="inputBox">
                                                                <i class="fa-solid fa-pencil"></i>
                                                                <textarea style="background-color: #0e0e0e;color:#fff;font-size:1.7rem;" class="cart-message" name="" rows="5" placeholder="" id=""></textarea>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </section>
                                                <!-- message -->
                                                <button id="order" class="btn">siparişi Ver</button>
                                            </div>
                                        </header>
                                        <!-- header end -->
                                    <?php  } ?>