<?php
	//koneksi ke database
error_reporting(0);
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");

	//baca isi tabel sensor
	$sql = mysqli_query($konek, "select * from tb_sensort order by id desc");
	$data = mysqli_fetch_array($sql);
	$arus3 = $data["arus3"];
	if($arus3=="") $arus3 = 0;
	echo $arus3 ;
?>