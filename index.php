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
          <span style="color: #e84242; font-size: 2.3rem;" id="item-count" class="shopping-item">6</span>
        </i>
      </button>
      <button id="menu-btn">
        <i class="fas fa-bars"></i>
      </button>
    </div>
    <div class="cart-items-container">
      <div class="cart-item">
        <i class="fas fa-times"></i>
        <img src="images/nargilejpg.jpg" alt="menu">
        <div class="content">
          <h3>vişne&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">1</span><span style="color: red;font-size:medium">&nbsp;adet</span> </h3>
          <div class="price">140₺</div>
        </div>
      </div>
      <div class="cart-item">
        <i class="fas fa-times"></i>
        <img src="images/nargilejpg.jpg" alt="menu">
        <div class="content">
          <h3>şeftali&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">2</span><span style="color: red;font-size:medium">&nbsp;adet</span> </h3>
          <div class="price">220₺</div>
        </div>
      </div>
      <div class="cart-item">
        <i class="fas fa-times"></i>
        <img src="images/nargilejpg.jpg" alt="menu">
        <div class="content">
          <h3>cappucino&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">1</span><span style="color: red;font-size:medium">&nbsp;adet</span> </h3>
          <div class="price">110₺</div>
        </div>
      </div>
      <div class="cart-item">
        <i class="fas fa-times"></i>
        <img src="images/nargilejpg.jpg" alt="menu">
        <div class="content">
          <h3>bluemist-böğürtlen&nbsp;&nbsp;&nbsp;<span style="color: red;font-size:medium">1</span><span style="color: red;font-size:medium">&nbsp;adet</span></h3>
          <div class="price">110₺</div>
        </div>
      </div>
      <div class="cart-item">
        <img src="images/TL-simgesi.png" alt="menu">
        <div class="content">
          <h3>TOPLAM</h3>
          <div class="total">580₺</div>
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
      <a href=" #" class="btn">siparişi Ver</a>
    </div>
  </header>
  <!-- header end -->

  <!-- home start -->
  <section class="home">
    <div class="content">
      <h3>Dejavu Hookah</h3>
      <p>
        Ağzının tadını bilenlerin tercihi...
      </p>
      <a href="#gruplar" class="btn">Sipariş Ver</a>
    </div>
  </section>
  <!-- home end -->

  <!-- products start -->
  <section class="products" id="gruplar">
    <h1 class="heading">grup <span>seç</span></h1>
    <div class="box-container">
      <div class="box dark-bg">
        <div class="box-head">
          <span class="title">text</span>
          <p class="name">Nakhla</p>
        </div>
        <div class="image">
          <img src="images/nargilejpg.jpg" alt="" />
        </div>
        <div class="box-bottom">
          <div class="info">
            <b class="price">110-140₺</b>
            <span class="amoumt">text</span>
          </div>
          <div class="product-btn">
            <a href="pages/nakhla.php">
              <i class="fas fa-plus"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="box dark-bg">
        <div class="box-head">
          <span class="title">text</span>
          <p class="name">Al fakher</p>
        </div>
        <div class="image">
          <img src="images/nargilejpg.jpg" alt="" />
        </div>
        <div class="box-bottom">
          <div class="info">
            <b class="price">100₺</b>
            <span class="amoumt">text</span>
          </div>
          <div class="product-btn">
            <a href="pages/alfakher.php">
              <i class="fas fa-plus"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="box dark-bg">
        <div class="box-head">
          <span class="title">text</span>
          <p class="name">Adalya</p>
        </div>
        <div class="image">
          <img src="images/nargilejpg.jpg" alt="" />
        </div>
        <div class="box-bottom">
          <div class="info">
            <b class="price">100₺</b>
            <span class="amoumt">text</span>
          </div>
          <div class="product-btn">
            <a href="pages/adalya.php">
              <i class="fas fa-plus"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="box dark-bg">
        <div class="box-head">
          <span class="title">text</span>
          <p class="name">Best Couple</p>
        </div>
        <div class="image">
          <img src="images/nargilejpg.jpg" alt="" />
        </div>
        <div class="box-bottom">
          <div class="info">
            <b class="price">100₺</b>
            <span class="amoumt">text</span>
          </div>
          <div class="product-btn">
            <a href="pages/bestcouple.php">
              <i class="fas fa-plus"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="box dark-bg">
        <div class="box-head">
          <span class="title">text</span>
          <p class="name">Truepassion</p>
        </div>
        <div class="image">
          <img src="images/nargilejpg.jpg" alt="" />
        </div>
        <div class="box-bottom">
          <div class="info">
            <b class="price">120₺</b>
            <span class="amoumt">text</span>
          </div>
          <div class="product-btn">
            <a href="pages/truepassion.php">
              <i class="fas fa-plus"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="box dark-bg">
        <div class="box-head">
          <span class="title">text</span>
          <p class="name">Daim</p>
        </div>
        <div class="image">
          <img src="images/nargilejpg.jpg" alt="" />
        </div>
        <div class="box-bottom">
          <div class="info">
            <b class="price">100₺</b>
            <span class="amoumt">text</span>
          </div>
          <div class="product-btn">
            <a href="pages/daim.php">
              <i class="fas fa-plus"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="box dark-bg">
        <div class="box-head">
          <span class="title">text</span>
          <p class="name">Fumari</p>
        </div>
        <div class="image">
          <img src="images/nargilejpg.jpg" alt="" />
        </div>
        <div class="box-bottom">
          <div class="info">
            <b class="price">140₺</b>
            <span class="amoumt">text</span>
          </div>
          <div class="product-btn">
            <a href="pages/fumari.php">
              <i class="fas fa-plus"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- products end -->

  <!-- review start -->
  <section class="review">
    <h1 class="heading">dejavu <span>severler</span></h1>
    <div class="box-container">
      <div class="box">
        <img src="images/quote.png" alt="quote">
        <p> Daha önce böyle aroması güzel bir nargile İçmemiştim. Üstelik patron velat bey de
          çok profeysonel İşinin ehli güler yüzlü birisi. başarılarınızın devamını dilerim :)
        </p>
        <img src="images/avatar-1.png" alt="user" class="user">
        <h3>velat tezel</h3>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
      </div>
      <div class="box">
        <img src="images/quote.png" alt="quote">
        <p> Daha önce böyle aroması güzel bir nargile İçmemiştim. Üstelik patron velat bey de
          çok profeysonel İşinin ehli güler yüzlü birisi. başarılarınızın devamını dilerim :)
        </p>
        <img src="images/avatar-2.png" alt="user" class="user">
        <h3>özgür vurgun</h3>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
      </div>
      <div class="box">
        <img src="images/quote.png" alt="quote">
        <p> Daha önce böyle aroması güzel bir nargile İçmemiştim. Üstelik patron velat bey de
          çok profeysonel İşinin ehli güler yüzlü birisi. başarılarınızın devamını dilerim :)
        </p>
        <img src="images/avatar-3.png" alt="user" class="user">
        <h3>serhat serhat</h3>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
      </div>
    </div>
  </section>
  <!-- review end -->

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
  <script src="js/script.js"></script>
  <!--my js library end-->

  <!--bootstrap js start-->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script> -->
  <!--bootstrap js end-->
</body>

</html>