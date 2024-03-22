<div class="tabs__content">
    <div class="tab__content active-tab">
    <h3 class="tab__header">THÊM MỚI BIẾN THỂ</h3>
    
    <div class="register">
        <form action="index.php?act=addbt&id_san_pham=<?=$id_sanpham?>" class="form grid" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_sanpham" value="<?= $id_sanpham?>">
            <span>Màu sắc</span>
            <select name="id_kichco" id="">
                <?php 
                    foreach($sizes as $size){
                        extract($size);
                        echo '<option value="'.$id_kich_co.'">'.$ten_kich_co.'</option>';
                    }
                    ?>
            </select>
            <span>Kích cỡ</span>
            <select name="id_mausac" id="">
                <?php 
                    foreach($colors as $color){
                        extract($color);
                        echo '<option value="'.$id_mau_sac.'">'.$ten_mau_sac.'</option>';
                    }
                    ?>
            </select>
            <span>Giá</span>
            <input type="number" placeholder="Nhập giá tiền" min="0" step="0.01" class="form__input" name="gia"><span class="error"><?= $errPrice?></span>
            <span>Số lượng</span>
            <input type="number" placeholder="Nhập số lượng tồn kho" min="0" step="1" class="form__input" name="so_luong"><span class="error"><?= $errQuantity?></span>
            <span>Giảm giá</span>
            <input type="number" placeholder="Nhập vào % giảm giá (Để trống nếu không có giảm giá)" min="0" max="100" step="1" class="form__input" name="giam_gia">
            
            <div class="form__btn">
                <input class="btn" type="submit" name="themmoi" value="THÊM MỚI">
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