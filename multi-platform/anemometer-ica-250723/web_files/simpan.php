<?php 
include "koneksi.php";
if (!$konek) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

date_default_timezone_set("Asia/Makassar");
$tanggal = date('d/m/Y');
$jam = date('H:i:s');

$sql1 = mysqli_query($konek, "SELECT * FROM tb_sensor");
$sql5 = mysqli_query($konek, "SELECT * FROM biaya");
$data = mysqli_fetch_array($sql1);
$data2 = mysqli_fetch_array($sql5);

$tegangan = $data['tegangan'];
$tegangan2 = $data['tegangan2'];
$tegangan3 = $data['tegangan3'];
$arus = $data['arus'];
$arus2 = $data['arus2'];
$arus3 = $data['arus3'];
$daya = $data['daya'];
$daya2 = $data['daya2'];
$daya3 = $data['daya3'];
$energi = $data['energi'];
$energi2 = $data['energi2'];
$energi3 = $data['energi3'];
$cosphi = $data['cosphi'];
$cosphi2 = $data['cosphi2'];
$cosphi3 = $data['cosphi3'];
$frekuensi = $data['frekuensi'];
$frekuensi2 = $data['frekuensi2'];
$frekuensi3 = $data['frekuensi3'];

$sql = "INSERT INTO tb_rekap (tanggal, jam, tegangan, arus, daya, energi, cosphi, frekuensi, 
tegangan2, arus2, daya2, energi2, cosphi2, frekuensi2, tegangan3, arus3, daya3, energi3, cosphi3, frekuensi3)
VALUES ('$tegangan', '$arus', '$daya', '$energi', '$cosphi', '$frekuensi', 
'$tegangan2', '$arus2', '$daya2', '$energi2', '$cosphi2', '$frekuensi2', 
'$tegangan3', '$arus3', '$daya3', '$energi3', '$cosphi3', '$frekuensi3')";

if (mysqli_query($konek, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($konek);
}

$sql2 = "UPDATE tb_sensor WHERE id='$data'";

if (mysqli_query($konek, $sql2)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql2 . "<br>" . mysqli_error($konek);
}

$sql3 = "UPDATE tb_sensors WHERE id='$data'";

if (mysqli_query($konek, $sql3)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql3 . "<br>" . mysqli_error($konek);
}

$sql4 = "UPDATE tb_sensort WHERE id='$data'";

if (mysqli_query($konek, $sql4)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql4 . "<br>" . mysqli_error($konek);
}

$sql6 = "UPDATE biaya WHERE id='$data2'";
if (mysqli_query($konek, $sql6)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql6 . "<br>" . mysqli_error($konek);
}

mysqli_close($konek);

//header('Location: index1.php');
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index1.php">';
exit;
?>