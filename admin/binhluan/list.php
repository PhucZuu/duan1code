
<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">DANH SÁCH BÌNH LUẬN</h3>

            <div class="register">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>NỘI DUNG</th>
                        <th>TÊN NGƯỜI DÙNG</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>NGÀY BÌNH LUẬN</th>
                        <th></th>
                    </tr>
                    <?php 
                    foreach($listbinhluan as $binhluan){
                        extract($binhluan);
                        // print_r($binhluan); die;
                        $xoabl ="index.php?act=xoabl&id_binh_luan=".$id_binh_luan;
                        echo'
                        <tr>
                            <td>'.$id_binh_luan.'</td>
                            <td>'.$noi_dung.'</td>
                            <td>'.$ho_va_ten.'</td>
                            <td>'.$ten_san_pham.'</td>
                            <td>'.$ngay_binh_luan.'</td>
                            <td><a class="btn1" href="'.$xoabl.'"><input type="button" value="Xóa"></a></td>
                        </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
          </div>
        </div>