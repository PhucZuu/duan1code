<section class="login-register section--lg">
  <div class="login-register__container formlogin container">
    <!-- FORM ĐĂNG KÝ -->
    <div class="register login bl_r">
      <h3 class="section__title">Đăng ký</h3>

      <form action="index.php?act=dangky" method="post" class="form grid" enctype="multipart/form-data">
        <input type="text" placeholder="Tên đăng nhập" class="form__input" name="ten_dang_nhap">
        <span style="color:red"><?= $errTenDangNhap ?></span>

        <input type="email" placeholder="Email" class="form__input" name="email" value="<?= $email ?>">
        <span style="color:red"><?= $errEmail ?></span>

        <input type="password" placeholder="Mật khẩu" class="form__input" name="mat_khau" value="<?= $mat_khau ?>">
        <span style="color:red"><?= $errPass ?></span>

        <input type="text" placeholder="Họ và tên" class="form__input" name="ho_va_ten" value="<?= $ho_va_ten ?>">
        <span style="color:red"><?= $errName ?></span>

        <input type="text" placeholder="Số điện thoại" class="form__input" name="so_dien_thoai" value="<?= $so_dien_thoai ?>">
        <span style="color:red"><?= $errSdt ?></span>

        <input type="text" placeholder="Địa chỉ" class="form__input" name="dia_chi" value="<?= $dia_chi ?>">
        <span style="color:red"><?= $errDiaChi ?></span>

        <div class="form__btn btnlogin">
          <input type="submit" class="btn btnw" value="Đăng ký" name="dangky">
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
 


  