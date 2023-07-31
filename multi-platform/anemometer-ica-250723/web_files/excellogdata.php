<?php

require "dbmultisensor.php";
session_start();

if (!isset($_SESSION["login"])) {
    header("location:index1.php");
    exit;
}

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Record.xls");



$data = query("SELECT * FROM tb_rekap WHERE waktu BETWEEN '$waktu1' AND '$waktu2' 
        ORDER BY no DESC");


?>

<!DOCTYPE html>
 <html>
 <head>
  <title></title>
 </head>
 <body>
    <center>
       <h3>DATA RECORD</h3>
       <table class="table table-bordered table-hover table-striped" style="width:70rem;">
     <tr> 
       <th>No.</th>
       <th>tanggal</th>
       <th>jam</th>
       <th>berat_masak</th>
       <th>berat_mentah</th>
       <th>berat_busuk</th>
       <th>ringan_masak</th>
     </tr>
  <?php 
    $no =1;
    foreach ($data as $i):
  ?>

     <tr>
          <td><?= $no;?></td>
          <td><?= $i["waktu"];?></td>
          <td><?= $i["label"];?></td>
          <td><?= $i["result"];?></td>
          <?php 
            echo '<td>'.date("H:i:s", $i["start_time"] ).'</td>';
            echo '<td>'.date("H:i:s", $i["end_time"] ).'</td>';
           ?>
          <td><?= $i["device"];?></td>
   <?php 
      $no++;
      endforeach;
    ?>
  </table>
    </center>
 </body>
 </html>