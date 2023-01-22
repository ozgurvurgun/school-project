<?php
require_once '../DB/database.php';

use dejavu_hookah\db\Database as db;

$db = new db;
if (isset($_GET["table"], $_GET["groupId"])) {
    $groupID = $_GET["groupId"];
    $table = $_GET["table"];
} else {
    //die("Access Denied");
}
$queryAutomation = $db->getRow('SELECT selectValue FROM menuOrAutomation');
$query->selectValue;
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  user-scalable=no" />
    <link rel="icon" href="../images/logo-images/icons/emoji-smile.svg" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--bootstrap css start-->
    <!--bootstrap css end-->
    <link rel="stylesheet" href="../styles/style.css" />
    <title><?php
            $query = $db->getRow('SELECT CompanyName FROM interfaceData WHERE interfaceDataID=?', [1]);
            echo $query->CompanyName;
            ?></title>
    <style>
        body {
            touch-action: pan-y;
        }

        :root {
            --main-color: #e84242;
            --black-color: #0e0e0e;
            --border: 0.1rem solid rgba(255, 255, 255, 0.4);
            --back-color: <?php
                            $query = $db->getRow('SELECT InterfaceColor FROM interfaceData WHERE interfaceDataID=?', [1]);
                            echo $query->InterfaceColor;
                            ?>;
        }
    </style>
</head>

