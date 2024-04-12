<div class="tabs__content">
    <div class="tab__content active-tab">
    <h3 class="tab__header">CHI TIẾT ĐƠN HÀNG</h3>
    <?php
        // echo '<pre>';
        // print_r($noteOrder);
        // echo '</pre>';
        // die;
    ?>
    <div class="register">
        <form action="index.php?act=updatestatusorder" class="form grid" method="post">
            <span>Trạng thái đơn hàng</span>
            <select name="id_trang_thai" id="">
                <?php
                    foreach($statusOrders as $status){
                        extract($status);
                        echo '<option '.($id_trangthai==$id_trang_thai?"selected":"").' value="'.$id_trang_thai.'">'.$ten_trang_thai.'</option>';
                    }
                ?>
            </select>
        
    </div>
    <div class="noteOrder">
        <span class='noteInfor'>Ghi chú đơn hàng</span>
        <textarea id="noteOrderDetail" cols="30" rows="7" readonly>
            <?php
                extract($noteOrder[0]);
                echo $ghi_chu;
            ?>
        </textarea>
    </div>
    <div class="register">
        <table>
            <tr>
                <th>HÌNH ẢNH</th>
                <th>TÊN SẢN PHẨM</th>
                <th>MÀU SẮC</th>
                <th>KÍCH CỠ</th>
                <th>GIÁ</th>
                <th>SỐ LƯỢNG</th>
                <th>THÀNH TIỀN</th>
            </tr>
            <?php
                foreach($orderDetails as $orderDetails){
                    extract($orderDetails);
                    echo '
                    <tr>
                        <td><img width="80px" src="../uploads/'.$hinh_anh.'" alt="product-image"></td>
                        <td>'.$ten_san_pham.'</td>
                        <td>'.$ten_mau_sac.'</td>
                        <td>'.$ten_kich_co.'</td>
                        <td>$'.$gia.'</td>
                        <td>'.$so_luong.'</td>
                        <td>$'.$thanh_tien.'</td>
                    </tr>        
                    ';
                }
            ?>
        </table>
    </div>
    <div class="form__btn">
        <input type="hidden" name="id_don_hang" value="<?= $id_don_hang?>">
        <input class="btn" type="submit" name="capnhat" value="CẬP NHẬT">
        <a href="index.php?act=listorders"><input class="btn" type="button" value="DANH SÁCH ĐƠN HÀNG"></a>
    </div>
    </form>
    </div>
</div>