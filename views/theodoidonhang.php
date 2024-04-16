<main class='main'>
    <section class='container'>
        
    <?php 
        if(isset($_SESSION['nguoidung'])){       
            if (!empty($id_order)) {
            echo '<h3>ĐƠN HÀNG CỦA BẠN</h3>';
            foreach($id_order as $id_don_hang){
                extract($id_don_hang);
                if($id_trangthai==1){
                    $cancle='<form action="index.php?act=theodoidonhang" method="post">
                    <input type="hidden" name="id_donhang" value="'.$id_don_hang.'">
                    <button class="btn_cancle" onclick="return confirm(\'Bạn chắc chắn muốn hủy đơn hàng này\')"><input type="submit" name="cancelOrder" value="Hủy đơn hàng"></button>
                    </form>';
                }else if($id_trangthai==6){
                    $cancle='<form action="index.php?act=theodoidonhang" method="post">
                    <input type="hidden" name="id_donhang" value="'.$id_don_hang.'">
                    <button class="btn_cancle" onclick="return confirm(\'Bạn chắc chắn muốn trả hàng?\')"><input type="submit" name="returnOrder" value="Yêu cầu trả hàng"></button>
                    </form>';
                }else{
                    $cancle='';
                }
                if ($ten_trang_thai == "Giao hàng thành công") {
                    $mau = "green"; // Màu xanh lá
                } else {
                    $mau = "red"; // Màu đỏ
                }
                if ($ten_trang_thai == "Giao hàng thành công") {
                    $trang_thai_thanh_toan = "Đã thanh toán";
                }
                if ($trang_thai_thanh_toan == "Đã thanh toán") {
                    $mau2 = "green"; // Màu xanh lá
                } else {
                    $mau2 = "red"; // Màu đỏ
                }
                echo '
                    <table class="order__table mar">
                        <tr>
                            <td colspan="6">
                                Mã đơn hàng: '.$id_don_hang.'<br>
                            </td>
                        <tr>
                        <tr>
                            <td rowspan="4" class="table__rows">
                                Người nhận hàng: <span style="color: #088179;">'.$ho_va_ten.'</span><br>
                                Số điện thoại: <span style="color: #088179;">'.$so_dien_thoai.'</span><br>
                                Địa chỉ: <span style="color: #088179;">'.$dia_chi.'</span><br>
                                Email: <span style="color: #088179;">'.$email.'</span><br>
                                Trạng thái thanh toán: <span style="color: '.$mau2.';">'.$trang_thai_thanh_toan.'</span><br>
                                Trạng thái đơn hàng: <span style="color: '.$mau.';">'.$ten_trang_thai.'</span><br>
                                Tổng thành tiền: <span style="color: #088179;">$'.$tong_thanh_tien.'</span><br>
                                '.$cancle.'
                            </td>   
                            <th>HÌNH ẢNH</th>
                            <th>SẢN PHẨM</th>
                            <th>GIÁ</th>
                            <th>THÀNH TIỀN</th>
                        </tr>
                    
                    ';
                        $orderDetails=loadAllOrdersDetailsByIdOrder($id_don_hang);
                        foreach($orderDetails as $order){
                            extract($order);
                            echo '
                            <tr>
                                <td><img width="90px" src="./uploads/'.$hinh_anh.'" class="ma" alt=""></td>
                                <td><h3 class="table__title"> '.$ten_san_pham.'
                                </h3>
                                <p class="table__quantity">Số lượng: '.$so_luong.'</p>
                                <p class="table__quantity">Màu: '.$ten_mau_sac.'</p>
                                <p class="table__quantity">Cỡ: '.$ten_kich_co.'</p></td>
                                <td>$'.$gia.'</td>
                                <td>$'.$thanh_tien.'</td>
                            </tr>
                            ';
                        }
                    }
                    echo '</table>';
                }else{
                    echo '
                        <div class="boxempty">
                            <div class="imgempty">
                                <img src="./assets/img/nothingorder.png" alt="empty-order">
                            </div>
                            <h3>Rất tiếc, không tìm thấy đơn hàng nào của bạn<h3>
                            <span>Vẫn còn rất nhiều sản phẩm đang chờ đón bạn. <a class="buynow" href="index.php">Mua hàng ngay</a></span>
                        </div>
                        ';
                }
        }else if(isset($_POST['searchOrder'])&&($_POST['searchOrder'])){
            if (!empty($id_order)) {
            echo '<h3>ĐƠN HÀNG CỦA BẠN</h3>';
            foreach($id_order as $id_don_hang){
                extract($id_don_hang);
                if($id_trangthai==1){
                    $cancle='<form action="index.php?act=theodoidonhang" method="post">
                    <input type="hidden" name="id_donhang" value="'.$id_don_hang.'">
                    <button class="btn_cancle" onclick="return confirm(\'Bạn chắc chắn muốn hủy đơn hàng này\')"><input type="submit" name="cancelOrder" value="Hủy đơn hàng"></button>
                    </form>';
                }else if($id_trangthai==6){
                    $cancle='<form action="index.php?act=theodoidonhang" method="post">
                    <input type="hidden" name="id_donhang" value="'.$id_don_hang.'">
                    <button class="btn_cancle" onclick="return confirm(\'Bạn chắc chắn muốn trả hàng?\')"><input type="submit" name="returnOrder" value="Yêu cầu trả hàng"></button>
                    </form>';
                }else{
                    $cancle='';
                }
                echo '
                <table class="order__table mar">
                    <tr>
                        <td colspan="5">
                            Mã đơn hàng: '.$id_don_hang.'<br>
                            
                        </td>
                    <tr>
                    <tr>
                        <td rowspan="4" class="table__rows">
                            Người nhận hàng: '.$ho_va_ten.'<br>
                            Số điện thoại: '.$so_dien_thoai.'<br>
                            Địa chỉ: '.$dia_chi.'<br>
                            Email: '.$email.'<br>
                            Trạng thái thanh toán: '.$trang_thai_thanh_toan.'<br>
                            Trạng thái đơn hàng: '.$ten_trang_thai.'<br>
                            Tổng thành tiền: $'.$tong_thanh_tien.'<br>
                            '.$cancle.'
                        </td>   
                        <th>HÌNH ẢNH</th>
                        <th>SẢN PHẨM</th>
                        <th>GIÁ</th>
                        <th>THÀNH TIỀN</th>
                    </tr>
                
                ';
                    $orderDetails=loadAllOrdersDetailsByIdOrder($id_don_hang);
                    foreach($orderDetails as $order){
                        extract($order);
                        echo '
                        <tr>
                            <td ><img width="100px" src="./uploads/'.$hinh_anh.'" class="ma" alt=""></td>
                            <td><h3 class="table__title"> '.$ten_san_pham.'
                            </h3>
                            <p class="table__quantity">Số lượng: '.$so_luong.'</p>
                            <p class="table__quantity">Màu: '.$ten_mau_sac.'</p>
                            <p class="table__quantity">Cỡ: '.$ten_kich_co.'</p></td>
                            <td>$'.$gia.'</td>
                            <td>$'.$thanh_tien.'</td>
                        </tr>
                        ';
                    }
                }
                echo '</table>';
            }else{
                echo '
                    <div class="boxempty">
                        <div class="imgempty">
                            <img src="./assets/img/nothingorder.png" alt="empty-order">
                        </div>
                        <h3>Rất tiếc, không tìm thấy đơn hàng nào của bạn<h3>
                        <span>Vẫn còn rất nhiều sản phẩm đang chờ đón bạn. <a class="buynow" href="index.php">Mua hàng ngay</a></span>
                    </div>
                    ';
            }
        }else{
            echo '
            <section class="box__follow container">
                <div class="follow__img">
                    <img src="./assets/img/lichsumuahang.png" alt="theo-doi-don-hang-image">
                </div>
                <div class="follow_search">
                    <form action="index.php?act=theodoidonhang" method="post" class="form grid">
                        <div class="boxsearch">
                            <h4>TRA CỨU ĐƠN HÀNG</h4>
                            <input type="text" name="so_dien_thoai" id="inpPhone" class="form__input" placeholder="Nhập số điện thoại mua hàng" required>
                            <div class="form__btn">
                                <input type="submit" class="btn btn--md" value="Tìm kiếm" name="searchOrder">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            ';
        }
    ?>
    </section>
    
</main>