<body>
    <!-- header start -->
    <header class="header">
        <a href="https://ozgurvurgun.com/dejavu_hookah/?table=<?= $_GET['table'] ?>" class="logo">
            <img src="../images/interface-images/interface-logo.png" alt="logo" />
        </a>
        <nav class="navbar">
            <a href="https://ozgurvurgun.com/dejavu_hookah/?table=<?= $_GET['table'] ?>">Kategoriler</a>
            <a href="https://ozgurvurgun.com/dejavu_hookah/pages/contact.php?table=<?= $_GET['table'] ?>">İletişim</a>
        </nav>
        <div class="buttons">
            <button id="cart-btn">
                <?php
                if ($queryAutomation->selectValue == 1) { ?>
                    <i class="fas fa-shopping-cart shop-sepet">
                        <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item"></span>
                    </i>
                <?php }
                ?>
            </button>
            <button id="menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- GLOBAL VALUES START -->
        <!-- Her sayfadan silme ekleme işlemi yapmak için alanların id lerine ihtiyaç oluyor. bu kurgu kabul edilemez json la falan yapmak daha sağlıklı olur gibi -->
        <section style="display: none;" class="menu" id="menu">
            <?php
            $query = $db->getRows("SELECT GlobalDivID FROM scripts WHERE ProductID!=?", [$groupID]);
            foreach ($query as $items) {
                echo $items->GlobalDivID;
            }
            ?>
        </section>
        <!-- GLOBAL VALUES END -->


        <div id="shop-kapsayici" class="cart-items-container">
            <span id="productContainer">
                <?php require "container.php"; ?>
            </span>
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
                    <form id="orderForm" method="POST">
                        <h3>Notunuz</h3>
                        <div class="inputBox">
                            <i class="fa-solid fa-pencil"></i>
                            <input style="display: none;" type="text" id="orderContents" name="orderContents">
                            <input style="display: none;" type="text" id="tableNo" name="tableNo">
                            <input style="display: none;" type="text" id="orderAmount" name="orderAmount">
                            <input style="display: none;" type="text" id="IP" name="IP">
                            <textarea style="background-color:#0e0e0e;color:#fff;" class="cart-message" name="orderMessage" rows="5" placeholder="" id="orderMessage"></textarea>
                        </div>
                    </form>
                </div>
            </section>
            <!-- message -->
            <button id="order" class="btn">siparişi Ver</button>
        </div>
    </header>
    <!-- header end -->
    <!-- menu start -->
    <section class="menu" id="menu">
        <?php
        $db = new db;
        $groupName = $db->getRow('SELECT GroupName FROM groups WHERE ID=?', [$groupID]);
        ?>
        <h1 class="heading"><span><?= $groupName->GroupName ?></span></h1>
        <div class="box-container">
            <?php
            $query = $db->getRows('SELECT products.ProductAutoID, products.ProductName, products.ProductPrice, products.ProductDiscountPrice, products.ProductStorageName, products.ProductPicture, groups.ID, groups.GroupStorageName FROM products 
            INNER JOIN groups ON groups.ID = products.ProductID WHERE groups.ID=? AND products.ProductActivity=? ORDER BY products.ProductAutoID DESC', [$groupID, 'A']);
            foreach ($query as $items) { ?>
                <div class="box">
                    <div class="box-head">
                        <img src="../images/product-images/<?= $items->ProductPicture ?>" alt="menu" />
                        <span class="menu-category"></span>
                        <h3><?= $items->ProductName ?></h3>
                        <div class="price"><span id="<?= $items->GroupStorageName ?>-<?= $items->ProductStorageName ?>-price"><?= $items->ProductPrice ?></span>₺&nbsp;<span class="span"><?= $items->ProductDiscountPrice ?>₺</span></div>
                    </div>
                    <?php
                    if ($queryAutomation->selectValue == 1) { ?>
                        <div class="box-bottom">
                            <button type="button" id="<?= $items->GroupStorageName ?>-<?= $items->ProductStorageName ?>-add" class="btn">sepete ekle</button>
                        </div>
                    <?php } ?>
                </div>
            <?php  }  ?>
        </div>
    </section>

    <!-- menu end -->


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
    <script src="../js/response.js"></script>
    <script src="../js/onloadGetValue.js"></script>
    <script src="../js/script.js"></script>
    <script src="../assets/jquery-3-5-1.js"></script>
    <!-- <script src="../js/modal.js"></script> -->
    <!--my js library end-->

    <script>
        localStorage.setItem("oncu", 0);
    </script>
    <script>
        <?php
        //php ile ürün storage isimlerini çekmemin sebebi yeni :
        //ürünlerin bağımsız şekilde isimleri ve fiyatları localStorage da tutuluyor her yeni ürün eklendiğin de yen storage oluşturuluyor.
        //bu php sorgusu ile storage isimlerini çekmenin sebebi sistemi no code yapıya yaklaştırmak. kullanıcı yeni ürün eklediğinde 
        //storage ismi buraya çekilecek. 
        //storage isimlerini döngüler ile kontrol edecek, çeşitli uyarlamalar yapacak şekilde dizayn ettim
        //her storage "urunGrubu"+"urunAdı"+"number", "urunGrubu"+"UrunAdı"+"fiyat" .... şeklinde yazıldı
        //bu şekilde backend den isimleri çektim. çünkü storage isimlerini js ile çekemiyorum.   
        $query = $db->getRows('SELECT  products.ProductStorageName, groups.GroupStorageName FROM products 
        INNER JOIN groups ON groups.ID = products.ProductID');

        $productArray = [];
        foreach ($query as $items) {
            array_push($productArray, $items->GroupStorageName . '-' . $items->ProductStorageName);
        }
        $products = "";
        foreach ($productArray as $key => $value) {
            $products .= "\"$value\",";
        }
        $products = rtrim($products, ",");
        echo "var products = [$products];\n";
        ?>

        const order = document.querySelector("#order");
        order.addEventListener("click", orderNow);

        function orderNow() {
            if (localStorage.getItem("totalNumber") >= 1) {
                let totalOrder = [];
                let totalPrice = localStorage.getItem("totalPrice");
                for (let index = 0; index < products.length; index++) {
                    if (localStorage.getItem(products[index] + "-" + "number") >= 1) {
                        let x = localStorage.getItem(products[index] + "-" + "number");
                        let a = localStorage.getItem(products[index] + "-" + "name");
                        totalOrder.push(" " + x + " ADET " + a);
                    }
                }
                document.getElementById("orderContents").value = totalOrder;
                document.getElementById("tableNo").value = <?= $_GET["table"] ?>;
                document.getElementById("orderAmount").value = totalPrice;
                document.getElementById("IP").value = "<?= $_SERVER["REMOTE_ADDR"] ?>";
                if (confirm(totalOrder + " TUTAR = " + totalPrice + " TL SİPARİŞİNİZ DOĞRU İSE ONAYLAYIN")) {
                    $.ajax({
                        type: 'POST',
                        url: '../admin/process-return/add-order-return.php',
                        data: $('#orderForm').serialize(),
                        success: function(data) {
                            alert(data);
                        }
                    });
                    localStorage.clear();
                    sessionStorage.clear();
                    total_price_total_number();
                    document.getElementById("productContainer").innerHTML = "";
                    document.getElementById("productContainer").innerHTML = '<?php require "container.php"; ?>';
                }
            }
        }
    </script>


</body>

</html>