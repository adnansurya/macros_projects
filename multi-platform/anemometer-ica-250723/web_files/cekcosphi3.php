<?php
	//koneksi ke database
error_reporting(0);
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");

	//baca isi tabel sensor
	$sql = mysqli_query($konek, "select * from tb_sensort order by id desc");
	$data = mysqli_fetch_array($sql);
	$cosphi3 = $data["cosphi3"];
	
	if($cosphi3=="") $cosphi3 = 0;
	
	echo $cosphi3 ;
?>