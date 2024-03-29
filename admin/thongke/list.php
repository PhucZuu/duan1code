<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">THỐNG KÊ SẢN PHẨM</h3>
            <?php
                // echo '<pre>';
                // print_r($listsp);
                // echo '</pre>';
            ?>
            <div class="register">
                <table>
                    <tr>
                        <th>MÃ DM</th>
                        <th>TÊN DM</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                    <?php
                        foreach($listtke as $tke){
                            extract($tke);
                            echo '
                            <tr>
                                <td>'.$id_danh_muc.'</td>
                                <td>'.$ten_danh_muc.'</td>
                                <td>'.$so_san_pham.'</td>
                                <td>'.$gia_cao_nhat.'</td>
                                <td>'.$gia_thap_nhat.'</td>
                                <td>'.$gia_trung_binh.'</td>
                            </tr>        
                            ';
                        }
                    ?>
                </table>
            </div>
            <div class="form__btn">
                <a href="index.php?act=bieudo"><input class="btn" type="button" value="Xem biểu đồ"></a>
            </div>
          </div>
        </div>