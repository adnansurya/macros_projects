<?php
	//koneksi ke database
error_reporting(0);
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");

	//baca isi tabel sensor
	$sql = mysqli_query($konek, "select * from tb_sensor order by id desc");
	$data = mysqli_fetch_array($sql);
	$cosphi = $data["cosphi"];
	
	if($cosphi=="") $cosphi = 0;
	
	echo $cosphi ;
?>