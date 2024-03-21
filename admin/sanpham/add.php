<div class="tabs__content">
    <div class="tab__content active-tab">
    <h3 class="tab__header">THÊM MỚI SẢN PHẨM</h3>
    
    <div class="register">
        <form action="index.php?act=addsp" class="form grid" method="post" enctype="multipart/form-data">
            <span>Loại hàng</span>
            <select name="id_danhmuc" id="">
                <?php 
                    foreach($listdanhmuc as $dm){
                        extract($dm);
                        echo '<option value="'.$id_danh_muc.'">'.$ten_danh_muc.'</option>';
                    }
                    ?>
            </select>
            <span>Tên sản phẩm</span>
            <input type="text" placeholder="Nhập vào tên" class="form__input" name="ten_san_pham"><span class="error"><?=$errNameProduct?></span>
            <span>Hình ảnh</span>
            <input type="file" class="form__input" name="hinh_anh"><span class="error"><?=$errImage?></span>
            <span>Mô tả</span>
            <textarea name="mo_ta" id="mota" cols="30" rows="10"></textarea><span class="error"><?=$errDescription?></span>
            <div class="form__btn">
                <input class="btn" type="submit" name="themmoi" value="THÊM MỚI">
                <input class="btn" type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input class="btn" type="button" value="DANH SÁCH SẢN PHẨM"></a>
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