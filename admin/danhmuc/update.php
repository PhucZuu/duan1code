<div class="tabs__content">
    <div class="tab__content active-tab">
    <h3 class="tab__header">CẬP NHẬT LOẠI HÀNG HÓA</h3>
    <?php
        if(isset($dm)){
            if(is_array($dm)){
                // print_r($dm);
                extract($dm);
            }
        }
    ?>
    <div class="register">
        <form action="index.php?act=updatedm" class="form grid" method="post">
            Mã loại <br>
            <input type="text" placeholder="Auto number" class="form__input" name="id_danh_muc" value="<?= $id_danh_muc ?>">
            <span style="color:red"><?= $errIddm ?></span>

            Tên loại <br>
            <input type="text" placeholder="Nhập vào tên" class="form__input" name="ten_danh_muc" value="<?php if(isset($ten_danh_muc) && $ten_danh_muc!="") echo $ten_danh_muc ?>">
            <span style="color:red"><?= $errTendm ?></span>
            <div class="form__btn">
                <input type="hidden" name="id_danh_muc" value="<?php if(isset($id_danh_muc) && $id_danh_muc>0) echo $id_danh_muc ?>">
                <input class="btn" type="submit" name="capnhat" value="CẬP NHẬT">
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