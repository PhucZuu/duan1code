<div class="tabs__content">
    <div class="tab__content active-tab">
    <h3 class="tab__header">THÊM MỚI LOẠI HÀNG</h3>

    <div class="register">
        <form action="index.php?act=adddm" class="form grid" method="post">
            Mã loại <br>
            <input type="text" placeholder="Auto number" class="form__input" name="id_danh_muc">
            <span style="color:red"><?= $errIddm ?></span>
            Tên loại <br>
            <input type="text" placeholder="Nhập vào tên" class="form__input" name="ten_danh_muc">
            <span style="color:red"><?= $errTendm ?></span>
            <div class="form__btn">
                <input class="btn" type="submit" name="themmoi" value="THÊM MỚI">
                <input class="btn" type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listdm"><input class="btn" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                if(isset($thongbao) && ($thongbao != "")){
                    echo '<h2 style="color:green">'.$thongbao.'</h2>';
                }
            ?>
        </form>
    </div>
    </div>
</div>