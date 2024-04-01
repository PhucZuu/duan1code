<section class="login-register section--lg">
    <div class="login-register__container formlogin container box_login">
    <div class="login bl_r">
            <h3 class="section__title">Đăng nhập</h3>
           

            <form action="index.php?act=dangnhap" method="post" class="form grid">
                <input type="text" placeholder="Tên đăng nhập" class="form__input" name="ten_dang_nhap" value="<?= $ten_dang_nhap ?>">
                <span style="color:red"><?= $errTenDangNhap ?></span>

                <input type="password" placeholder="Mật khẩu" class="form__input" name="mat_khau" value="<?= $mat_khau ?>">
                <span style="color:red"><?= $errPass ?></span>

                <div class="form__btn btnlogin">
                    <input type="submit" class="btn btnw" value="Đăng nhập" name="dangnhap">
                </div>
            </form>
            
            <div class="mt_8">
                <a href="index.php?act=quenmk">Quên mật khẩu</a><br>
                <a href="index.php?act=dangky">Chưa có tài khoản? Đăng ký</a><br>
            </div>
            <br>
            <h2 class="thongbao">
                <?php
                    if(isset($thongbao) && ($thongbao != "")){
                    echo '<h2 style="color:green">'.$thongbao.'</h2>';
                    }
                ?>
            </h2>

        </div>
    </div>
</section>