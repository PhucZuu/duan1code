<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">DANH SÁCH SẢN PHẨM</h3>
            <?php
                // echo '<pre>';
                // print_r($listsp);
                // echo '</pre>';
            ?>
            <div class="register">
                <table>
                    <tr>
                        <th>MÃ SP</th>
                        <th>TÊN SP</th>
                        <th>HÌNH ẢNH</th>
                        <th>MÔ TẢ</th>
                        <th>LOẠI HÀNG</th>
                        <th>LƯỢT XEM</th>
                        <th>THAO TÁC</th>
                    </tr>
                    <?php
                        foreach($listsp as $sp){
                            extract($sp);
                            $suasp="index.php?act=suasp&id_san_pham=$id_san_pham";
                            $xoasp="index.php?act=xoasp&id_san_pham=$id_san_pham";
                            $xemct="index.php?act=listbt&id_san_pham=$id_san_pham";
                            echo '
                            <tr>
                                <td>'.$id_san_pham.'</td>
                                <td>'.$ten_san_pham.'</td>
                                <td><img style="width: 150px;height: 150px" src="../uploads/'.$hinh_anh.'" alt=""></td>
                                <td>'.$mo_ta.'</td>
                                <td>'.$ten_danh_muc.'</td>
                                <td>'.$luot_xem.'</td>
                                <td>
                                    <a class="btn1" href="'.$suasp.'"><input type="button" value="Sửa"></a>
                                    <a class="btn1" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')" href="'.$xoasp.'"><input type="button" value="Xóa"></a>
                                    <a class="btn1" href="'.$xemct.'"><input type="button" value="Xem chi tiết"></a>
                                </td>
                            </tr>        
                            ';
                        }
                    ?>
                </table>
            </div>
            <div class="form__btn">
                <a href="index.php?act=addsp"><input class="btn" type="button" value="THÊM MỚI"></a>
            </div>
          </div>
        </div>