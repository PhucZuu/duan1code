<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">DANH SÁCH BIẾN THỂ</h3>
            <?php
                // echo '<pre>';
                // print_r($listsp);
                // echo '</pre>';
            ?>
            <div class="register">
                <table>
                    <tr>
                        <th>MÃ BT</th>
                        <th>SẢN PHẨM</th>
                        <th>MÀU SẮC</th>
                        <th>KÍCH CỠ</th>
                        <th>GIÁ</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIẢM GIÁ</th>
                        <th>THAO TÁC</th>
                    </tr>
                    <?php
                        foreach($listVariant as $variant){
                            extract($variant);
                            $suabt="index.php?act=suabt&id_bien_the=$id_bien_the";
                            $xoabt="index.php?act=xoabt&id_bien_the=$id_bien_the";
                            echo '
                            <tr>
                                <td>'.$id_bien_the.'</td>
                                <td>'.$ten_san_pham.'</td>
                                <td>'.$ten_mau_sac.'</td>
                                <td>'.$ten_kich_co.'</td>
                                <td>$'.$gia.'</td>
                                <td>'.$so_luong.'</td>
                                <td>'.$giam_gia.'%</td>
                                <td>
                                    <a class="btn1" href="'.$suabt.'"><input type="button" value="Sửa"></a>
                                    <a class="btn1" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')" href="'.$xoabt.'"><input type="button" value="Xóa"></a>
                                </td>
                            </tr>        
                            ';
                        }
                    ?>
                </table>
            </div>
            <div class="form__btn">
                <a href="index.php?act=addbt&id_san_pham=<?= $id_san_pham?>"><input class="btn" type="button" value="THÊM MỚI"></a>
                <a href="index.php?act=listsp"><input class="btn" type="button" value="DANH SÁCH SẢN PHẨM"></a>
            </div>
          </div>
        </div>