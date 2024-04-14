<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">THỐNG KÊ SẢN PHẨM</h3>
            <?php
            // extract($soluong);
            ?>
            <div class="register">
                <table class="stats-table">
                    <tr>
                        <th>MÃ DM</th>
                        <th>TÊN DM</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                    <?php
                        foreach($listtke as $key => $tke){
                            extract($tke);
                            // extract($so_san_pham);
                              echo '
                            <tr>
                                <td>'.$id_danh_muc.'</td>
                                <td>'.$ten_danh_muc.'</td>
                                <td>'.$so_san_pham.'</td>
                                <td>$'.$gia_thap_nhat.'</td>
                                <td>$'.$gia_cao_nhat.'</td>
                                <td>$'.$gia_trung_binh.'</td>
                            </tr>        
                            ';  
                            }
                            
                        
                    ?>
                </table>
            </div>
            <div class="form__btn">
                <a href="index.php?act=bieudo"><input class="btn" type="button" value="Biểu đồ số lượng"></a>
                <a href="index.php?act=doanhthu"><input class="btn" type="button" value="Biểu đồ doanh thu"></a>
                <a href="index.php?act=luotban"><input class="btn" type="button" value="Thống kê lượt bán"></a>
            </div>
          </div>
        </div>