<?php
	//koneksi ke database
error_reporting(0);
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");

	//baca isi tabel sensor
	$sql = mysqli_query($konek, "select * from tb_sensort order by id desc");
	$data = mysqli_fetch_array($sql);
	$frekuensi3 = $data["frekuensi3"];
	
	if($frekuensi3=="") $frekuensi3 = 0;
	
	echo $frekuensi3 ;
?>