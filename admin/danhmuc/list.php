<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">DANH SÁCH LOẠI HÀNG</h3>
            <?php
                // echo '<pre>';
                // print_r($listdanhmuc);
                // echo '</pre>';
            ?>
            <div class="register">
                <table>
                    <tr>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th></th>
                    </tr>
                    <?php 
                        foreach ($listdanhmuc as $danhmuc) {
                            // show dữ liệu
                            extract($danhmuc);

                            //sửa danh muc
                            $suadm = "index.php?act=suadm&id_danh_muc=".$id_danh_muc;

                            //xóa danh mục
                            $xoadm = "index.php?act=xoadm&id_danh_muc=".$id_danh_muc;

                            // phải viết theo tên cột trong database
                            echo '<tr>
                                    <td>'.$id_danh_muc.'</td>
                                    <td>'.$ten_danh_muc.'</td>  
                                    <td><a class="btn1" href="'.$suadm.'"><input type="button" value="Sửa"></a>   
                                    <a class="btn1" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')" href="'.$xoadm.'"><input type="button" value="Xóa"></a>
                                </tr>';
                        }
                        ?>
                </table>
            </div>
            <div class="form__btn">
                <a href="index.php?act=adddm"><input class="btn" type="button" value="THÊM MỚI"></a>
            </div>
          </div>
        </div>