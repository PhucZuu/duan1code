<div class="tabs__content">
    <div class="tab__content active-tab">
    <h3 class="tab__header">CẬP NHẬT SẢN PHẨM</h3>
    <?php
        extract($sp);
    ?>
    <div class="register">
        <form action="index.php?act=updatesp&id_san_pham=<?=$id_san_pham?>" class="form grid" method="post" enctype="multipart/form-data">
            <span>Loại hàng</span>
            <select name="id_danhmuc" id="">
                <?php 
                    foreach($listdanhmuc as $dm){
                        extract($dm);
                        echo '<option '.($id_danh_muc==$id_danhmuc?'selected':'').' value="'.$id_danh_muc.'">'.$ten_danh_muc.'</option>';
                    }
                    ?>
            </select>
            <span>Tên sản phẩm</span>
            <input type="text" placeholder="Nhập vào tên" class="form__input" name="ten_san_pham" value="<?= $ten_san_pham?>"><span class="error"><?=$errNameProduct?></span>
            <span>Hình ảnh</span>
            <input type="file" class="form__input" name="hinh_anh"><img style="width: 200px; height:200px" src="../uploads/<?= $hinh_anh?>" alt=""><span class="error"><?=$errImage?></span>
            <span>Mô tả</span>
            <textarea name="mo_ta" id="mota" cols="30" rows="10"><?=$mo_ta?></textarea><span class="error"><?=$errDescription?></span>
            <div class="form__btn">
                <input type="hidden" name="id_san_pham" value="<?= $id_san_pham?>">
                <input class="btn" type="submit" name="capnhat" value="CẬP NHẬT">
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