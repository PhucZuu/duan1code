<section class="login-register section--lg">
  <div class="login-register__container container grid">
    <!-- FORM ĐĂNG KÝ -->
    <div class="register">
      <h3 class="section__title">Tài khoản của tôi</h3>

      <form action="index.php?act=edit_taikhoan" method="post" class="form grid" enctype="multipart/form-data">
          <img style="width:100px;height:100px;border-radius:50%" src="./uploads/<?= $hinh_anh?>" alt=""><br>
            <input type="file" class="form__input" name="hinh_anh">

        <input type="text" placeholder="Tên đăng nhập" class="form__input" name="ten_dang_nhap" value="<?= $ten_dang_nhap ?>">

        <input type="email" placeholder="Email" class="form__input" name="email" value="<?= $email ?>">

        <input type="text" placeholder="Họ và tên" class="form__input" name="ho_va_ten" value="<?= $ho_va_ten ?>">

        <input type="text" placeholder="Số điện thoại" class="form__input" name="so_dien_thoai" value="<?= $so_dien_thoai ?>">

        <input type="text" placeholder="Địa chỉ" class="form__input" name="dia_chi" value="<?= $dia_chi ?>">

        <div class="form__btn">
            <input type="hidden" name="id_nguoi_dung" value="<?= $id_nguoi_dung ?>">
          <input type="submit" class="btn" value="Cập nhật" name="capnhat">
        </div>
      </form><br>
      <h2 class="thongbao">

            <?php if (isset($thongbao) && !empty($thongbao)): ?>
                <div class="text-orange-500 font-semibold"><?php echo $thongbao; ?></div>
            <?php endif; ?>
      </h2><br>
      
    </div>
  </div>
</section>
 


  