<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">THỐNG KÊ SẢN PHẨM</h3>
<form action="index.php?act=luotban" method="post">

<label for="thang">Ngày:</label>
<select name="ngay" id="ngay">
<option value="all" <?php echo ($ngay == 'all') ? 'selected' : ''; ?>>Tất cả</option>
    <?php
    for ($i = 1; $i <= thang2($thang,$nam); $i++) {
        $selected = ($i == $ngay) ? 'selected' : '';
        echo "<option value=\"$i\" $selected> $i</option>";
    }
    ?>
</select>

<label for="thang">Tháng:</label>
<select name="thang" id="thang">
    <?php
    for ($i = 1; $i <= 12; $i++) {
        $selected = ($i == $thang) ? 'selected' : '';
        echo "<option value=\"$i\" $selected> $i</option>";
    }
    ?>
</select>


<label for="nam">Năm:</label>
<select name="nam" id="nam">
    <?php
    $current_year = date("Y");
    for ($i = $current_year; $i >= $current_year - 10; $i--) {
        $selected = ($i == $nam) ? 'selected' : ''; 
        echo "<option value=\"$i\" $selected>$i</option>";
    }
    ?>
</select>
<select name="sort_option">
    <option value="desc" <?php if(isset($_POST["sort_option"]) && $_POST["sort_option"] == "desc") echo "selected"; ?>>BÁN CHẠY</option>
    <option value="asc" <?php if(isset($_POST["sort_option"]) && $_POST["sort_option"] == "asc") echo "selected"; ?>>ÍT LƯỢT MUA</option>
</select>

<input type="submit" class="ad_btn" name="luotban" value="Xem">
</form>
            <div class="register">
                <table class="stats-table">
                    <tr>
                        <th>MÃ SP</th>
                        <th>TÊN SP</th>
                        <th>SỐ LƯỢNG BÁN</th>
                        <th>HÀNG TRONG KHO</th>
                        <th>DOANH THU</th>
                    </tr>
                    <?php
                        foreach($luotban as $lb){
                            extract($lb);
                            // extract($so_san_pham);
                              echo '
                            <tr>
                                <td>'.$id_san_pham.'</td>
                                <td>'.$ten_san_pham.'</td>
                                <td>'.$so_luong_ban.'</td>
                                <td>'.$so_luong_con_lai.'</td>
                                <td>$'.$doanh_thu.'</td>
                            </tr>        
                            ';  
                            }
                            
                        
                    ?>
                </table>
            </div>
            <div class="form__btn">
                <a href="index.php?act=thongke"><input class="btn" type="button" value="Quay lại"></a>
            </div>
          </div>
        </div>