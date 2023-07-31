<?php
	//koneksi ke database
error_reporting(0);
	
	$konek = mysqli_connect("localhost", "root", "", "kwhmeter");
	//baca isi tabel sensor
	$sql = mysqli_query($konek, "select * from tb_sensort order by id desc");
	$data = mysqli_fetch_array($sql);
	$tegangan3 = $data["tegangan3"];
	
	if($tegangan3=="") $tegangan3 = 0;
	
	echo $tegangan3 ;
?>