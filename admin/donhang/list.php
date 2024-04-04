<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">DANH SÁCH ĐƠN HÀNG</h3>
            <?php
                // echo '<pre>';
                // print_r($listOrders);
                // echo '</pre>';
                // die;
            ?>
            <div class="register">
                <table>
                    <tr>
                        <th>ID ĐƠN HÀNG</th>
                        <th>TÊN KHÁCH HÀNG</th>
                        <th>EMAIL</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>ĐỊA CHỈ</th>
                        <th>NGÀY ĐẶT HÀNG</th>
                        <th>TRẠNG THÁI</th>
                        <th>THANH TOÁN</th>
                        <th>TỔNG THÀNH TIỀN</th>
                        <th>THAO TÁC</th>
                    </tr>
                    <?php
                        foreach($listOrders as $order){
                            extract($order);
                            $capnhattrangthai="index.php?act=capnhatdonhang&id_don_hang=$id_don_hang";
                            $xemctdonhang="index.php?act=chitietdonhang&id_don_hang=$id_don_hang";
                            echo '
                            <tr>
                                <td>'.$id_don_hang.'</td>
                                <td>'.$ho_va_ten.'</td>
                                <td>'.$email.'</td>
                                <td>'.$so_dien_thoai.'</td>
                                <td>'.$dia_chi.'</td>
                                <td>'.$ngay_dat_hang.'</td>
                                <td>'.$ten_trang_thai.'</td>
                                <td>'.$trang_thai_thanh_toan.'</td>
                                <td>$'.$tong_thanh_tien.'</td>
                                <td>
                                    <a class="btn1" href="'.$xemctdonhang.'"><input type="button" value="Xem chi tiết"></a>
                                </td>
                            </tr>        
                            ';
                        }
                    ?>
                </table>
            </div>
          </div>
        </div>