<?php
	//koneksi ke database
error_reporting(0);
	
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");
	//baca isi tabel sensor
	$sql = mysqli_query($konek, "select * from tb_sensors order by id desc");
	$data = mysqli_fetch_array($sql);
	$tegangan2 = $data["tegangan2"];
	
	if($tegangan2=="") $tegangan2 = 0;
	
	echo $tegangan2 ;
?>