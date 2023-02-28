<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
    ['Danh mục', 'Số lượng sản phẩm'],
    <?php
     $tongdm = count($listtk);
     $i=1;
      foreach ($listtk as $tk) {
          extract($tk);
          $dauphay;
        if($i==$tongdm){
            $dauphay="";
        } else $dauphay=",";
        // echo "['".$tk['tendm']."', '".$tk['countsp']."']".$dauphay;
           echo "['".$tk['tendm']."', ".$tk['countsp']."]".$dauphay;
        $i+=1;
      }
    ?>
  
]);

var options = {
  'title':'Thống kê theo danh mục',
  'width': 1100,
  'height': 400,
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>