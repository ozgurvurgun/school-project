<?php require "navbar.php"; ?>
<!-- contact start -->
  <section class="contact" id="iletisim">
    <h1 class="heading"><span></span></h1>
    <div class="row">
      <!-- <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12509.690116774513!2d27.174708999999996!3d38.385478400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b962008df5f553%3A0x43d9912a7a1c582a!2zQnVjYSwgRHVtbHVwxLFuYXIsIDM1NDAwIEJ1Y2EgT3NiL0J1Y2EvxLB6bWly!5e0!3m2!1str!2str!4v1665444363002!5m2!1str!2str"
        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe> -->
      <form>
        <h3>iletişim</h3>
        <div class="inputBox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="ad soyad">
        </div>
        <div class="inputBox">
          <i class="fas fa-envelope"></i>
          <input type="email" placeholder="mail">
        </div>
        <div class="inputBox">
          <i class="fas fa-phone"></i>
          <input type="number" placeholder="telefon">
        </div>
        <div class="inputBox">
          <i class="fas fa-envelope"></i>
          <textarea style="background-color: #0e0e0e;padding:2rem;color:#fff;font-size:1.7rem;" class="message" name="" rows="5" placeholder="mesajınız" id=""></textarea>
        </div>
        <input type="submit" value="gönder" class="btn">
      </form>
    </div>
  </section>
  <!-- contact end -->
  <?php require "footer.php"; ?>
