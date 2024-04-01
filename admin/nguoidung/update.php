<div class="tabs__content">
    <div class="tab__content active-tab">
    <h3 class="tab__header">CẬP NHẬT TÀI KHOẢN</h3>
    <?php
        if(isset($tk)){
            if(is_array($tk)){
                // print_r($tk);
                extract($tk);
            }
        }
    ?>
    <div class="register">

        <form action="index.php?act=updatetk" method="post" class="form grid" enctype="multipart/form-data">
            Vai trò
            <input type="text" placeholder="Vai trò" class="form__input" name="vai_tro" value="<?= $vai_tro ?>">
            <span style="color:red"><?= $errVaiTro ?></span>

            <div class="form__btn">
                <input type="hidden" name="id_nguoi_dung" value="<?= $id_nguoi_dung ?>">
            <input type="submit" class="btn" value="Cập nhật" name="capnhat">
            </div>
      </form><br> 
        <?php
            if(isset($thongbao) && ($thongbao != "")){
                echo '<h2 style="color:green">'.$thongbao.'</h2>';
            }
        ?>
    </div>
    </div>
</div>