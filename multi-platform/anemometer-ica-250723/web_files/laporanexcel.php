<?php
header("content-type:application/vnd-ms-exel");
header("Content-Disposition: attachment; filename=tablesdata-exel.xls");
?>

<h3>Data Rekap Web Monitoring Kecepatan Angin</h3>
<table border="1">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Kecepatan</th>
    </tr>
    <?php
     $konek = mysqli_connect("localhost", "root", "", "tugasakhir");
     $data = mysqli_query($konek, "SELECT * FROM tb_rekap");
     while($dt = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $dt['id'] ?></td>
        <td><?php echo $dt['tanggal'] ?></td>
        <td><?php echo $dt['jam'] ?></td>
        <td><?php echo $dt['kecepatan'] ?></td>
    </tr>
    <?php
        }
    ?>
</table>