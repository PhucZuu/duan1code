<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">Thống kê lượt bán sản phẩm theo danh mục</h3>
            <script src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    // Set Data
    const data = google.visualization.arrayToDataTable([
        ['Danh mục', 'Lượt bán'],
        <?php
        $tongdm = count($listtke);
        $i = 1;
        foreach($listtke as $tke){
            echo "['".$tke['ten_danh_muc']."', ".$tke['so_luong_ban']."]";
            if($i < $tongdm) {
                echo ",";
            }
            $i += 1;
        }
        ?>
    ]);

    // Set Options
    const options = {
        title: 'Biểu đồ thống kê'
    };

    // Draw
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);
}
</script>

            <div class="register">
               
            </div>
            <div class="form__btn">
            </div>
          </div>
        </div>