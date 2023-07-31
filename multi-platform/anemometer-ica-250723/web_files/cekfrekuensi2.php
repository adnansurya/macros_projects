<?php
	//koneksi ke database
error_reporting(0);
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");

	//baca isi tabel sensor
	$sql = mysqli_query($konek, "select * from tb_sensors order by id desc");
	$data = mysqli_fetch_array($sql);
	$frekuensi2 = $data["frekuensi2"];
	
	if($frekuensi2=="") $frekuensi2 = 0;
	
	echo $frekuensi2 ;
?>