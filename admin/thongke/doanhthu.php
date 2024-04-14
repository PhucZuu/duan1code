<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">Thống kê doanh thu sản phẩm theo danh mục</h3>
            <form action="index.php?act=doanhthu" method="post">

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

    <input type="submit" name="baocao" class="ad_btn" value="Xem báo cáo">
</form>
            <script src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<?php
$data = array(); // Mảng chứa dữ liệu

// Lặp qua kết quả truy vấn và lấy dữ liệu

foreach ($doanhthu as $row) {
    $data[] = array(
        'label' => $row['ten_danh_muc'], // Tên danh mục sản phẩm
        'value' => $row['doanh_thu'], // Doanh thu
        'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF))
    );
}

// Sử dụng extract để chuyển các phần tử của mảng thành các biến
extract($data);
?>
<script>
const xValues = <?php echo json_encode(array_column($data, 'label')); ?>;
const yValues = <?php echo json_encode(array_column($data, 'value')); ?>;
const barColors = <?php echo json_encode(array_column($data, 'color')); ?>;
<?php
$tong_doanh_thu = 0;
foreach ($doanhthu as $row) {
    $tong_doanh_thu += $row['doanh_thu'];
}
$tong_doanh_thu = '$' . number_format($tong_doanh_thu, 0, ',', '.');
?>

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Tổng doanh thu: <?=$tong_doanh_thu?>"
    }
  }
});
</script>

            <div class="form__btn">
            <a href="index.php?act=thongke"><input class="btn" type="button" value="Quay lại"></a>
            </div>
          </div>
        </div>