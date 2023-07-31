<?php
	//koneksi ke database
error_reporting(0);
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");

	//baca isi tabel sensor
	$sql = mysqli_query($konek, "select * from tb_sensors  order by id desc");
	$data = mysqli_fetch_array($sql);
	$daya2 = $data["daya2"];
	if($daya2=="") $daya2 = 0;
	echo $daya2 ;
?>