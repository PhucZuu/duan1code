<section class="login-register section--lg">
  <div class="login-register__container container grid">
    <!-- FORM ĐĂNG KÝ -->
    <div class="register">
      <h3 class="section__title">Quên mật khẩu</h3>

      <form action="index.php?act=quenmk" method="post" class="form grid" enctype="multipart/form-data">
        <input type="text" placeholder="Tên đăng nhập" class="form__input" name="ten_dang_nhap">
        <span style="color:red"><?= $errTenDangNhap ?></span>

        <input type="email" placeholder="Email" class="form__input" name="email">
        <span style="color:red"><?= $errEmail ?></span>

        <div class="form__btn">
          <input type="submit" class="btn" value="Gửi" name="guiemail">
        </div>
      </form><br>
      <h2 class="thongbao">
          <?php
              if(isset($thongbao) && ($thongbao != "")){
                echo '<h2 style="color:green">'.$thongbao.'</h2>';
              }
          ?>
      </h2><br>
    </div>
  </div>
</section>
 


  