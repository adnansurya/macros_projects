<?php

use Mpdf\Tag\Td;
use Mpdf\Tag\Tr;

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$konek = mysqli_connect("localhost", "root", "", "tugasakhir");
$data = mysqli_query($konek, "SELECT * FROM tb_rekap");



$html = '<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>REKAP</title>
        <link rel="stylesheet" href="css/print.css">
    </head>
    <body>
    <h3 style="text-align: center;">Data Rekap Web Monitoring Kecepatan Angin</h3>
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Kecepatan</th>
        
    </tr>';

$i = 1;
foreach( $data as $row) {
    $html .='<tr>
    <td>'.$i++.'</td>
    <td>'.$row["tanggal"].'</td>
    <td>'.$row["jam"].'</td>
    <td>'.$row["kecepatan"].'</td>
    
    </tr>';
}


  $html .= '</table>
    </body>
</html>';




$mpdf->WriteHTML($html);
$mpdf->Output();


