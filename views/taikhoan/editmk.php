<section class="login-register section--lg">
    <div class="login-register__container formlogin container box_login">
    <div class="login bl_r">
            <h3 class="section__title">Đổi mật khẩu</h3>
           

            <form action="index.php?act=editmk" method="post" class="form grid">
                <input type="password" placeholder="Mật khẩu" class="form__input" name="mat_khau">

                <input type="password" placeholder="Mật khẩu mới" class="form__input" name="mat_khau_moi">

                <input type="password" placeholder="Xác nhận mật khẩu" class="form__input" name="xac_nhan_mk">

                <div class="form__btn btnlogin">
                    <input type="hidden" name="id_nguoi_dung" value="<?= $id_nguoi_dung ?>">
                    <input type="submit" class="btn btnw" value="Đổi mật khẩu" name="doimk">
                </div>
            </form>
            
            <br>
            <h2 class="thongbao">
                <?php if (isset($thongbao) && !empty($thongbao)): ?>
                    <div class="text-orange-500 font-semibold"><?php echo $thongbao; ?></div>
                <?php endif; ?>
            </h2>

        </div>
    </div>
</section>