<div class="tabs__content">
          <div class="tab__content active-tab">
            <h3 class="tab__header">Thống kê doanh thu sản phẩm theo danh mục</h3>
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
        ['Danh mục', 'Doanh thu'],
        <?php
        $tongdm = count($doanhthu);
        $i = 1;
        foreach($doanhthu as $tke){
            echo "['".$tke['ten_danh_muc']."', ".$tke['doanh_thu']."]";
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