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
    <a href="index.php" class="logo">
      <img src="../logo-images/dejavu-fococlipping-standard.png" alt="logo" />
    </a>
    <nav class="navbar">
      <a href="../index.php">Gruplar</a>
      <a href="contact.php">İletişim</a>
    </nav>
    <div class="buttons">
      <button id="cart-btn">
        <i class="fas fa-shopping-cart shop-sepet">
          <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item">0</span>
        </i>
      </button>
      <button id="menu-btn">
        <i class="fas fa-bars"></i>
      </button>
    </div>
    <div id="shop-kapsayici" class="cart-items-container">
      <div id="shop-kapsayici2"></div>

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
      <a href="#" class="btn">siparişi Ver</a>
    </div>
  </header>
  <!-- header end -->


  <!-- menu start -->
  <section class="menu" id="menu">
    <h1 class="heading">nak<span>hla</span></h1>
    <div class="box-container">
      <div class="box">
        <div class="box-head">
          <img src="../images/nargilejpg.jpg" alt="menu" />
          <span class="menu-category"></span>
          <h3>vişne</h3>
          <div class="price"><span id="visne_fiyat">140</span>₺&nbsp;<span class="span">199.99₺</span></div>
        </div>
        <div class="box-bottom">
          <button type="button" id="visne_add" class="btn">sepete ekle</button>
        </div>
      </div>
      <div class="box">
        <div class="box-head">
          <img src="../images/nargilejpg.jpg" alt="menu" />
          <span class="menu-category"></span>
          <h3>şeftali</h3>
          <div class="price">110₺ <span class="span">179.99₺</span></div>
        </div>
        <div class="box-bottom">
          <a href="#" class="btn">sepete ekle</a>
        </div>
      </div>
      <div class="box">
        <div class="box-head">
          <img src="../images/nargilejpg.jpg" alt="menu" />
          <span class="menu-category"></span>
          <h3>cappucino</h3>
          <div class="price">110₺ <span class="span">179.99₺</span></div>
        </div>
        <div class="box-bottom">
          <a href="#" class="btn">sepete ekle</a>
        </div>
      </div>


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
      <a href="#" class="fab fa-facebook"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
    </div>
    <div class="credit">created by <span>Özgür Vurgun</span> | all rights reserved</div>
  </section>
  <!-- footer end -->

  <!--my js library start-->
  <script src="../js/script.js"></script>
  <!--my js library end-->

  <!--bootstrap js start-->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script> -->
  <!--bootstrap js end-->
</body>

</html>