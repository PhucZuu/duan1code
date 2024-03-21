<div class="tabs__content">
    <div class="tab__content active-tab">
    <h3 class="tab__header">SỬA BIẾN THỂ</h3>
    <?php extract($variant);?>
    <div class="register">
        <form action="index.php?act=updatebt&id_bien_the=<?=$id_bien_the?>" class="form grid" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_sanpham" value="<?= $id_sanpham?>">
            <input type="hidden" name="id_bien_the" value="<?= $id_bien_the?>">
            <span>Màu sắc</span>
            <select name="id_kichco" id="">
                <?php 
                    foreach($sizes as $size){
                        extract($size);
                        echo '<option '.($id_kich_co==$id_kichco?"selected":"").' value="'.$id_kich_co.'">'.$ten_kich_co.'</option>';
                    }
                    ?>
            </select>
            <span>Kích cỡ</span>
            <select name="id_mausac" id="">
                <?php 
                    foreach($colors as $color){
                        extract($color);
                        echo '<option '.($id_mau_sac==$id_mausac?"selected":"").' value="'.$id_mau_sac.'">'.$ten_mau_sac.'</option>';
                    }
                    ?>
            </select>
            <span>Giá</span>
            <input type="number" placeholder="Nhập giá tiền" min="0" step="0.01" class="form__input" name="gia" value="<?= $gia?>"><span class="error"><?= $errPrice?></span>
            <span>Số lượng</span>
            <input type="number" placeholder="Nhập số lượng tồn kho" min="0" step="1" class="form__input" name="so_luong" value="<?= $so_luong?>"><span class="error"><?= $errQuantity?></span>
            <span>Giảm giá</span>
            <input type="number" placeholder="Nhập vào % giảm giá (Để trống nếu không có giảm giá)" min="0" max="100" step="1" class="form__input" value="<?= $giam_gia?>" name="giam_gia">
            
            <div class="form__btn">
                <input class="btn" type="submit" name="capnhat" value="CẬP NHẬT">
                <input class="btn" type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listbt&id_san_pham=<?= $id_sanpham?>"><input class="btn" type="button" value="DANH SÁCH BIẾN THỂ"></a>
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