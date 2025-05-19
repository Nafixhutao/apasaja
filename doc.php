<?php
include("net.php");
$data = mysqli_query($koneksi, "SELECT jurusan, COUNT(*) as jumlah FROM mahasiswa GROUP BY jurusan");
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Jurusan', 'Jumlah Mahasiswa'],
          <?php
          while($row = mysqli_fetch_assoc($data)){
              echo "['".$row['jurusan']."', ".$row['jumlah']."],";
          }
          ?>
        ]);

        var options = {
          title: 'Jumlah Mahasiswa per Jurusan'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 700px; height: 400px;"></div>
  </body>
</html>
