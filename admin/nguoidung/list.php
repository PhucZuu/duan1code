<div class="tabs__content">
    <div class="tab__content active-tab">
    <h3 class="tab__header">DANH SÁCH KHÁCH HÀNG</h3>
    <?php
        // echo '<pre>';
        // print_r($listtaikhoan);
        // echo '</pre>';
    ?>
    <div class="register">
        <table>
            <tr>
                <th>MÃ TK</th>
                <th>TÊN ĐĂNG NHẬP</th>
                <th>EMAIL</th>
                <th>HỌ VÀ TÊN</th>
                <th>HÌNH ẢNH</th>
                <th>ĐIỆN THOẠI</th>
                <th>ĐỊA CHỈ</th>
                <th>VAI TRÒ</th>
                <th></th>
            </tr>
            <?php 
                foreach ($listtaikhoan as $tk) {
                    extract($tk);

                    
                    $suadm = "index.php?act=suatk&id_nguoi_dung=".$id_nguoi_dung;

                    $xoadm = "index.php?act=xoatk&id_nguoi_dung=".$id_nguoi_dung;

                    $hinhpath = "../uploads/".$hinh_anh;
                                
                    if(is_file($hinhpath)){
                        $hinh="<img src='".$hinhpath."' height='80'>";
                        
                    }else{
                        $hinh="no photo";
                    }

                    echo '<tr>
                            <td>'.$id_nguoi_dung.'</td>
                            <td>'.$ten_dang_nhap.'</td> 
                            <td>'.$email.'</td>  
                            <td>'.$ho_va_ten.'</td> 
                            <td>'.$hinh.'</td>   
                            <td>'.$so_dien_thoai.'</td>  
                            <td>'.$dia_chi.'</td>  
                            <td>'.$vai_tro.'</td>  
                            <td><a class="btn1" href="'.$suadm.'"><input type="button" value="Sửa"></a>   <a class="btn1" href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>  
                        </tr>';
                }
                ?>
        </table>
    </div>
    
    </div>
</div>